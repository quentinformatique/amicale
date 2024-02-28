<?php

namespace MvcLite\Controllers;

use Exception;
use MvcliteCore\Controllers\Controller;
use MvcLite\Models\Offer;
use MvcliteCore\Engine\DevelopmentUtilities\Debug;
use MvcliteCore\Engine\InternalResources\Storage;
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
        // TODO: refactor this method to be more readable
        // Retrieve form data from request
        $photos = $request->getFile('photo')->asImage();
        $title = $request->getInput('titre');
        $price = (float) $request->getInput('prix');
        $description = $request->getInput('description');
        $agentCode = $request->getInput('code_agent');
        $phone = $request->getInput('phone');
        $email = $request->getInput('email');
        $type = $request->getInput('type');

        // type gestion
        if (sizeof($type) > 1) {
            View::render("Publish", ['error' => 'Veuillez choisir un seul type.']);
            return;
        } else if (sizeof($type) == 0) {
            View::render("Publish", ['error' => 'Veuillez choisir un type.']);
            return;
        } else {
            $type = (int) $type[0];
        }


        // we name the photo as the agent code + 10 random characters and the extension
        $photoName = $agentCode . substr(md5(uniqid(rand(), true)), 0, 10) . "." . $photos->
        $photos->setName($photoName);

        $photoPath = "databaseImages/" . $photos->getName();
        $offer = Offer::newOffer($type, $title, $price, $description, $agentCode, $phone, $email, $photoPath);
        Storage::createImage($photos, "Medias/databaseImages");


        // Redirect user to success page
        View::render("success", [
            "offer" => $offer
        ]);
    }

    public function validateFormInputs(Request $request): void
    {
        // Retrieve form data from request
        $photos = $request->getFile('photo')->asImage();
        $title = $request->getInput('titre');
        $price = (float) $request->getInput('prix');
        $description = $request->getInput('description');
        $agentCode = $request->getInput('code_agent');
        $phone = $request->getInput('phone');
        $email = $request->getInput('email');
        $accept = $request->getInput('accept');
        $type = $request->getInput('type');

        // Validate form data
        if (empty($title) || empty($price) || empty($description) || empty($agentCode) || empty($phone) || empty($email) || $accept != "on" || empty($type)) {
            // Return error message to user
            View::render("Publish", ['error' => 'Tous les champs sont obligatoires.']);
            return;
        }

        // type gestion
        if (sizeof($type) > 1) {
            View::render("Publish", ['error' => 'Veuillez choisir un seul type.']);
            return;
        } else if (sizeof($type) == 0) {
            View::render("Publish", ['error' => 'Veuillez choisir un type.']);
            return;
        } else {
            $type = (int) $type[0];
        }

        // photo gestion
        if ($photos->isImage()) {
            if ($photos->getSize() > 1000000) {
                View::render("Publish", ['error' => 'La taille de l\'image ne doit pas dépasser 1Mo.']);
                return;
            }
        } else {
            View::render("Publish", ['error' => 'Le fichier doit être une image.']);
            return;
        }

        // price gestion;, > 0 and less than 2 decimals
        if (!is_float($price) && $price < 0 && !preg_match("/^[0-9]+(\.[0-9]{1,2})?$/", $price)) {
            View::render("Publish", ['error' => 'Le prix doit être un nombre, positif et avec 2 décimales maximum.']);
            return;
        }

        // phone gestion
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            View::render("Publish", ['error' => 'Le numéro de téléphone doit être composé de 10 chiffres.']);
            return;
        }

        // email gestion
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            View::render("Publish", ['error' => 'L\'adresse email n\'est pas valide.']);
            return;
        }

        // description gestion
        if (strlen($description) > 1000) {
            View::render("Publish", ['error' => 'La description ne doit pas dépasser 1000 caractères.']);
            Debug::dd($description);
        }

        // title gestion
        if (strlen($title) > 100) {
            View::render("Publish", ['error' => 'Le titre ne doit pas dépasser 100 caractères.']);
            return;
        }

        // the checkox accept gestion
        if ($accept != "on") {
            View::render("Publish", ['error' => 'Vous devez accepter les conditions d\'utilisation.']);
            return;
        }

        // Create offer
        $this->createOffer($request);
    }
}