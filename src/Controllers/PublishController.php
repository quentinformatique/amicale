<?php

namespace MvcLite\Controllers;

use Exception;
use MvcliteCore\Controllers\Controller;
use MvcLite\Models\Offer;
use MvcliteCore\Engine\DevelopmentUtilities\Debug;
use MvcliteCore\Engine\InternalResources\Delivery;
use MvcliteCore\Engine\InternalResources\Storage;
use MvcliteCore\Engine\Security\Validator;
use MvcliteCore\Router\Redirect;
use MvcliteCore\Router\Request;
use MvcliteCore\Views\View;

class PublishController extends Controller
{

    public function render(): void
    {
        View::render("Publish");
    }

    public function createOffer(Request $request): void
    {
        $validator = (new Validator($request))
            ->required(['titre', 'prix', 'description', 'code_agent', 'phone', 'email', 'accept', 'type'])
            ->email('email')
            ->matches('phone', '/^[0-9]{10}$/', "Le numéro de téléphone doit être composé de 10 chiffres.")
            ->matches('prix', '/^[0-9]+(\.[0-9]{1,2})?$/', "Le prix doit être un nombre, positif et avec 2 décimales maximum.")
            ->matches('description', '/^.{0,1000}$/', "La description ne doit pas dépasser 1000 caractères.")
            ->matches('titre', '/^.{0,100}$/', "Le titre ne doit pas dépasser 100 caractères.")
            ->matches('code_agent', '/^[0-9]{6}$/', "Le code agent doit être composé de 6 chiffres.")
            ->matches('accept', '/on/', "Vous devez accepter les conditions d'utilisation.");

        // type gestion
        if (sizeof($request->getInput('type')) > 1) {
            View::render("Publish", ['error' => 'Veuillez choisir un seul type.']);
            return;
        } else if (sizeof($request->getInput('type')) == 0) {
            View::render("Publish", ['error' => 'Veuillez choisir un type.']);
            return;
        } else {
            $type = (int) $request->getInput('type')[0];
        }

        if ($validator->hasFailed()) {
            Redirect::to('Publish')
                ->withValidator($validator)
                ->redirect();
        }
        // Retrieve form data from request
        $photos = $request->getFile('photo')->asImage();
        $title = $request->getInput('titre');
        $price = (float) $request->getInput('prix');
        $description = $request->getInput('description');
        $agentCode = $request->getInput('code_agent');
        $phone = $request->getInput('phone');
        $email = $request->getInput('email');
        // we name the photo as the agent code + 10 random characters and the extension
        $photoName = $agentCode . substr(md5(uniqid(rand(), true)), 0, 10) . "." . $photos->getExtension();
        $photos->setName($photoName);

        $photoPath = "databaseImages/" . $photos->getName();
        $offer = Offer::newOffer($type, $title, $price, $description, $agentCode, $phone, $email, $photoPath);
        Storage::createImage($photos, "Medias/databaseImages");

        // Redirect user to success page with offer data
        Delivery::get()
            ->add("offer", $offer)
            ->save();

        Redirect::route("success")
            ->redirect();
    }
}