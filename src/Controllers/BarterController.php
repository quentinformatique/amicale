<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Models\Offer;
use MvcLite\Views\Engine\View;

class BarterController extends Engine\Controller
{


    public function render(): void
    {
        $sortOrder = $_GET['filter'] ?? 'date'; // Get the sort order from the request
        View::render("Barter", [
            "offers" => $this->getVerifiedBarterOffers($sortOrder)
        ]);
    }

    private function getVerifiedBarterOffers(mixed $sortOrder): array
    {
        return match ($sortOrder) {
            'price' => Offer::getVerifiedOffersByCategorySortedByPrice("3"),
            default => Offer::getVerifiedOffersByCategorySortedByDate("3"),
        };
    }

}