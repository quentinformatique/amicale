<?php

namespace MvcLite\Models;

use MvcLite\Models\Engine\Model;

class Offer extends Engine\Model
{

    public static function getOffers(): array
    {

        return [
            "offer1" => [
                'title' => "annonce de voiture de fou",
                'price' => "12000",
                'imagePath' => "databaseImages/voiture.jpg",
                'date' => "16/12/2004"
            ],
            "offer2" => [
                'title' => "vend pc gamer ultra",
                'price' => "450",
                'imagePath' => "databaseImages/pc.png",
                'date' => "16/12/2004"
            ],
            "offer3" => [
                'title' => "vend ps4 pro neuve, 1To, 3 jeux, 2 manettes",
                'price' => "400",
                'imagePath' => "databaseImages/ps4.png",
                'date' => "16/12/2004"
            ],
        ];
    }
}