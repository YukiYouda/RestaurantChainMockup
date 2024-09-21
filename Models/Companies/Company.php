<?php

namespace Models\Companies;

use Models\Interfaces\FileConvertible;

class Company implements FileConvertible {
    protected string $name;
    protected int $foundingYear;
    protected string $description;
    protected string $website;
    protected string $phone;
    protected string $industry;
    protected string $ceo;
    protected bool $isPublicityTraded;
    protected string $country;
    protected string $founder;
    protected int $totalEmployees;

    public function __construct(string $name, int $foundingYear, string $description, string $website, string $phone, string $industry, string $ceo, bool $isPublicityTraded, string $country, string $founder, int $totalEmployees)
    {
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->isPublicityTraded = $isPublicityTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
    }

    public function toString(): string {
        return sprintf(
            "Name: %s\nFoundingYear: %d\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\nCEO: %s\nisPublicityTraded: %d\nCountry: %s\nFounder: %s\nTotalEmployees: %d\n",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPublicityTraded,
            $this->country,
            $this->founder,
            $this->totalEmployees,
        );
    }

    public function toHTML(): string {
        return sprintf(
            "<p>Name: %s, Founding Year: %d, Description: %s, Website: %s, Phone: %s, Industry: %s, CEO: %s, isPublicityTraded: %s, Country: %s, Founder: %s, Total Employees: %s</p>",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPublicityTraded,
            $this->country,
            $this->founder,
            $this->totalEmployees,
        );
    }

    public function toMarkdown(): string {
        return "
                - name: {$this->name}
                - foundingYear: {$this->foundingYear}
                - description: {$this->description}
                - website: {$this->website}
                - phone: {$this->phone}
                - industry: {$this->industry}
                - ceo: {$this->ceo}
                - isPublicityTraded: {$this->isPublicityTraded}
                - country: {$this->country}
                - founder: {$this->founder}
                - totalEmployees: {$this->totalEmployees}
                ";
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
            'foundingYear' => $this->foundingYear,
            'description' => $this->description,
            'website' => $this->website,
            'phone' => $this->phone,
            'industry' => $this->industry,
            'ceo' => $this->ceo,
            'isPublicityTraded' => $this->isPublicityTraded,
            'country' => $this->country,
            'founder' => $this->founder,
            'totalEmployees' => $this->totalEmployees,
        ];
    }
}