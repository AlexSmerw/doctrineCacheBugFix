<?php

$entityManger = EntityManagerFactory::getInstance();

$engine = new Car\Engine('turbo');
$power = new Car\Power(100, 110, $engine);
$car = new Car\Car('white', $engine);

$entityManger->persist($car);
$entityManger->persist($power);
$entityManger->persist($engine);

$entityManger->flush();