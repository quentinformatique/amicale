<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Views\Engine\View;

class BarterController extends Engine\Controller
{


    public function render(): void
    {
        View::render("Barter");
    }

}