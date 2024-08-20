<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use App\Models\Template;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class BroadcastPreview extends Component
{

    use WithFileUploads;

    public $image;
    public $message = '';
    public $showButton = false;
    public $buttonText = '';
    public $buttonUrl = '';
    public $customError = '';
    public $templates; // Tambahkan ini
    public $selectedTemplate = ''; // Tambahkan ini
    public $isTemplateLocked = false; // Tambahkan ini

    protected $rules = [
        'image' => 'nullable|image|mimes:jpg,jpeg,png,heic|max:1024',
        'message' => 'string|max:1000',
        'showButton' => 'required|boolean',
        'buttonText' => 'string|max:255',
        'buttonUrl' => 'string|max:255|url',
    ];

    public function mount()
    {
        $this->templates = Template::all();
        $selectedTemplateId = Request::query('template');
        if ($selectedTemplateId) {
            $template = Template::find($selectedTemplateId);
            if ($template) {
                $this->selectedTemplate = $selectedTemplateId;
                $this->message = $template->message;
                $this->showButton = true;
                $this->buttonText = $template->buttonText;
                $this->isTemplateLocked = true; // Kunci pemilihan template
            }
        }
    }

    public function updated($propertyName)
    {
        $this->resetErrorBag($propertyName);
        $this->customError = '';

        try {
            $this->validateOnly($propertyName);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($propertyName == 'image') {
                $this->customError = 'Mohon maaf, file yang dapat diupload hanya gambar.';
            }
        }
    }

    public function updatedSelectedTemplate($value)
    {
        if ($this->isTemplateLocked) {
            return;
        }

        $template = Template::find($value);
        if ($template) {
            $this->message = $template->message;
            $this->showButton = true;
            $this->buttonText = $template->buttonText;
        } else {
            $this->message = '';
            $this->showButton = false;
            $this->buttonText = '';
        }
    }
    
    public function render()
    {
        return view('livewire.broadcast-preview');
    }
}