# Server List Application - Technical Assignment

This repository contains an application that provides a list of server information to customers. The application allows customers to quickly find servers based on their specific requirements and compare server specifications and prices. The data for the server list is provided through an Excel sheet and is not stored in a database.

## Technical Requirements

- [x] Code needs to be unit tested
- [x] Code needs functional tests
- [x] Create an API using PHP
- [x] Create a frontend for the web

## Bonus Points

- **Code Quality**
  - [x] SOLID principles
  - [ ] Domain Driven Design
  - [x] Design Patterns

- **Application Structure**
  - [x] Layered Architecture

- **User Interface**
  - [x] Implemented user interface for the server list
  - [x] Improved user interface design and usability

- **Optimization**
  - [x] Optimized load times using cache
  - [ ] Optimized rendering performance using pagination

## For next updates

- **General**
  - [ ] Filter by Storage
  - [ ] End-to-end tests (Dusk)
  - [ ] Pagination
  - [ ] Swagger open api
  - [ ] Docker

## How to Use

1. Clone the repository to your local machine.
2. Set up the backend API:
   - Install PHP and Laravel.
   - Install dependencies using `composer install`.
   - Copy the `.env.example` file and rename it to `.env`.
   - Generate an application key using `php artisan key:generate`.
   - Run the Laravel development server using `php artisan serve`.
3. Set up the frontend:
   - Install Node.js and Vue.js.
   - Navigate to the frontend directory.
   - Install the required dependencies using `npm install`.
   - Run the development server using `npm run dev`.
4. Access the application in your web browser.

## Project Structure

The project is structured as follows:

- `app/Http/Controllers/API/V1/ServerController.php`: The server API controller.
- `app/Repositories/Interfaces/ServerRepositoryInterface.php`: The server repository interface.
- `app/Repositories/ServerEloquentRepository.php`: The server repository implementation using Laravel's Eloquent ORM.
- `app/Services/ExcelServide.php`: The service responsible for read the xls.
- `app/Services/FilterServide.php`: The server responsible for filters in Eloquent collections.
- `app/Http/Resources/LocationResource.php`: Laravel API Resource / Transformation layer for Location requests.
- `app/Http/Resources/ServerResource.php`: Laravel API Resource / Transformation layer for Server Specs requests.
- `app/Http/Resources/ServerSpecsResource.php`: Laravel API Resource / Transformation layer for Location requets.
- `app/Models/Server.php`: The Eloquent ORM instance of the Servers.
- `resources/views/server-list.blade.php`: The frontend view for the server list.
- `resources/js/components/ServerList.vue`: The Vue.js component for the server list.
- `routes/api.php`: The API routes for the server list.

## Testing

To run the tests:

1. Run the unit tests for the backend using Laravel's testing framework using `php artisan test`.

## Contributors

- [Thiago Vieira](https://github.com/thiagomrvieira)
