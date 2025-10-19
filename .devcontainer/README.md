# Development Container for LSX Demo Theme

This directory contains configuration files for setting up a development container for the LSX Demo Theme.

## What's Included

- WordPress (latest)
- MariaDB 10.5
- PHP with Xdebug
- WP-CLI
- Node.js 18
- Composer
- PHP_CodeSniffer with WordPress coding standards
- ESLint and Stylelint
- PHPMyAdmin for database management

## Getting Started

### Prerequisites

- [Visual Studio Code](https://code.visualstudio.com/)
- [Docker](https://www.docker.com/products/docker-desktop)
- [VS Code Remote - Containers Extension](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)

### Setup

1. Open this repository in VS Code
2. When prompted to "Reopen in Container", click "Reopen in Container"
   - Alternatively, you can press F1, type "Remote-Containers: Reopen in Container"
3. Wait for the container to build and initialize (may take a few minutes the first time)
4. WordPress will be automatically set up with:
   - URL: http://localhost:8080
   - Admin username: admin
   - Admin password: password
   - Admin email: dev@example.com

### Accessing Services

- **WordPress**: http://localhost:8080
- **WordPress Admin**: http://localhost:8080/wp-admin
- **PHPMyAdmin**: http://localhost:8081
  - Server: db
  - Username: wordpress
  - Password: wordpress

## Development Workflow

- The theme files are mounted from your local filesystem into the container
- Changes made locally are immediately reflected in the container
- The theme is automatically activated in WordPress
- Build tools and linters are pre-configured

## Stopping the Container

- From VS Code: Press F1, type "Remote-Containers: Reopen Locally"
- From Docker Desktop: Stop the containers in the "Containers" tab

## Troubleshooting

- **Container fails to build**: Try removing the `.devcontainer` volume in Docker and rebuilding
- **WordPress doesn't load**: Check the container logs for errors
- **Missing theme files**: Ensure your repository is cloned properly and the theme files are in the correct location
