<?php

namespace Models;
use Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible {

    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

    public function __construct(string $name, string $address, string $city, string $state, string $zipCode, array $employees, bool $isOpen, bool $hasDriveThru) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function getState(): string {
        return $this->state;
    }

    public function getZipCode(): string {
        return $this->zipCode;
    }

    public function getEmployees(): array {
        return $this->employees;
    }

    public function isOpen(): bool {
        return $this->isOpen;
    }

    public function hasDriveThru(): bool {
        return $this->hasDriveThru;
    }

    public function toString(): string {
        return "Name: {$this->name}, Address: {$this->address}";
    }

    public function toHTML(): string {
        return "<div>Company Name: {$this->name} Address: {$this->address} ZipCode: {$this->zipCode}</div>";
    }

    public function toMarkdown(): string {
        return "## Name: {$this->name}\n- Address: {$this->address}";
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
            'hasDriveThru' => $this->hasDriveThru
        ];
    }
}