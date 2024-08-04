<?php

namespace Helpers;

use Faker\Factory;
use Models\User;
use Models\Employee;
use Models\RestaurantLocation;
use Models\RestaurantChain;
use Models\Company;

class RandomGenerator {
    public static function user(): User {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }

    public static function employee(int $salary_min, int $salary_max): Employee {
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
            $faker->jobTitle(),
            $faker->numberBetween($salary_min, $salary_max),
            $faker->dateTimeThisCentury,
            $faker->words(5)
        );
    }

    public static function employees(int $min, int $max, int $salary_min, int $salary_max): array {
        $faker = Factory::create();
        $employees = [];
        $numOfEmployees = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfEmployees; $i++) {
            $employees[] = self::employee($salary_min, $salary_max);
        }

        return $employees;
    }

    public static function company(): Company {
        $faker = Factory::create();

        return new Company(
            $faker->company(), // Company name
            $faker->numberBetween(1800, 2020), // Founding year
            $faker->text(200), // Description
            $faker->domainName(), // Website
            $faker->phoneNumber(), // Phone number
            $faker->firstNameMale(), // Industry
            $faker->name(), // CEO's name
            $faker->boolean(), // Is publicly traded
            $faker->country(), // Country
            $faker->firstNameMale(), // Founder's name
            $faker->numberBetween(1, 5) // Total employees
        );
    }

    public static function restaurantLocations(int $employeesCount, int $locationsCount, int $salary_min, int $salary_max): array {
        $faker = Factory::create();
        $locations = [];
        $numOfLocations = $faker->numberBetween($locationsCount, $locationsCount);

        for ($i = 0; $i < $numOfLocations; $i++) {
            $locations[] = new RestaurantLocation(
                $faker->firstNameMale(),
                $faker->address(),
                $faker->city(),
                $faker->state(),
                $faker->postcode(),
                self::employees($employeesCount, $employeesCount, $salary_min, $salary_max),
                $faker->boolean(70),
                $faker->boolean(50)
            );
        }

        return $locations;
    }

    public static function restaurantChains(int $min, int $max, int $salary_min, int $salary_max): array {
        $faker = Factory::create();
        $chains = [];
        $numOfChains = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfChains; $i++) {
            $chains[] = new RestaurantChain(
                $faker->randomNumber(),
                self::restaurantLocations($min, $max, $salary_min, $salary_max), 
                $faker->randomElement(['Italian', 'Fast Food', 'Japanese']),
                $faker->numberBetween($min, $max),
                self::company()
            );
        }

        return $chains;
    }
}
?>