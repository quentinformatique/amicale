<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Engine\DevelopmentUtilities\Debug;
use MvcLite\Models\Offer;
use MvcLite\Router\Engine\Request;
use MvcLite\Views\Engine\View;

class PublishController extends Engine\Controller
{

    public function render(): void
    {
        View::render("Publish");
    }

    public function createOffer(Request $request): void
    {
        // Retrieve form data from request
        $photos = "nothing yet";
        $title = $request->getInput('titre');
        $price = $request->getInput('prix');
        $description = $request->getInput('description');
        $agentCode = $request->getInput('code_agent');
        $phone = $request->getInput('phone');
        $email = $request->getInput('email');
        $accept = $request->getInput('accept');
        $type = $request->getInput('type');

        // type gestion
        if (sizeof($type) > 1) {
            View::render("Publish", ['error' => 'Veuillez choisir un seul type.']);
            return;
        } else if (sizeof($type) == 0) {
            View::render("Publish", ['error' => 'Veuillez choisir un type.']);
            return;
        } else {
            $type = $type[0];
        }


        // Validate form data
        if (empty($title) || empty($price) || empty($description) || empty($agentCode) || empty($phone) || empty($email) || $accept != "on" || empty($type)) {
            // Return error message to user
            Debug::dd($title, $price, $description, $agentCode, $phone, $email, $accept, $type);
            View::render("Publish", ['error' => 'Tous les champs sont obligatoires.']);
            return;
        }

        // Handle file uploads
        /* TODO: Handle file uploads
        $photoPaths = [];
        for ($i = 0; $i < count($photos['name']); $i++) {
            if (is_uploaded_file($photos['tmp_name'][$i])) {
                $targetPath = "Resources/Medias/databaseImages/" . basename($photos['name'][$i]);
                if (move_uploaded_file($photos['tmp_name'][$i], $targetPath)) {
                    $photoPaths[] = $targetPath;
                } else {
                    // Return error message to user
                    View::render("Publish", ['error' => 'Failed to upload photo.']);
                    return;
                }
            }
        }
        */

        // Save Offer to database
        $photoPath= "empty";
        $offer = Offer::newOffer($type, $title, $price, $description, $agentCode, $phone, $email, $photoPath);

        // Redirect user to success page
        View::render("success", [
            "offer" => $offer
        ]);
    }

}