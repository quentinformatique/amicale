<?php

namespace MvcLite\Models;

use MvcliteCore\Database\Database;
use MvcliteCore\Models\Model;

class Offer extends Model
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

    public static function newOffer(mixed $type, string $title, float $price, string $description, mixed $agentCode, mixed $phone, string $email, string $photoPath): mixed
    {
        // if coordinates of the agent are not in the database, add them
        $agent = User::getUser($agentCode, $phone, $email)->get(0);
        if (empty($agent)) {
            User::newAgent($agentCode, $phone, $email);
            $agent = User::getUser($agentCode, $phone, $email)->get(0);
        }
        $id = $agent->getPublicAttributes()['id'];

        Offer::create(
            [
                'id_agent' => $id,
                'price' => $price,
                'description' => $description,
                'title' => $title,
                'type' => $type,
                'image' => $photoPath,
                'date' => date("Y-m-d H:i:s")
            ]
        );

        $offer = self::select()
            ->where('id_agent', $id)
            ->where('price', $price)
            ->where('description', $description)
            ->where('title', $title)
            ->where('type', $type)
            ->where('image', $photoPath)
            ->with('publisher')
            ->execute()
            ->publish();

        return $offer[0];


    }

    public function publisher(): Model
    {
        return $this->belongsTo(User::class, 'id_agent');
    }


}