<?php

namespace MvcLite\Controllers;

use MvcliteCore\Controllers\Controller;
use MvcLite\Models\Offer;
use MvcliteCore\Views\View;

class LocationController extends Controller
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