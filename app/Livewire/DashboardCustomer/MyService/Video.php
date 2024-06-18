<?php

namespace App\Livewire\DashboardCustomer\MyService;


use App\Models\certificate;
use App\Models\module;
use App\Models\service;
use App\Models\video as ModelsVideo;

use Livewire\Component;

class Video extends Component
{

    public service $service;
    public module $module;

    public function mount()
    {
    }
    public function render()
    {
        // $exhibitors = $this->service->exhibitors;
        $certificate = $this->service->certificate;
        // $videoActualId = $this->module->video->id;

        // $videos = ModelsVideo::whereHas('module', function ($query) use ($videoActualId) {
        //     $query->whereHas('certificate', function ($query) use ($videoActualId) {
        //         $query->where('service_id', $this->service->id);
        //     });
        // })->where('id', '!=', $videoActualId)->get();

        //dd($this->certificate);

        // $videoActual = $this->certificate->module->video->id;
        // dd($videoActual);
        // $videos = $this->certificate->module->video;
        // dd($this->videos);
        // dd($videos);

        //$modulos = $certificate->modules;



        $modules = $certificate->modules;
        $videoActualId = $this->module->video->id;
        $filteredModules = collect();

        // Filtrar los módulos excluyendo el módulo actual que contiene el video actual
        foreach ($modules as $module) {
            // Comprueba si el módulo contiene el video actual
            $moduleVideo = $module->video;
            if (!$moduleVideo || $moduleVideo->id != $videoActualId) {
                $filteredModules->push($module);
            }
        }



        return view('livewire.dashboard-customer.my-service.video', compact('filteredModules'));
    }
}

