<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class SettingIndex extends Component
{
    public function runSitemapGenerator()
    {
        Artisan::call('sitemap:generate');
    }

    public function runBackup()
    {
        Artisan::call('backup:run');
    }

    public function runBackupDb()
    {
        Artisan::call('backup:run --only-db');
    }

    public function render()
    {
        return view('livewire.setting-index')->layout('layouts.main');
    }
}
