<?php

namespace MvcLite\Models;

use MvcLite\Models\Engine\Model;

class Offer extends Engine\Model
{

    public static function getOffers(): Engine\ModelCollection
    {
        return self::select()->execute();
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

    public function publisher(): User
    {
        return $this->belongsTo(User::class, 'id_agent');
    }

}