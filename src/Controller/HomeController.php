<?php
namespace Src\Controller;

class HomeController extends BaseController {
    public function index() {
        return self::view('index');
    }
}