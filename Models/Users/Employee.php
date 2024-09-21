<?php

namespace Models\Users;

use DateTime;
use Models\Interfaces\FileConvertible;

class Employee extends User implements FileConvertible {
    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    private array $awards;

    public function __construct(int $id, string $firstName, string $lastName, string $email, string $password, string $phoneNumber, string $address, DateTime $birthDate, DateTime $membershipExpirationDate, string $role, string $jobTitle, float $salary, DateTime $startDate, array $awards)
    {
        parent::__construct($id, $firstName, $lastName, $email, $password, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role);
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function toHTMLEmployee(): string
    {
        return sprintf(
            "<div><p>ID: %s, Job Title: %s, %s %s, Start Date: %s</p></div>",
            $this->id,
            $this->jobTitle,
            $this->firstName,
            $this->lastName,
            $this->startDate->format('Y-m-d'),
        );
    }
}