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
    protected function loadModel(string $modelName): object
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
     * @param string $path where the folder views is located: (either /views or /admin/views).
     * by default, it's an empty string(the root folder)
     * @param array $data
     * @return void
     */
    protected static function render(string $viewName, string $path = "", array $data=[]): void {

        // Attempt to include the view file
        $viewPath = ROOT . $path. '/views/' . $viewName . '.php';
        extract($data);

        // Check if the file exists before requiring it
        if (file_exists($viewPath)) {
            require_once ROOT . 'components/navbar.php';
            require_once($viewPath);
        } else {
            // Handle the error if the file doesn't exist
            echo "View file '$viewPath' not found.";
        }
    }

    protected static function setFlashMessage(string $message, string $type): void
    {
        $_SESSION['flash_message'] = ['message' => $message, 'type' => $type];
    }


    protected static function setFlashMessageAndRender($message,$alert_type, $view_file):void{
        self::setFlashMessage($message, $alert_type);
        self::render($view_file);
    }

}

