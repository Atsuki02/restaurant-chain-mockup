<?php

namespace Models;
use Interfaces\FileConvertible;

class Company implements FileConvertible {
    private string $name;
    private int $foundingYear;
    private string $description;
    private string $website;
    private string $phone;
    private string $industry;
    private string $ceo;
    private bool $isPubliclyTraded;
    private string $country;
    private string $founder;
    private int $totalEmployees;

    public function __construct(string $name, int $foundingYear, string $description, string $website, string $phone, string $industry, string $ceo, bool $isPubliclyTraded, string $country, string $founder, int $totalEmployees) {
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->isPubliclyTraded = $isPubliclyTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
    }

    public function toString(): string {
        return "Name: {$this->name}, Industry: {$this->industry}, CEO: {$this->ceo}";
    }

    public function toHTML(): string {
        return "<div><strong>Restaurant Chain {$this->name}</strong></div>";
    }

    public function toMarkdown(): string {
        return "## {$this->name}\n- Industry: {$this->industry}\n- CEO: {$this->ceo}";
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
            'isPubliclyTraded' => $this->isPubliclyTraded,
            'country' => $this->country,
            'founder' => $this->founder,
            'totalEmployees' => $this->totalEmployees
        ];
    }
}

?>