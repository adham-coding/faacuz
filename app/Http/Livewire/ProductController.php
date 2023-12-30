<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductController extends Component
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
        $category,
        $categories,
        $productId,
        $description_en,
        $description_ru,
        $description_uz,
        $deletingImages = [],
        $features_en,
        $features_ru,
        $features_uz,
        $form,
        $images,
        // $instructionsLink,
        $locale,
        $name,
        $oldImages,
        // $partsLink,
        $price,
        $productName,
        // $requirementsLink,
        $searchQuery,
        $simpleModal,
        $simpleModalType,
        $thumb,
        $resetVars = [
            'name',
            'images',
            'category',
            'description_uz',
            'description_ru',
            'description_en',
            'deletingImages',
            'features_uz',
            'features_ru',
            'features_en',
            // 'instructionsLink',
            'oldImages',
            // 'partsLink',
            'price',
            // 'requirementsLink',
            'youtubeLink',
            'productId',
            'form',
        ],
        $youtubeLink;

    private function createProduct()
    {
        $this->imageIsValid();

        foreach ($this->images as $key => $image) {
            $this->images[$key] = Storage::disk('public')->put('images/product', $image);
        }

        $latestProduct = Product::latest('id')->first();

        Product::create([
            'category_id' => $this->category,
            'description_en' => $this->description_en,
            'description_ru' => $this->description_ru,
            'description_uz' => $this->description_uz,
            'features_en' => json_encode(explode("\n", $this->features_en)),
            'features_ru' => json_encode(explode("\n", $this->features_ru)),
            'features_uz' => json_encode(explode("\n", $this->features_uz)),
            'images' => json_encode($this->images),
            // 'instructions' => $this->instructionsLink,
            'name' => $this->name,
            'order' => $latestProduct ? ++$latestProduct->id : 1,
            // 'parts' => $this->partsLink,
            'price' => $this->price,
            'slug' => str_replace(' ', '-', $this->name),
            // 'requirements' => $this->requirementsLink,
            'youtube' => str_replace('youtu.be', 'www.youtube.com/embed', $this->youtubeLink),
        ]);

        $this->alert(
            'success',
            "<span class='text-green-600'>{$this->name}</span> successfully created!",
            $this->toastPattern
        );
    }

    private function editProduct()
    {
        $product = Product::find($this->productId);

        if ($this->images) {
            $this->imageIsValid();

            foreach ($this->images as $key => $image) {
                $this->images[$key] = Storage::disk('public')->put('images/product', $image);
            }
        } else $this->images = [];

        if ($this->deletingImages) {
            foreach ($this->deletingImages as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $product->update([
            'category_id' => $this->category,
            'description_en' => $this->description_en,
            'description_ru' => $this->description_ru,
            'description_uz' => $this->description_uz,
            'features_en' => json_encode(explode("\n", $this->features_en)),
            'features_ru' => json_encode(explode("\n", $this->features_ru)),
            'features_uz' => json_encode(explode("\n", $this->features_uz)),
            'images' => json_encode(array_merge($this->oldImages, $this->images)),
            // 'instructions' => $this->instructionsLink,
            'name' => $this->name,
            // 'parts' => $this->partsLink,
            'price' => $this->price,
            // 'requirements' => $this->requirementsLink,
            'slug' => str_replace(' ', '-', $this->name),
            'youtube' => str_replace('youtu.be', 'www.youtube.com/embed', $this->youtubeLink),
        ]);

        $this->alert(
            'success',
            "<span class='text-green-600'>{$this->name}</span> successfully edited!",
            $this->toastPattern
        );
    }

    private function imageIsValid()
    {
        if (!$this->productId) $this->validate(['images' => 'required']);

        $this->validate(['images.*' => 'image']);
    }

    public function formSetter()
    {
        $productId = $this->productId ? ",{$this->productId}" : '';

        $this->validate([
            'category' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'description_uz' => 'required',
            'features_en' => 'required',
            'features_ru' => 'required',
            'features_uz' => 'required',
            // 'instructionsLink' => 'required',
            'name' => "required | unique:products,name{$productId}",
            // 'partsLink' => 'required',
            'price' => 'required',
            // 'requirementsLink' => 'required',
            'youtubeLink' => 'required',
        ]);

        $productId ?
            $this->editProduct() :
            $this->createProduct();

        Storage::deleteDirectory('livewire-tmp');

        $this->reset($this->resetVars);
    }

    public function openForm($id = null)
    {
        if ($id) {
            $product = Product::find($id);

            $this->category = $product->category_id;
            $this->description_en = $product->description_en;
            $this->description_ru = $product->description_ru;
            $this->description_uz = $product->description_uz;
            $this->features_en = implode("\n", json_decode($product->features_en));
            $this->features_ru = implode("\n", json_decode($product->features_ru));
            $this->features_uz = implode("\n", json_decode($product->features_uz));
            // $this->instructionsLink = $product->instructions;
            $this->name = $product->name;
            $this->oldImages = json_decode($product->images);
            // $this->partsLink = $product->parts;
            $this->price = $product->price;
            // $this->requirementsLink = $product->requirements;
            $this->thumb = str_contains($this->oldImages[0], 'http') ?
                $this->oldImages[0] :
                asset($this->oldImages[0]);
            $this->youtubeLink = $product->youtube;
        } else $this->thumb = null;

        $this->productId = $id;
        $this->form = true;
    }

    public function deleteImage($id)
    {
        array_push($this->deletingImages, $this->oldImages[$id]);

        unset($this->oldImages[$id]);

        $this->updateOldImages();
    }

    public function simpleModal($id, $simpleModalType)
    {
        $this->productName = ($this->actived) ?
            Product::find($id)->name :
            Product::onlyTrashed()->find($id)->name;

        $this->simpleModalType = $simpleModalType;
        $this->productId = $id;
        $this->simpleModal = true;
    }

    public function removeProduct()
    {
        $product = Product::find($this->productId);
        $product->delete();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$product->name}</span> successfully {$this->simpleModalType}d!",
            $this->toastPattern
        );
    }

    public function rescueProduct()
    {
        $product = Product::onlyTrashed()->find($this->productId);
        $product->restore();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$product->name}</span> successfully {$this->simpleModalType}d!",
            $this->toastPattern
        );
    }

    public function deleteProduct()
    {
        $product = Product::onlyTrashed()->find($this->productId);

        foreach (json_decode($product->images) as $image) {
            Storage::disk('public')->delete($image);
        }

        $product->forceDelete();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$product->name}</span> successfully {$this->simpleModalType}d!",
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

    public function updateOldImages()
    {
        foreach ($this->oldImages as $image) {
            $this->thumb = str_contains($image, 'http') ?
                $image :
                asset($image);
            break;
        }

        if (!($this->oldImages || $this->deletingImages)) {
            $this->thumb = null;
        }
    }

    public function changeState($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->update([
            'state' => $product->state ? false : true
        ]);

        $this->alert(
            'success',
            "State changed!",
            $this->toastPattern
        );
    }

    public function changeOrder($orders)
    {
        foreach ($orders as $order) {
            $product = Product::withTrashed()->find($order['value']);

            $product->update([
                'order' => $order['order']
            ]);
        }

        $this->alert(
            'success',
            'Product order succesfully changed!',
            $this->toastPattern
        );
    }

    public function changeImageOrder($orders)
    {
        $temp = [];

        foreach ($orders as $order) {
            $temp[$order['order']] = $this->oldImages[$order['value']];
        }

        $this->oldImages = $temp;

        $this->updateOldImages();
    }

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        if ($this->actived) {
            $products = Product::where('name', 'like', "%{$this->searchQuery}%")
                ->orderBy('order');
        } else {
            $products = Product::onlyTrashed()
                ->where('name', 'like', "%{$this->searchQuery}%")
                ->orderBy('order');
        }

        return view('livewire.product-controller', [
            'products' => $products->paginate(5),
        ]);
    }
}
