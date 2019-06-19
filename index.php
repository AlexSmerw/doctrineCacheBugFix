<?php

$entityManger = EntityManagerFactory::getInstance();

$carRepository = $entityManger->getRepository(Car\Car::class);
$car = $carRepository->find(1);
$engine = $car->getEngine();
$power = $engine->getPower();
$model = $engine->getModel();
$entityManger->clear();
