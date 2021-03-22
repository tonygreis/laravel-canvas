<?php

namespace App\Http\Livewire;

use App\Models\Episode;
use App\Models\Serie;
use Livewire\Component;

class SerieShow extends Component
{
    public $serie;
    public $episodeId;
    public $showCreateModal = false;

    public $name;
    public $description;
    public $embedUrl = 'https://www.youtube.com/embed/';
    public $isPublished;

    public $search;
    protected $queryString = ['search'];

    protected $rules = [
        'name' => 'required|min:6',
        'embedUrl' => 'required|url',
        'description' => 'required'
    ];

    public function showModal()
    {
        $this->showCreateModal = true;
    }

    public function updatedShowCreateModal()
    {
        $this->reset('episodeId', 'name', 'description', 'embedUrl', 'isPublished');
    }

    public function showEditModal($id)
    {
        $this->reset('episodeId', 'name', 'description', 'embedUrl', 'isPublished');
        $this->episodeId = $id;
        $this->loadForm();
    }
    public function loadForm()
    {
        $episode = Episode::findOrFail($this->episodeId);
        $this->showCreateModal = true;
        $this->name = $episode->name;
        $this->embedUrl = $episode->embed_url;
        $this->description = $episode->description;
        $this->isPublished = $episode->is_published;
    }
    public function storeEpisode()
    {
        $this->validate();
        $episode = new Episode();
        $episode->serie_id = $this->serie->id;
        $episode->name = $this->name;
        $episode->embed_url = $this->embedUrl;
        $episode->description = $this->description;
        $episode->is_published  = $this->isPublished;
        $episode->save();
        $this->showCreateModal = false;
        $this->reset('episodeId', 'name', 'description', 'embedUrl', 'isPublished');
    }

    public function updateEpisode()
    {
        $this->validate();

        $episode = Episode::findOrFail($this->episodeId);
        $episode->name = $this->name;
        $episode->description = $this->description;
        $episode->embed_url = $this->embedUrl;
        $episode->is_published = $this->isPublished;
        $episode->save();

        $this->showCreateModal = false;
        $this->reset('episodeId', 'name', 'description', 'embedUrl', 'isPublished');
    }

    public function destroyEpisode($id)
    {
        Episode::findOrFail($id)->delete();
        $this->reset('episodeId', 'name', 'description', 'embedUrl', 'isPublished');
    }

    public function mount(Serie $serie)
    {
        $this->serie = $serie;
    }

    public function render()
    {
        return view('livewire.serie-show', [
            'episodes' => Episode::orderBy('updated_at', 'DESC')
                            ->where('serie_id', $this->serie->id)
                            ->where('name', 'like', '%'.$this->search.'%')
                            ->paginate(12)
        ])->layout('layouts.main');
    }
}
