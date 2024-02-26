<?php

namespace MvcLite\Controllers;

use MvcliteCore\Controllers\Controller;
use MvcLite\Models\Offer;
use MvcliteCore\Views\View;

class BarterController extends Controller
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