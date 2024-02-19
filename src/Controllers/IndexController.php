<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Engine\DevelopmentUtilities\Debug;
use MvcLite\Engine\InternalResources\Storage;
use MvcLite\Models\Offer;
use MvcLite\Views\Engine\View;

class IndexController extends Engine\Controller
{



    public function render(): void
    {
        // we keep the last 10 offers
        $offers = $this->getOffers();
        if (count($offers) > 10) {
            $offers = array_slice($offers, -10);
        }
        View::render("index", [
            "offers" => $offers
        ]);

    }

    private function getOffers(): array
    {
        return Offer::getOffers();
    }

}