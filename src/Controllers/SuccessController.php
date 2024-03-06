<?php

namespace MvcLite\Controllers;

use MvcliteCore\Controllers\Controller;
use MvcliteCore\Engine\DevelopmentUtilities\Debug;
use MvcliteCore\Engine\InternalResources\Delivery;
use MvcliteCore\Router\Request;
use MvcliteCore\Views\View;

class SuccessController extends Controller
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function render(): void
    {
        View::render("success", [
            "offer" => Delivery::get()->getProps()["offer"],
        ]);
    }
}