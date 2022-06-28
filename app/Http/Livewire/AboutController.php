<?php

namespace App\Http\Livewire;

use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AboutController extends Component
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
        $aboutId,
        $aboutTitle,
        $actived = true,
        $form,
        $image,
        $locale,
        $paragraph_uz,
        $paragraph_ru,
        $paragraph_en,
        $resetVars = [
            'aboutId',
            'form',
            'image',
            'paragraph_en',
            'paragraph_ru',
            'paragraph_uz',
            'title_en',
            'title_ru',
            'title_uz',
        ],
        $searchQuery,
        $simpleModal,
        $simpleModalType,
        $thumb,
        $title_uz,
        $title_ru,
        $title_en;

    private function createAbout()
    {
        $this->imageIsValid();

        $latestAbout = About::latest('id')->first();

        About::create([
            'image' => Storage::disk('public')->put('images/about', $this->image),
            'order' => $latestAbout ? ++$latestAbout->id : 1,
            'paragraph_en' => $this->paragraph_en,
            'paragraph_ru' => $this->paragraph_ru,
            'paragraph_uz' => $this->paragraph_uz,
            'title_en' => $this->title_en,
            'title_ru' => $this->title_ru,
            'title_uz' => $this->title_uz,
        ]);

        $title = "title_{$this->locale}";

        $this->alert(
            'success',
            "<span class='text-green-600'>{$this->$title}</span> successfully created!",
            $this->toastPattern
        );
    }

    private function editAbout()
    {
        $about = About::find($this->aboutId);

        if ($this->image) {
            $this->imageIsValid();

            Storage::disk('public')->delete($about->image);

            $about->update([
                'image' => Storage::disk('public')->put('images/about', $this->image),
            ]);
        }

        $about->update([
            'paragraph_en' => $this->paragraph_en,
            'paragraph_ru' => $this->paragraph_ru,
            'paragraph_uz' => $this->paragraph_uz,
            'title_en' => $this->title_en,
            'title_ru' => $this->title_ru,
            'title_uz' => $this->title_uz,
        ]);

        $title = "title_{$this->locale}";

        $this->alert(
            'success',
            "<span class='text-green-600'>{$this->$title}</span> successfully edited!",
            $this->toastPattern
        );
    }

    private function imageIsValid()
    {
        $this->validate(['image' => 'image']);
    }

    public function formSetter()
    {
        $aboutId = $this->aboutId ? ",{$this->aboutId}" : '';

        $this->validate([
            'paragraph_en' => 'required',
            'paragraph_ru' => 'required',
            'paragraph_uz' => 'required',
            'title_en' => "required | unique:abouts,title_en{$aboutId}",
            'title_ru' => "required | unique:abouts,title_ru{$aboutId}",
            'title_uz' => "required | unique:abouts,title_uz{$aboutId}",
        ]);

        $aboutId ?
            $this->editAbout() :
            $this->createAbout();

        Storage::deleteDirectory('livewire-tmp');

        $this->reset($this->resetVars);
    }

    public function openForm($id = null)
    {
        if ($id) {
            $about = About::find($id);

            $this->paragraph_en = $about->paragraph_en;
            $this->paragraph_ru = $about->paragraph_ru;
            $this->paragraph_uz = $about->paragraph_uz;
            $this->thumb = str_contains($about->image, 'http') ?
                $about->image :
                asset($about->image);
            $this->title_en = $about->title_en;
            $this->title_ru = $about->title_ru;
            $this->title_uz = $about->title_uz;
        } else $this->thumb = null;

        $this->aboutId = $id;
        $this->form = true;
    }

    public function simpleModal($id, $simpleModalType)
    {
        $this->aboutTitle = $this->actived ?
            About::find($id)->title_en :
            About::onlyTrashed()->find($id)->title_en;

        $this->simpleModalType = $simpleModalType;
        $this->aboutId = $id;
        $this->simpleModal = true;
    }

    public function removeAbout()
    {
        $about = About::find($this->aboutId);
        $about->delete();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$about["title_{$this->locale}"]}</span> successfully {$this->simpleModalType}d!",
            $this->toastPattern
        );
    }

    public function rescueAbout()
    {
        $about = About::onlyTrashed()->find($this->aboutId);
        $about->restore();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$about["title_{$this->locale}"]}</span> successfully {$this->simpleModalType}d!",
            $this->toastPattern
        );
    }

    public function deleteAbout()
    {
        $about = About::onlyTrashed()->find($this->aboutId);

        Storage::disk('public')->delete($about->image);

        $about->forceDelete();

        $this->simpleModal = false;

        $this->alert(
            'success',
            "<span class='text-green-600'>{$about["title_{$this->locale}"]}</span> successfully {$this->simpleModalType}d!",
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
        $about = About::withTrashed()->find($id);
        $about->update([
            'state' => $about->state ? false : true
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
            $about = About::withTrashed()->find($order['value']);

            $about->update([
                'order' => $order['order']
            ]);
        }

        $this->alert(
            'success',
            'About order succesfully changed!',
            $this->toastPattern
        );
    }

    public function render()
    {
        if ($this->actived) {
            $abouts = About::where("title_{$this->locale}", 'like', "%{$this->searchQuery}%")
                ->orderBy('order');
        } else {
            $abouts = About::onlyTrashed()
                ->where("title_{$this->locale}", 'like', "%{$this->searchQuery}%")
                ->orderBy('order');
        }

        return view('livewire.about-controller', [
            'abouts' => $abouts->paginate(5),
        ]);
    }
}
