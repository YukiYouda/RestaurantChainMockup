<?php

namespace Models\Companies;

use Models\Interfaces\FileConvertible;

class RestaurantChain extends Company implements FileConvertible{
    private int $chainId;
    private array $restaurantLocations;
    private string $cuisineType;
    private int $numberOfLocation;
    private string $parentCompany;

    public function __construct(string $name, int $foundingYear, string $description, string $website, string $phone, string $industry, string $ceo, bool $isPublicityTraded, string $country, string $founder, int $totalEmployees, int $chainID, array $restaurantLocations, string $cuisineType, int $numberOfLocation, string $parentCompany)
    {
        parent::__construct($name, $foundingYear, $description, $website, $phone, $industry, $ceo, $isPublicityTraded, $country, $founder, $totalEmployees);

        $this->chainId = $chainID;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocation = $numberOfLocation;
        $this->parentCompany = $parentCompany;
    }

    public function toHTML(): string {
        $restaurantLocationsHTML = '';
        $restaurantLocations = $this->restaurantLocations;
        for ($i = 0; $i < count($restaurantLocations); $i++) {
            $restaurantLocationsHTML .= $restaurantLocations[$i]->toHTML();
        }

        return sprintf(
            "
            <H2>%s</H2>
            %s
            ",
            $this->name,
            $restaurantLocationsHTML,
        );
    }
}