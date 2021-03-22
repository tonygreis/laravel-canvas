<?php

namespace App\Http\Livewire;

use App\Models\Serie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SerieIndex extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $showCreateModal = false;
    public $title;
    public $featuredImage;
    public $description;
    public $serieId;
    public $oldImage;
    public $isPublished = false;

    public $search;
    protected $queryString = ['search'];

    public function showModal()
    {
        $this->showCreateModal = true;
    }

    public function updatedShowCreateModal()
    {
        $this->reset();
    }

    public function showEditModal($id)
    {
        $this->reset();
        $this->serieId = $id;
        $this->loadForm();
    }
    public function loadForm()
    {
        $serie = Serie::findOrFail($this->serieId);
        $this->showCreateModal = true;
        $this->title = $serie->title;
        $this->oldImage = $serie->featured_image;
        $this->description = $serie->description;
        $this->isPublished = $serie->is_published;
    }

    public function storeSerie()
    {
        $this->validate([
            'title' => 'required',
            'featuredImage' => 'required|image|max:2045',
            'description' => 'required',
            'isPublished' => 'required'
        ]);
        $image_name = $this->featuredImage->getClientOriginalName();
        $this->featuredImage->storeAs('public/series/', $image_name);

        $serie = new Serie();
        $serie->title = $this->title;
        $serie->slug = Str::slug($this->title);
        $serie->featured_image = Storage::url('public/series/'. $image_name);
        $serie->description = $this->description;
        $serie->is_published = $this->isPublished;
        $serie->save();

        $this->showCreateModal = false;
        $this->reset();
    }

    public function updateSerie()
    {
        $this->validate([
            'title' => 'required',
            'featuredImage' => 'nullable|image|max:2045',
            'description' => 'required',
            'isPublished' => 'required'
        ]);

        if ($this->featuredImage) {
            $file = pathinfo($this->oldImage);
            Storage::delete('public/series/'. $file['basename']);
            $this->oldImage = $this->featuredImage->getClientOriginalName();
            $this->featuredImage->storeAs('public/series/', $this->oldImage);
        }
        $serie = Serie::findOrFail($this->serieId);
        $serie->title = $this->title;
        $serie->slug = Str::slug($this->title);
        $serie->description = $this->description;
        $serie->is_published = $this->isPublished;
        $serie->featured_image = Storage::url('public/series/'. $this->oldImage);
        $serie->save();
        $this->showCreateModal = false;
        $this->reset();
    }

    public function destroySerie($id)
    {
        $serie = Serie::findOrFail($id);
        $file = pathinfo($serie->featured_image);
        Storage::delete('public/series/'. $file['basename']);
        $serie->delete();
    }

    public function render()
    {
        return view('livewire.serie-index', [
               'series' => Serie::orderBy('created_at', 'DESC')->where('title', 'like', '%'.$this->search.'%')->paginate(12)
            ])->layout('layouts.main');
    }
}
