<?php

/*
 * routes.php
 * MVCLite framework by belicfr
 */


use MvcLite\Controllers\BarterController;
use MvcLite\Controllers\IndexController;
use MvcLite\Controllers\LocationController;
use MvcLite\Controllers\MessagesController;
use MvcLite\Controllers\PublishController;
use MvcLite\Controllers\SellController;
use MvcLite\Controllers\SuccessController;
use MvcLite\Router\Engine\Router;


Router::get("/", IndexController::class, "render")->setName("index");
Router::get("/publish", PublishController::class, "render")->setName("publish");
Router::get("/location", LocationController::class, "render")->setName("location");
Router::get("/barter", BarterController::class, "render")->setName("barter");
Router::get("/sell", SellController::class, "render")->setName("sell");
Router::post("/submit-offer", PublishController::class, "createOffer")->setName("submitOffer");
