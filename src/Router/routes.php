<?php

/*
 * routes.php
 * MVCLite framework by belicfr
 */


use MvcLite\Controllers\BarterController;
use MvcLite\Controllers\IndexController;
use MvcLite\Controllers\LocationController;
use MvcLite\Controllers\PublishController;
use MvcLite\Controllers\SellController;
use MvcLite\Controllers\SuccessController;
use MvcliteCore\Router\Router;


Router::get("/", IndexController::class, "render")
    ->setName("index");
Router::get("/publish", PublishController::class, "render")
    ->setName("publish");
Router::get("/location", LocationController::class, "render")
    ->setName("location");
Router::get("/barter", BarterController::class, "render")
    ->setName("barter");
Router::get("/sell", SellController::class, "render")
    ->setName("sell");
Router::post("/publish", PublishController::class, "createOffer")
    ->setName("post.publish");
Router::get("/success", SuccessController::class, "render")
    ->setName("success");