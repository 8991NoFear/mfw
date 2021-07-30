<?php
namespace Src\Controller;

class BaseController {

    public static function view($view, $data = null) {
        $file_path = __DIR__ . '/../View/' . $view . '.php';
        if (file_exists($file_path)) {
            require_once $file_path;
        } else {
             self::abort(404);
        }
    }

    /**
     * @return: bool
     */
    public static function abort($code) {
        switch($code) {
            case 404:
                echo "404 not found";
                break;
            case 500:
                echo "500 internal server error";
                break;
        }
    }
}