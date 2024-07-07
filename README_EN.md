# AirdropKu

AirdropKu is an application to manage airdrop reminders. Built using CodeIgniter 3 and utilizes Circl Admin Bootstrap 5 for the user interface.

## Features

- **Login**: Users can log in to their accounts with enhanced security using password encryption/hashing.
- **Register**: New users can create accounts to access the application.
- **Add Airdrop**: Add details of new airdrops to the system.
- **List Airdrop**: View a list of added airdrops.
- **Settings**: Manage application settings.

## Database Usage

This application does not use traditional SQL databases. Airdrop and user account data are stored in JSON format. User passwords are encrypted or hashed before storage for additional security.

## Key Technologies

- **CodeIgniter 3**: PHP framework for web application development.
- **Circl Admin Bootstrap 5**: Responsive admin template built on Bootstrap 5.

## Installation

To run this application, ensure you have set up a PHP development environment (like XAMPP, WAMP, or similar server) and follow these steps:

1. Clone this repository.
2. Adjust application configuration such as base URL in `application/config/config.php`.
3. Ensure PHP has write access to the `application/data/` folder to store JSON files.
4. Open the application in your browser.

## Contribution

If you wish to contribute to this project, please create a pull request with your proposed changes.

## License

Licensed under the [MIT License](https://opensource.org/licenses/MIT).
