<?php

namespace Helpers;

use Faker\Factory;
use Models\Companies\RestaurantChain;
use Models\RestaurantLocations\RestaurantLocation;
use Models\Users\Employee;

class RandomGenerator {
    public static function employee(int $salary): Employee {
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
            $salary,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElements(['Best Employee', 'Outstanding Service', 'Top Performer', 'Excellence Award', 'Team Player'], null),
        );
    }

    public static function employees(int $num, int $salary): array {
        $employees = [];

        for ($i = 0; $i < $num; $i++) {
            $employees[] = self::employee($salary);
        }

        return $employees;
    }

    public static function restaurantLocation(int $employeesNum, int $salary): RestaurantLocation {
        $faker = Factory::create();

        $employees = self::employees($employeesNum, $salary);

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

    public static function restaurantLocations(int $restaurantLocationsNum, int $employeesNum, int $salary): array {
        $restaurantLocations = [];

        for ($i = 0; $i < $restaurantLocationsNum; $i++) {
            $restaurantLocations[] = self::restaurantLocation($employeesNum, $salary);
        }

        return $restaurantLocations;
    }

    public static function restaurantChain(int $numberOfLocations, int $totalEmployees, int $salary): RestaurantChain {
        $faker = Factory::create();
        $restaurantLocations = self::restaurantLocations($numberOfLocations, $totalEmployees, $salary);

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
            $numberOfLocations,
            $faker->company(),
        );
    }

    public static function restaurantChains(int $min, int $max, int $numberOfLocations, int $totalEmployees, int $salary): array {
        $faker = Factory::create();
        $restaurantChains = [];
        $numOfRestaurantChains = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurantChains; $i++) {
            $restaurantChains[] = self::restaurantChain($numberOfLocations, $totalEmployees, $salary);
        }

        return $restaurantChains;
    }
}