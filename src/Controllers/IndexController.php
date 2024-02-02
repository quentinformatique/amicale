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
        Storage::include("Style/css/main.css");
        Storage::include("Style/css/form.css");
        Storage::include("Style/css/footer.css");

        // jquery
        // Storage::include("../../node_modules/jquery/dist/jquery.min.js", importMethod: "defer");


        View::render("index");
    }

}