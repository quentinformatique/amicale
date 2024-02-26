<?php

namespace MvcLite\Models;

use MvcLite\Database\Engine\Database;
use MvcLite\Engine\DevelopmentUtilities\Debug;
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

    public static function newOffer(mixed $type, mixed $title, mixed $price, mixed $description, mixed $agentCode, mixed $phone, mixed $email, string $photoPath): mixed
    {
        // if the user is not an agent, we need to create a new agent
        $agent = User::getUserByCode($agentCode)->asArray();
        if (count($agent) == 0) {
            $agent = User::newAgent($agentCode, $phone, $email);
        } else {
            $agent = $agent[0];
        }
        Debug::dump($agent , $price, $description, $title, $type, $photoPath, date("Y-m-d H:i:s"));

        Database::query("INSERT INTO offers (id_agent, price, description, title, type, image, date) VALUES (?, ?, ?, ?, ?, ?, ?)", [$agent->id, $price, $description, $title, $type, $photoPath, date("Y-m-d H:i:s")]);

        $offer = self::select()
            ->where('id_agent', $agent->id)
            ->where('price', $price)
            ->where('description', $description)
            ->where('title', $title)
            ->where('type', $type)
            ->where('image', $photoPath)
            ->execute()
            ->publish();

        return $offer[0];


    }

    public function publisher(): Model
    {
        return $this->belongsTo(User::class, 'id_agent');
    }


}