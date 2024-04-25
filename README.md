# PHPBlogAPI

This project uses Lumen for the backend API and Angular for the frontend. It outlines the requirements, Docker setup for PostgreSQL, and instructions for running both the API and frontend development servers.

**Prerequisites:**

* **PHP:** Ensure you have PHP 7.4 or later installed. You can verify this by running `php -v` in your terminal.
* **Composer:** Composer is a dependency manager for PHP. Download and install it following the official guide: [https://getcomposer.org/doc/articles/troubleshooting.md](https://getcomposer.org/doc/articles/troubleshooting.md)
* **Node.js & npm (or yarn):** Node.js is required for Angular development. Install it from the official website: [https://nodejs.org/en](https://nodejs.org/en)
* **Docker:** Download and install Docker Desktop for your operating system: [https://www.docker.com/](https://www.docker.com/)

## Database Setup:

1. **Pull PostgreSQL Docker Image:**
   Run the following command in your terminal to pull the latest `postgres:alpine3.19` image:

   ```bash
   docker pull postgres:alpine3.19
   ```

2. **Run PostgreSQL Docker Container:**
   Start a Docker container for PostgreSQL using the following command:

   ```bash
   docker run -d \
     -e POSTGRES_USER=admin \
     -e POSTGRES_PASSWORD=secret \
     -e POSTGRES_DB=blogpost \
     -v pgdata:/var/lib/postgresql/data \
     --name postgresql postgres:alpine3.19
   ```

   **Explanation:**
   - `-d`: Runs the container in detached mode (background).
   - `-e`: Sets environment variables for the container:
     - `POSTGRES_USER`: Username for PostgreSQL (change as needed).
     - `POSTGRES_PASSWORD`: Password for PostgreSQL (change as needed).
     - `POSTGRES_DB`: Name of the database to create (change as needed).
   - `-v pgdata:/var/lib/postgresql/data`: Mounts a volume (`pgdata`) for persistent storage of database data.
   - `--name postgresql`: Assigns a name to the container for easier management.
   - `postgres:alpine3.19`: Docker image to use.

## Lumen API Setup:

1. **Configuration (Optional):**
   - Create a `.env` file to configure database connection details. You'll need to update values like `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to match your PostgreSQL setup.
   - Consider additional Lumen configurations within the `bootstrap/app.php` file as needed.

3. **Install Dependencies:**
   Install project dependencies using Composer:

   ```bash
   composer install
   ```

4. **Database Migrations (Optional):**
   - Create migration files using Lumen's Artisan command:

   ```bash
   php artisan migrate
   ```
### Angular Frontend Setup:

1. Install dependencies using npm or yarn:

   ```bash
   npm install
   ``` 
   
   or
   
   ```bash
   yarn install
   ```
### Run the application
1. **Run the server***
   Build the frontend

   ```bash 
   npm run build
   ```

   Run the Lumen development server using the following command:

   ```bash
   php -S localhost:8000 -t public
   ```
2. **Debug the frontend** 
    
    Optionally use 
    
    ```bash 
    npm start
    ```

    to run the frontend in development mode.