<?php

namespace MvcLite\Models;

use MvcLite\Models\Engine\Model;

class Offer extends Engine\Model
{

    public static function getOffers(): array
    {
        return self::select()
            ->with('publisher')
            ->execute()
            ->publish();
    }

    public static function getVerifiedOffersByCategorySortedByPrice(string $category): array
    {
        return Offer::select()
            ->where('type', $category)
            ->where('valid', 1)
            ->with('publisher')
            ->orderBy('price', 'ASC') // Add this line to sort by price
            ->execute()
            ->publish();
    }

    public static function getVerifiedOffersByCategorySortedByDate(string $category): array
    {
        return Offer::select()
            ->where('type', $category)
            ->where('valid', 1)
            ->with('publisher')
            ->orderBy('date', 'DESC') // Add this line to sort by date
            ->execute()
            ->publish();
    }


    public static function getVerifiedOffersByCategory($category): array
    {
        return Offer::select()
            ->where('type', $category)
            ->where('valid', 1)
            ->with('publisher')
            ->execute()
            ->publish();
    }

    public static function getUnverifiedOffersByCategory($category): array
    {
        return Offer::select()
            ->where('type', $category)
            ->where('valid', 0)
            ->execute()
            ->publish();
    }

    public function publisher(): Model
    {
        return $this->belongsTo(User::class, 'id_agent');
    }

}