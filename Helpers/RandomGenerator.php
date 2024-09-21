<?php

namespace Helpers;

use Faker\Factory;
use Models\Companies\RestaurantChain;
use Models\RestaurantLocations\RestaurantLocation;
use Models\Users\Employee;

class RandomGenerator {
    public static function employee(): Employee {
        $faker = Factory::create();

        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->randomElement(['cashier', 'chef']),
            $faker->numberBetween(300, 1000),
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElements(['Best Employee', 'Outstanding Service', 'Top Performer', 'Excellence Award', 'Team Player'], null),
        );
    }

    public static function employees(int $num): array {
        $employees = [];

        for ($i = 0; $i < $num; $i++) {
            $employees[] = self::employee();
        }

        return $employees;
    }

    public static function restaurantLocation(int $employeesNum): RestaurantLocation {
        $faker = Factory::create();

        $employees = self::employees($employeesNum);

        return new RestaurantLocation(
            $faker->company(),
            $faker->address(),
            $faker->city(),
            $faker->state(),
            $faker->postcode(),
            $employees,
            $faker->boolean,
            $faker->boolean,
        );
    }

    public static function restaurantLocations(int $restaurantLocationsNum, int $employeesNum): array {
        $restaurantLocations = [];

        for ($i = 0; $i < $restaurantLocationsNum; $i++) {
            $restaurantLocations[] = self::restaurantLocation($employeesNum);
        }

        return $restaurantLocations;
    }

    public static function restaurantChain(): RestaurantChain {
        $faker = Factory::create();
        $numberOfLocation = $faker->numberBetween(1, 5);
        $totalEmployees = $faker->numberBetween(1, 5);
        $restaurantLocations = self::restaurantLocations($numberOfLocation, $totalEmployees);

        return new RestaurantChain(
            $faker->company(),
            $faker->dateTimeBetween('-10 years', 'now')->format('Y'),
            $faker->text(100),
            $faker->url(),
            $faker->phoneNumber(),
            $faker->word(),
            $faker->name(),
            $faker->boolean,
            $faker->country(),
            $faker->name(),
            $totalEmployees,
            $faker->numberBetween(1, 100),
            $restaurantLocations,
            $faker->word(),
            $numberOfLocation,
            $faker->company(),
        );
    }

    public static function restaurantChains(int $min, int $max): array {
        $faker = Factory::create();
        $restaurantChains = [];
        $numOfRestaurantChains = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurantChains; $i++) {
            $restaurantChains[] = self::restaurantChain();
        }

        return $restaurantChains;
    }
}