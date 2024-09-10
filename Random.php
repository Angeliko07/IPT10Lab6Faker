<?php
require_once 'vendor/autoload.php';

use Faker\Factory;

class Random {
    public static function generatePerson() {
        $faker = Factory::create('en_PH');
        
        return [
            $faker->uuid,
            $faker->title,
            $faker->firstName,
            $faker->lastName,
            $faker->streetAddress,
            $faker->word, // Barangay
            $faker->city, // Municipality
            $faker->state, // Province
            $faker->country,
            $faker->phoneNumber,
            $faker->mobileNumber, // Mobile Number
            $faker->company,
            $faker->url,
            $faker->jobTitle,
            $faker->safeColorName,
            $faker->date('Y-m-d'),
            $faker->email,
            $faker->password
        ];
    }

    public static function generatePeople($count) {
        $people = [];
        for ($i = 0; $i < $count; $i++) {
            $people[] = self::generatePerson();
        }
        return $people;
    }
}
?>
