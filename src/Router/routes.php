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
use MvcLite\Router\Engine\Router;


Router::get("/", IndexController::class, "render")->setName("index");
Router::get("/Publish", PublishController::class, "render")->setName("publish");
Router::get("/Location", LocationController::class, "render")->setName("location");
Router::get("/Barter", BarterController::class, "render")->setName("barter");
Router::get("/Sell", SellController::class, "render")->setName("sell");
