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

    /**
     *
     * This function renders a view located in the 'views/admin' or 'views/client' folder.
     *
     * @param string $viewName The name of the view to render (without extension)
     * @param string $role The role of the user (either 'admin' or 'client'). Defaults to 'client'.
     * @param array $data
     * @return void
     */
    public function render(string $viewName, string $role = "client", array $data=[]): void {
        // Define valid roles
        $validRoles = ["client", "admin"];

        // Validate the role to ensure it's either 'client' or 'admin'
        if (!in_array($role, $validRoles)) {
            $role = "client"; // Default to 'client' if an invalid role is passed
        }

        // Determine the folder based on the role
        $folder = $role === "admin" ? "admin" : "client";

        // Attempt to include the view file
        $viewPath = ROOT . 'views/' . $folder . '/' . $viewName . '.php';
        extract($data);

        // Check if the file exists before requiring it
        if (file_exists($viewPath)) {
            require_once($viewPath);
        } else {
            // Handle the error if the file doesn't exist (you could display a 404 or log it)
            echo "View file '$viewPath' not found.";
        }
    }

}

