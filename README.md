# PHP Address Book

This project is a simple address book application build in plain PHP.
The goal was to understand how a framework like Laravel works internally by implementing core concepts from scratch.

### Features

- CRUD (create, read, update, delete)
- Basic validation (required fields, email format)
- Custom routing system
- Controller layer for handling logic
- Repository pattern for database access (PDO)
- View helper with layout support
- Reusable layout (header/footer)
- Form error handling

### Architecture

The application follows simplified MVC pattern:

- **Router** - maps HTTP requests to controllers
- **Controllers** - handle request logic
- **Repositories** - manager database interaction (PDO)
- **Views** - render HTML
- **Helpers** - provide utility functions (view rendering)

### Technologies

- PHP (no framework)
- PDO (database access)
- MySQL
- Basic HTML


### Setup

1. Clone repository: git clone https://github.com/IamDMC/php-address-book.git
2. Configure database in src\Database.php
3. Run the migration: php migrate.php
4. Start local server
5. Open in browser: http://localhost/php-address-book/public


