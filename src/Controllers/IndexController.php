<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Engine\InternalResources\Storage;
use MvcLite\Views\Engine\View;

class IndexController extends Engine\Controller
{

    public function __construct()
    {
        parent::__construct();

        // Empty constructor.
    }

    public function render(): void
    {
        // to import css, le chemin par de Ressources
        Storage::include("Css/ready.css");
        Storage::include("Css/css/style.css");
        Storage::include("Css/css/form.css");
        Storage::include("Css/css/footer.css");

        // add js
        Storage::include("js/footer.js", );
        View::render("Index");
    }

}