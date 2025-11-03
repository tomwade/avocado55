# Docker Setup for WordPress Local Development

This guide will help you set up and run WordPress locally using Docker.

## Prerequisites

- Docker Desktop installed and running ([Download Docker Desktop](https://www.docker.com/products/docker-desktop))
- Docker Compose (included with Docker Desktop)

## Quick Start

1. **Create environment file:**
   ```bash
   cp .env.example .env
   ```
   Or create a `.env` file manually with the following content:
   ```
   DB_NAME=wordpress
   DB_USER=wordpress
   DB_PASSWORD=wordpress
   DB_ROOT_PASSWORD=rootpassword
   WP_PORT=8080
   WP_DEBUG=1
   ```

2. **Start the containers:**
   ```bash
   docker-compose up -d
   ```
   This will:
   - Download the WordPress and MySQL images (first time only)
   - Create and start the containers
   - Set up the database

3. **Access your site:**
   - WordPress site: http://localhost:8080
   - Database host: `db` (for wp-config.php)
   - Database port: 3306 (if accessing from host machine)

4. **Configure WordPress:**
   - If this is a fresh install, you'll see the WordPress installation screen
   - If you have an existing database, you'll need to:
     a. Import your database into the MySQL container
     b. Update `wp-config.php` with the database credentials

## Database Configuration

If you need to configure `wp-config.php` for Docker, use these settings:

```php
define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'wordpress' );
define( 'DB_PASSWORD', 'wordpress' );
define( 'DB_HOST', 'db' );  // Use 'db' not 'localhost' in Docker
```

## Useful Commands

### Start containers:
```bash
docker-compose up -d
```

### Stop containers:
```bash
docker-compose down
```

### Stop and remove volumes (⚠️ deletes database):
```bash
docker-compose down -v
```

### View logs:
```bash
docker-compose logs -f
```

### Access WordPress container shell:
```bash
docker-compose exec wordpress bash
```

### Access MySQL container:
```bash
docker-compose exec db mysql -u wordpress -p wordpress
```

### Import database:
```bash
docker-compose exec -T db mysql -u wordpress -pwordpress wordpress < your-database.sql
```

### Export database:
```bash
docker-compose exec db mysqldump -u wordpress -pwordpress wordpress > backup.sql
```

## Troubleshooting

### Port already in use
If port 8080 is already in use, change `WP_PORT` in your `.env` file to a different port (e.g., `8081`).

### Permission issues
If you encounter file permission issues, you may need to adjust file ownership:
```bash
sudo chown -R www-data:www-data wp-content/
```

### Database connection issues
- Make sure the database container is healthy: `docker-compose ps`
- Check that `DB_HOST` in `wp-config.php` is set to `db` (not `localhost`)
- Verify your `.env` file has the correct database credentials

### Reset everything
To start fresh (⚠️ this will delete all data):
```bash
docker-compose down -v
docker-compose up -d
```

## Environment Variables

You can customize the setup by editing your `.env` file:

- `DB_NAME`: Database name (default: `wordpress`)
- `DB_USER`: Database user (default: `wordpress`)
- `DB_PASSWORD`: Database password (default: `wordpress`)
- `DB_ROOT_PASSWORD`: MySQL root password (default: `rootpassword`)
- `WP_PORT`: Port to access WordPress (default: `8080`)
- `WP_DEBUG`: Enable WordPress debug mode (default: `1`)

## File Structure

- `docker-compose.yml`: Docker configuration
- `.env`: Environment variables (not in git)
- `.dockerignore`: Files to exclude from Docker context
- `DOCKER_SETUP.md`: This file

