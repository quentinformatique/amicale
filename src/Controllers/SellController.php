<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Engine\DevelopmentUtilities\Debug;
use MvcLite\Models\Offer;
use MvcLite\Views\Engine\View;

class SellController extends Engine\Controller
{

    public function __construct()
    {
        parent::__construct();

        // Empty constructor.
    }

    public function render(): void
    {
        View::render("Sell", [
            "offers" => $this->getOffers()
        ]);
    }

    private function getOffers()
    {
        return Offer::getOffers();
    }
}