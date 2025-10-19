#!/bin/bash
set -e

# Execute the original WordPress entrypoint
docker-entrypoint.sh "$@" &

# Wait for WordPress to be available
echo "Waiting for WordPress to start..."
until $(curl --output /dev/null --silent --head --fail http://localhost:80); do
    echo "."
    sleep 5
done

# Wait for a bit more to be sure WordPress is fully loaded
sleep 5

# Check if WordPress is installed
if ! wp core is-installed --path=/var/www/html --allow-root; then
    echo "WordPress is not installed. Setting up..."

    # Install WordPress
    wp core install \
        --path=/var/www/html \
        --url=http://localhost:8080 \
        --title="LSX Demo Theme Development" \
        --admin_user=admin \
        --admin_password=password \
        --admin_email=dev@example.com \
        --skip-email \
        --allow-root

    # Activate the theme
    wp theme activate lsx-demo-theme --path=/var/www/html --allow-root

    # Install and activate useful plugins
    wp plugin install wordpress-importer --activate --path=/var/www/html --allow-root
    wp plugin install query-monitor --activate --path=/var/www/html --allow-root
    wp plugin install gutenberg --activate --path=/var/www/html --allow-root

    echo "WordPress setup complete!"
fi

# Keep container running
wait
