<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoryController extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    private $toastPattern = [
        'timerProgressBar' => true,
        'didOpen' => <<<JS
            toast => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        JS,
    ];

    public
        $actived = true,
        $categoryName,
        $categoryId,
        $form,
        $image,
        $locale,
        $name_uz,
        $name_ru,
        $name_en,
        $resetVars = [
            'categoryId',
            'form',
            'image',
            'name_en',
            'name_ru',
            'name_uz',
        ],
        $searchQuery,
        $simpleModal,
        $simpleModalType,
        $thumb;

    private function createCategory()
    {
        $this->imageIsValid();

        $latestCategory = Category::latest('id')->first();

        Category::create([
            'image' => Storage::disk('public')->put('images/category', $this->image),
            'name_en' => $this->name_en,
            'name_ru' => $this->name_ru,
            'name_uz' => $this->name_uz,
            'order' => $latestCategory ? $latestCategory->id + 1 : 1,
            'slug' => str_replace(' ', '-', $this->name_en),
        ]);

        $name = "name_{$this->locale}";

        $this->alert(
            'success',
            "<span class='text-green-600'>{$this->$name}</span> successfully created!",
            $this->toastPattern
        );
    }

    private function editCategory()
    {
        $category = Category::find($this->categoryId);

        if ($this->image) {
            $this->imageIsValid();

            Storage::disk('public')->delete($category->image);

            $category->update([
                'image' => Storage::disk('public')->put('images/category', $this->image)
            ]);
        }

        $category->update([
            'name_en' => $this->name_en,
            'name_ru' => $this->name_ru,
            'name_uz' => $this->name_uz,
        ]);

        $name = "name_{$this->locale}";

        $this->alert(
            'success',
            "<span class='text-green-600'>{$this->$name}</span> successfully edited!",
            $this->toastPattern
        );
    }

    private function imageIsValid()
    {
        $this->validate(['image' => 'image']);
    }

    public function formSetter()
    {
        $categoryId = $this->categoryId ? ",{$this->categoryId}" : '';

        $this->validate([
            'name_en' => "required | unique:pgsql.categories,name_en{$categoryId}",
            'name_ru' => "required | unique:pgsql.categories,name_ru{$categoryId}",
            'name_uz' => "required | unique:pgsql.categories,name_uz{$categoryId}",
        ]);

        $categoryId ?
            $this->editCategory() :
            $this->createCategory();

        Storage::deleteDirectory('livewire-tmp');

        $this->reset($this->resetVars);
    }

    public function openForm($id = null)
    {
        if ($id) {
            $category = Category::find($id);

            $this->name_en = $category->name_en;
            $this->name_ru = $category->name_ru;
            $this->name_uz = $category->name_uz;
            $this->thumb = str_contains($category->image, 'http') ?
                $category->image :
                asset($category->image);
        } else $this->thumb = null;

        $this->categoryId = $id;
        $this->form = true;
    }

    public function simpleModal($id, $simpleModalType)
    {
        $this->categoryName = $this->actived ?
            Category::find($id)->name_en :
            Category::onlyTrashed()->find($id)->name_en;

        $this->simpleModalType = $simpleModalType;
        $this->categoryId = $id;
        $this->simpleModal = true;
    }

    public function removeCategory()
    {
        $category = Category::find($this->categoryId);
        $category->delete();

        Product::whereCategoryId($this->categoryId)->delete();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$category["name_{$this->locale}"]}</span> successfully {$this->simpleModalType}d!",
            $this->toastPattern
        );
    }

    public function rescueCategory()
    {
        $category = Category::onlyTrashed()->find($this->categoryId);
        $category->restore();

        Product::whereCategoryId($this->categoryId)->restore();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$category["name_{$this->locale}"]}</span> successfully {$this->simpleModalType}d!",
            $this->toastPattern
        );
    }

    public function deleteCategory()
    {
        $category = Category::onlyTrashed()->find($this->categoryId);

        $products = Product::onlyTrashed()->whereCategoryId($this->categoryId)->get();

        foreach ($products as $product) {
            foreach (json_decode($product->images) as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        Storage::disk('public')->delete($category->image);

        $category->forceDelete();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$category["name_{$this->locale}"]}</span> successfully {$this->simpleModalType}d!",
            $this->toastPattern
        );
    }

    public function updatedForm()
    {
        if (!$this->form) {
            $this->reset($this->resetVars);
            $this->resetErrorBag();
        }
    }

    public function changeState($id)
    {
        $category = Category::withTrashed()->find($id);
        $category->update([
            'state' => $category->state ? false : true
        ]);

        $this->alert(
            'success',
            "State successfully changed!",
            $this->toastPattern
        );
    }

    public function changeOrder($orders)
    {
        foreach ($orders as $order) {
            $category = Category::withTrashed()->find($order['value']);

            $category->update([
                'order' => $order['order']
            ]);
        }

        $this->alert(
            'success',
            'Category order succesfully changed!',
            $this->toastPattern
        );
    }

    public function render()
    {
        if ($this->actived) {
            $categories = Category::where("name_{$this->locale}", 'like', "%{$this->searchQuery}%")
                ->orderBy('order');
        } else {
            $categories = Category::onlyTrashed()
                ->where("name_{$this->locale}", 'like', "%{$this->searchQuery}%")
                ->orderBy('order');
        }

        return view('livewire.category-controller', [
            'categories' => $categories->paginate(5),
        ]);
    }
}
