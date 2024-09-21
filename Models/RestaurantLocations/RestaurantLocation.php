<?php

namespace Models\RestaurantLocations;

use Models\Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible {
    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

    public function __construct(string $name, string $address, string $city, string $state, string $zipCode, array $employees, bool $isOpen, bool $hasDriveThru)
    {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }

    public function toString(): string {
        return sprintf(
            "Name: %s\nAddress: %s\nCity: %s\nState: %s\nZipCode: %s\nEmployees: %s\nisOpen: %d\nhasDriveThru: %s\n",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            $this->employees,
            $this->isOpen,
            $this->hasDriveThru,
        );
    }

    public function toHTML(): string {
        $employeesHTML = '';
        $employees = $this->employees;
        for ($i = 0; $i < count($employees); $i++) {
            $employeesHTML .= $employees[$i]->toHTMLEmployee();
        }

        return sprintf(
            "<div>
                <p>Name: %s, Address: %s, %s, %s ZipCode: %s</p>
            </div>
            <h3>Employees:</h3>
            %s
            ",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            $employeesHTML,
        );
    }

    public function toMarkdown(): string {
        return "
                - name: {$this->name}
                - address: {$this->address}
                - city: {$this->city}
                - state: {$this->state}
                - zipCode: {$this->zipCode}
                - employees: {$this->employees}
                - isOpen: {$this->isOpen}
                - hasDriveThru: {$this->hasDriveThru}
                ";
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zipCode' => $this->zipCode,
            'employees' => $this->employees,
            'isOpen' => $this->isOpen,
            'hasDriveThru' => $this->hasDriveThru,
        ];
    }
}