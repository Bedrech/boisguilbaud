<?php
include('config.php');
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('fr_FR');


for ($i = 0; $i < 10; $i++) {
    $sql = 'INSERT INTO articles (article_name, article_image, article_type)
     values(:article_name, :article_image, :article_type)';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([  
    'article_name' => $faker->randomElement(['Apartment', 'House', 'Commercial', 'Land']),
        'article_image' => $faker->randomNumber(3),
        'article_type' => $faker->randomElement(['For sale', 'For rent']),
    ]);
}