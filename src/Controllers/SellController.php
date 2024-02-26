<?php

namespace MvcLite\Controllers;

use MvcliteCore\Controllers\Controller;
use MvcLite\Models\Offer;
use MvcliteCore\Views\View;

class SellController extends Controller
{
    public function render(): void
    {
        $sortOrder = $_GET['filter'] ?? 'date'; // Get the sort order from the request
        View::render("Sell", [
            "offers" => $this->getVerifiedSalesOffers($sortOrder)
        ]);
    }

    private function getVerifiedSalesOffers(string $sortOrder): array
    {
        return match ($sortOrder) {
            'price' => Offer::getVerifiedOffersByCategorySortedByPrice("2"),
            default => Offer::getVerifiedOffersByCategorySortedByDate("2"),
        };
    }
}