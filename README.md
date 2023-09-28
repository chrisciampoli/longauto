# Long Auto

A vehicle management system to display and manage vehicle data. Built using PHP and powered by Bootstrap for the frontend.

## Features

- List all vehicles.
- Edit vehicle details (only for logged-in users).
- Registration system (only for unauthenticated users).
- Dynamic user login system.
- Role-based authentication for accessing different parts of the application.
- Uses Docker for easy setup and reproducibility.

## Prerequisites

- Docker
- Docker Compose

## Setup

1. **Clone the Repository**

   ```bash
   git clone https://github.com/chrisciampoli/longauto.git
   cd longauto

2. **Clone the Repository**

   ```bash
   docker-compose -p longauto up --build -d

1. **Access the Application**
    Open a browser and go to http://localhost:8000 to view the application.