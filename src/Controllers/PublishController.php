<?php

namespace MvcLite\Controllers;

use MvcLite\Controllers\Engine\Controller;
use MvcLite\Models\Offer;
use MvcLite\Views\Engine\View;

class PublishController extends Engine\Controller
{

    public function render(): void
    {
        View::render("Publish");
    }

    public function createOffer(): void
    {
        // Retrieve form data from request
        $photos = $_FILES['photos'];
        $type = $_POST['type'];
        $title = $_POST['titre'];
        $price = $_POST['prix'];
        $description = $_POST['description'];
        $agentCode = $_POST['code_agent'];
        $phone = $_POST['telephone'];
        $email = $_POST['email'];
        $accept = $_POST['accept'];

        // Validate form data
        if (empty($title) || empty($price) || empty($description) || empty($agentCode) || empty($phone) || empty($email) || empty($accept)) {
            // Return error message to user
            View::render("Publish", ['error' => 'All fields are required.']);
            return;
        }

        // Handle file uploads
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

        // Save Offer to database
        Offer::newOffer($type, $title, $price, $description, $agentCode, $phone, $email, $photoPaths);

        // Redirect user to success page
        header("Location: /success");
    }

}