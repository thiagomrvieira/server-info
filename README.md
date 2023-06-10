# Server List Application

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
  - [ ] Improved user interface design and usability

- **Optimization**
  - [x] Optimized load times and rendering performance

## How to Use

1. Clone the repository to your local machine.
2. Set up the backend API:
   - Install PHP and Laravel.
   - Configure the database connection in the `.env` file.
   - Migrate the database tables using Laravel's migration command.
   - Run the Laravel development server.
3. Set up the frontend:
   - Install Node.js and Vue.js.
   - Navigate to the frontend directory.
   - Install the required dependencies using `npm install`.
   - Run the development server using `npm run serve`.
4. Access the application in your web browser.

## Project Structure

The project is structured as follows:

- `app/Http/Controllers/API/V1/ServerController.php`: The server API controller.
- `app/Repositories/Interfaces/ServerRepositoryInterface.php`: The server repository interface.
- `app/Repositories/ServerEloquentRepository.php`: The server repository implementation using Laravel's Eloquent ORM.
- `resources/views/server-list.blade.php`: The frontend view for the server list.
- `resources/js/components/ServerList.vue`: The Vue.js component for the server list.
- `routes/api.php`: The API routes for the server list.

## Testing

To run the tests:

1. Set up the testing environment for both the backend and frontend.
2. Run the unit tests for the backend using Laravel's testing framework.
3. Run the functional tests for the frontend using a suitable testing framework.

## Contributors

- [Your Name](https://github.com/thiagomrvieira)

## License

This project is licensed under the [MIT License](LICENSE).
