<?php

namespace Fnp\ElModule\LiveWire\Features;

use Fnp\ElModule\LiveWire\Models\LiveWireModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Livewire\Livewire;

trait ModuleLiveWire
{
    abstract public function defineLiveWire(LiveWireModel $liveWire);

    public function bootModuleLiveWireFeature(Application $application)
    {
        // Don't bother registering LiveWire if running in console.
        if ($application->runningInConsole()) {
            return;
        }

        $model = new LiveWireModel();
        $this->defineLiveWire($model);

        foreach($model->getComponents() as $name=>$class)
            LiveWire::component($name, $class);

        if ($model->getDefaultNamespace())
            Config::set('livewire.class_namespace', $model->getDefaultNamespace());

        if ($model->getDefaultViewFolder())
            Config::set('livewire.view_path', $model->getDefaultViewFolder());
    }
}
