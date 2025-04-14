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
        $viewPath = ROOT . 'views/' . $viewName . '.php';
        if($path != ""){
            $viewPath = ROOT . 'views/'. $path . '/' . $viewName . '.php';
        }
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


    /**
     * Store an alert message in the session with its type.
     *
     * This method stores a flash message and its type (e.g., success, error, etc.)
     * in the session, so it can be displayed on the next page load.
     *
     * @param string $message The alert message to store.
     * @param string $type The type of the alert (e.g., 'warning', 'error', 'success', 'info').
     *
     * @return void
     */
    protected static function setFlashMessage(string $message, string $type): void
    {
        $_SESSION['flash_message'] = ['message' => $message, 'type' => $type];
    }

    /**
     * Store an alert message in the session and render a view.
     *
     * This method first stores a flash message in the session using
     * the `setFlashMessage` method, then renders the specified view file.
     *
     * @param string $message The alert message to store.
     * @param string $alert_type The type of the alert (e.g., 'warning', 'error', 'success', 'info').
     * @param string $view_file The name of the view file to render after storing the flash message.
     *
     * @return void
     */
    protected static function setFlashMessageAndRender(
        string $message,
        string $alert_type,
        string $view_file):void
    {
        self::setFlashMessage($message, $alert_type);
        self::render($view_file);
    }

}

