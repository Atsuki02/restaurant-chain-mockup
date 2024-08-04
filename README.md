# Restaurant Chain Mockup

## Overview
This project provides a mockup of a restaurant chain management system. It includes functionality to generate and display information about restaurant chains, individual locations, employees, and company details.

![alt text](<Screenshot 2024-06-29 at 14-18-33 User Profiles.png>)

## Features
- Choose the numbers of employees, amount of salaries, and numbers of locations
- Generation of random restaurant chain, location, and employee data based on the chosen input
- HTML display of generated data
- Data conversion functionality (HTML, Markdown, json text)

## Requirements
- PHP 7.4 or higher
- Composer

## Installation
1. Clone the repository:
   ```
   git clone https://github.com/yourusername/restaurant-chain-mockup.git
   ```
2. Navigate to the project directory:
   ```
   cd restaurant-chain-mockup
   ```
3. Install Composer dependencies:
   ```
   composer install
   ```

## Usage
1. Start a web server (using PHP's built-in server):
   ```
   php -S localhost:8000 -t public
   ```
2. Access `http://localhost:8000/generate.php` in your browser.

## Project Structure
```
restaurant-chain-mockup/
│
├── src/
│   ├── Models/
│   ├── Interfaces/
│   └── Helpers/
│
├── public/
│   └── css/
│   └── index.php
│   └── download.php
│   └── generate.php
│
├── vendor/
├── composer.json
├── composer.lock
└── .gitignore
```

## Development
- `src/Models/` contains data models.
- `src/Interfaces/` defines common interfaces.
- `src/Helpers/` includes data generation and utility functions.
- `public/generate.php` is the entry point.