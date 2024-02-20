<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Models\Offer;
use MvcLite\Views\Engine\View;

class LocationController extends Engine\Controller
{
    public function render(): void
    {
        $sortOrder = $_GET['filter'] ?? 'date'; // Get the sort order from the request
        View::render("Sell", [
            "offers" => $this->getVerifiedLocationsOffers($sortOrder)
        ]);
    }

    private function getVerifiedLocationsOffers(mixed $sortOrder): array
    {
        return match ($sortOrder) {
            'price' => Offer::getVerifiedOffersByCategorySortedByPrice("1"),
            default => Offer::getVerifiedOffersByCategorySortedByDate("1"),
        };
    }

}