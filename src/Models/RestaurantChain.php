<?php

namespace Models;
use Interfaces\FileConvertible;
use Models\RestaurantLocation;
use Models\Company;

class RestaurantChain extends Company implements FileConvertible {

    private int $chainId;
    private array $restaurantLocations;
    private string $cuisineType;
    private int $numberOfLocations;
    private Company $parentCompany;

    public function __construct(int $chainId, array $restaurantLocations, string $cuisineType, int $numberOfLocations, Company $parentCompany) {
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
    }

    public function getRestaurantLocations() {
        return $this->restaurantLocations;
    }  

    public function addRestaurant(string $chainId, string $address, string $city, string $state, string $zipCode, array $employees, bool $isOpen, bool $hasDriveThru) {
        $newRestaurantLocation = new RestaurantLocation($chainId,  $address,  $city,  $state,  $zipCode, $employees, $isOpen, $hasDriveThru);
        array_push($this->restaurantLocations, $newRestaurantLocation);
    }

    public function displayAllRestaurantLocations(): string {
        $output = "";
        foreach($this->restaurantLocations as $restaurantLocation) {
            $output .= $restaurantLocation->toHTML();
        }
        return $output;
    }

    public function displayChainInfo(): string {
        return $this->parentCompany->toHTML();
    }

    public function toString(): string {
        return "Chain ID: {$this->chainId}, Cuisine Type: {$this->cuisineType}, Number of Locations: {$this->numberOfLocations}, Parent Company: {$this->parentCompany->toString()}";
    }

    public function toHTML(): string {
        return "<div>Chain ID: {$this->chainId}<br>Cuisine Type: {$this->cuisineType}<br>Number of Locations: {$this->numberOfLocations}<br>Parent Company: {$this->parentCompany->toString()}</div>";
    }

    public function toMarkdown(): string {
        return "## Restaurant Chain\n- Chain ID: {$this->chainId}\n- Cuisine Type: {$this->cuisineType}\n- Number of Locations: {$this->numberOfLocations}\n- Parent Company: {$this->parentCompany}";
    }

    public function toArray(): array {
        return [
            'chainId' => $this->chainId,
            'restaurantLocations' => $this->restaurantLocations,
            'cuisineType' => $this->cuisineType,
            'numberOfLocations' => $this->numberOfLocations,
            'parentCompany' => $this->parentCompany
        ];
    }
}

?>