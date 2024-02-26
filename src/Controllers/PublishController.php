<?php

namespace MvcLite\Controllers;

use MvcliteCore\Controllers\Controller;
use MvcLite\Models\Offer;
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
            $type = $type[0];
        }


        // Handle file upload
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo = $_FILES['photo'];
            $photoPath = "uploads/" . $photo['name'];
            move_uploaded_file($photo['tmp_name'], $photoPath);
        } else {
            View::render("Publish", ['error' => 'Veuillez choisir une photo.']);
        }


        // Save Offer to database
        $photoPath= "empty";
        $offer = Offer::newOffer($type, $title, $price, $description, $agentCode, $phone, $email, $photoPath);

        // Redirect user to success page
        View::render("success", [
            "offer" => $offer
        ]);
    }

}