<?php

namespace Models;
use Interfaces\FileConvertible;
use DateTime;

class Employee extends User implements FileConvertible {
    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    private array $awards;
    
    public function __construct(
        int $id, string $firstName, string $lastName, string $email, string $password, 
        string $phoneNumber, string $address, DateTime $birthDate, DateTime $membershipExpirationDate, 
        string $role, string $jobTitle, float $salary, DateTime $startDate, array $awards
    ) {
        // 親クラス User のコンストラクタを呼び出す
        parent::__construct($id, $firstName, $lastName, $email, $password, 
                            $phoneNumber, $address, $birthDate, $membershipExpirationDate, 
                            $role);

        // Employee 独自のプロパティの初期化
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function getId(): int {
        return $this->id;
    }

    public function toString(): string {
        return "Job Title: {$this->jobTitle}, Salary: {$this->salary}, Start Date: {$this->startDate->format('Y-m-d')}";
    }

    public function toHTML(): string {
        return "<div>ID: {$this->getId()} Job Title: {$this->jobTitle} {$this->firstName} {$this->lastName} Start Date: {$this->startDate->format('Y-m-d')}</div>";
    }

    public function toMarkdown(): string {
        return "## Job Title: {$this->jobTitle}\n- Salary: {$this->salary}\n- Start Date: {$this->startDate->format('Y-m-d')}";
    }

    public function toArray(): array {
        return [
            'jobTitle' => $this->jobTitle,
            'salary' => $this->salary,
            'startDate' => $this->startDate->format('Y-m-d'),
            'awards' => $this->awards
        ];
    }
}

?>
