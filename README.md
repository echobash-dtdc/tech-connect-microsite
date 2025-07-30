# Tech Connect Microsite

A Laravel-based microsite for managing and displaying events, team members, blogs, and feedback forms with integration to Baserow API.

## Prerequisites

- PHP 8.1 or higher
- Composer
```bash
Installation steps:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```
- MySQL/PostgreSQL database
- Baserow API access

```bash
Baserow setup should be done for API Access.
```

## Setup Steps

### 1. Clone the Repository

```bash
git clone <repository-url>
cd tech-connect-microsite
```

### 2. Install PHP Dependencies

```bash
composer install
```
### 3. Environment Configuration

Copy the environment file and configure your settings:

```bash
cp .env.example .env
```

Edit `.env` file with your configuration and replace the below keys value

```env
APP_NAME="Tech Connect Microsite"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tech_connect_db
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Baserow API Configuration
BASEROW_DOMAIN=https://your-baserow-instance.com
BASEROW_DB_TOKEN=your_baserow_token

# Keycloak Configuration (if using SSO)
KEYCLOAK_BASE_URL=https://your-keycloak-instance.com
KEYCLOAK_REALM=your_realm
KEYCLOAK_CLIENT_ID=your_client_id
KEYCLOAK_CLIENT_SECRET=your_client_secret
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Database Setup

Run database migrations and seeders:

```bash
php artisan migrate --seed
```



### 6. Storage Setup

Create storage links:

```bash
php artisan storage:link
```


### 7. Configure Baserow API

Ensure your Baserow API is properly configured:

1. Set up your Baserow instance
2. Create the required tables (Events, Team Members, Blog Posts, Feedback)
3. Configure the table IDs in `app/Core/Enums/BaseRowTableIdEnum.php`
4. Set your API token in the `.env` file

### 8. Start the Development Server for testing otherwise create Virtual host on server

```bash
php artisan serve
# The application will be available at `http://localhost:8000`
```
## Project Structure

```
tech-connect-microsite/
├── app/
│   ├── Core/
│   │   ├── Enums/
│   │   │   └── BaseRowTableIdEnum.php
│   │   └── Services/
│   │       └── BaseRow/
│   │           ├── BaseRowApiServices.php
│   │           ├── EventServices.php
│   │           ├── BlogServices.php
│   │           ├── TeamServices.php
│   │           └── FeedbackFormServices.php
│   ├── Http/
│   │   └── Controllers/
│   │       └── Frontend/
│   │           ├── FrontController.php
│   │           ├── EventController.php
│   │           ├── BlogController.php
│   │           ├── TeamMemberController.php
│   │           └── FeedBackController.php
│   └── Models/
├── resources/
│   └── views/
│       └── frontend/
│           ├── events.blade.php
│           ├── blogs/
│           ├── team_members/
│           └── feedback.blade.php
├── public/
│   └── mentor/
│       ├── css/
│       ├── js/
│       └── img/
└── routes/
    └── web.php
```


### Adding New Features

1. Create service class in `app/Core/Services/BaseRow/`
2. Add controller method in `app/Http/Controllers/Frontend/`
3. Create Blade view in `resources/views/frontend/`
4. Add route in `routes/web.php`

### Styling

The project uses Bootstrap 5 with custom CSS. Main styles are in:
- `public/mentor/css/main.css`
- `resources/css/app.css`

### JavaScript

Custom JavaScript is located in:
- `public/mentor/js/main.js`
- `resources/js/app.js`

## Deployment

### Production Setup

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Configure your web server (Apache/Nginx)
4. Set up SSL certificates
5. Configure database for production
6. Run `php artisan config:cache`
7. Run `php artisan route:cache`
8. Run `php artisan view:cache`

### Environment Variables for Production

```env
APP_ENV=production
APP_DEBUG=false
```