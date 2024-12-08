<?php

// app/MainController.php
namespace app;

abstract class MainController
{
    // array that store all loaded models
    protected array $models = [];

    /**
     * Loads a model from the 'models' directory.
     *
     * This method loads the model only if it has not been previously loaded.
     * If the model is already loaded, it returns the existing instance.
     *
     * @param string $modelName The name of the model to load (without the '.php' extension).
     * @return object An instance of the specified model class.
     */
    public function loadModel(string $modelName): object
    {
        // Check if the model is already loaded
        if (!isset($this->models[$modelName])) {
            require_once(ROOT . 'models/' . $modelName . '.php');
            $modelClass = 'models\\' . $modelName;
            $this->models[$modelName] = new $modelClass();
        }
        // Return the model directly if it is already loaded
        return $this->models[$modelName];
    }

}

