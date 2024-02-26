<?php

namespace MvcLite\Models;

use MvcLite\Database\Engine\Database;
use MvcLite\Models\Engine\Model;

class Offer extends Engine\Model
{

    public static function getOffers(): array
    {
        return self::select()
            ->with('publisher')
            ->orderBy('date', 'DESC')
            ->execute()
            ->publish();
    }

    public static function getVerifiedOffersByCategorySortedByPrice(string $category): array
    {
        return Offer::select()
            ->where('type', $category)
            ->where('valid', 1)
            ->with('publisher')
            ->orderBy('price')
            ->execute()
            ->publish();
    }

    public static function getVerifiedOffersByCategorySortedByDate(string $category): array
    {
        return Offer::select()
            ->where('type', $category)
            ->where('valid', 1)
            ->with('publisher')
            ->orderBy('date', 'DESC')
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

    public static function newOffer(mixed $type, mixed $title, mixed $price, mixed $description, mixed $agentCode, mixed $phone, mixed $email, array $photoPaths): void
    {
        Database::query(
            "INSERT INTO offers (type, titre, prix, description, id_agent, telephone, email, valid, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
            $type, $title, $price, $description, $agentCode, $phone, $email, 0, date('Y-m-d')
        );
    }

    public function publisher(): Model
    {
        return $this->belongsTo(User::class, 'id_agent');
    }


}