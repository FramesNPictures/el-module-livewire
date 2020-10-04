<?php

namespace Fnp\ElModule\Models;

class LiveWireModel
{
    protected $components = [];
    protected $defaultNamespace = NULL;
    protected $defaultViewFolder = NULL;

    /**
     * @return array
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    /**
     * @param $name
     * @param $className
     *
     * @return $this
     */
    public function addComponent($name, $className)
    {
        $this->components[$name] = $className;

        return $this;
    }

    /**
     * @return null
     */
    public function getDefaultNamespace()
    {
        return $this->defaultNamespace;
    }

    /**
     * @param null $defaultNamespace
     *
     * @return LiveWireModel
     */
    public function setDefaultNamespace($defaultNamespace)
    {
        $this->defaultNamespace = $defaultNamespace;

        return $this;
    }

    /**
     * @return null
     */
    public function getDefaultViewFolder()
    {
        return $this->defaultViewFolder;
    }

    /**
     * @param null $defaultViewFolder
     *
     * @return LiveWireModel
     */
    public function setDefaultViewFolder($defaultViewFolder)
    {
        $this->defaultViewFolder = $defaultViewFolder;

        return $this;
    }
}