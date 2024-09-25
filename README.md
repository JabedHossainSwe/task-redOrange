# Organization Registration System

## Overview

The Organization Registration System is a web application built using Laravel, Blade, and Bootstrap. The application aims to streamline the registration process for organizations, allowing users to create profiles, verify their email addresses, and manage their information efficiently.

### Key Features

- **User Registration**: Users can register their organizations with necessary details.
- **Email Verification**: The application sends verification emails to ensure users confirm their email addresses.
- **Organization Profile Management**: Users can create and update their organization profiles, including ownership details, TIN, BIN, and registration information.
- **Responsive Design**: The application uses Bootstrap for a clean and responsive user interface.
- **Authentication**: Built-in Laravel authentication system ensures secure user access.
  
### Tech Stack

- **Backend**: Laravel (PHP Framework)
- **Frontend**: Blade, Bootstrap
- **Database**: MySQL

### Getting Started

To get started with the project, follow these steps:

### Installation Steps

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/JabedHossainSwe/task-redOrange.git
    cd file-name
    ```

2. **Install Backend Dependencies**:
    ```bash
    composer install
    ```

3. **Set Up Environment File**:
    Copy `.env.example` to `.env` and set up your database and mail configurations:
    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**:
    ```bash
    php artisan migrate
    ```

6. **Run Seeder**:
    ```bash
    php artisan db:seed --class=OrganizationTypeSeeder
    ```

7. **Run this command**:
    ```bash
    php artisan storage:link
    ```

7. **Frontend Setup**:
    ```bash
    npm install && npm run dev
    ```

8. **Start the Development Server**:
    ```bash
    php artisan serve
    ```

Now you can access the application at `http://localhost:8000`.

### Usage

1. Visit the homepage and sign up.
2. Access the organization profile creation form.
3. Fill in the required fields to create or update your organization's profile.
4. Check your email for a verification link.
5. Verify your email using that link.
6. After verifying, log in to access your dashboard.

### Contributing

Contributions are welcome! Please create a pull request or open an issue for any suggestions or improvements.


