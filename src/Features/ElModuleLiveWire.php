<?php

namespace Fnp\ElModule\Features;

use Fnp\ElModule\Models\LiveWireModel;
use Illuminate\Support\Facades\Config;
use Livewire\Livewire;

trait ElModuleLiveWire
{
    abstract function defineLiveWire(LiveWireModel $liveWire);

    public function bootElModuleLiveWireFeature()
    {
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