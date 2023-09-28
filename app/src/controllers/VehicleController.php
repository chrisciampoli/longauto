<?php

namespace LongAuto\Controllers;

use LongAuto\Attributes\Route;
use LongAuto\Services\VehicleService;

class VehicleController extends AbstractController
{
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    #[Route(path: '/vehicles', method: 'GET')]
    public function listAction(): string
    {
        $vehicles = $this->vehicleService->getAllVehicles();
        return $this->render('list', ['vehicles' => $vehicles]);
    }

    #[Route(path: '/vehicles/:id', method: 'GET')]
    public function viewAction(int $id): string
    {
        $vehicle = $this->vehicleService->getVehicleById($id);
        return $this->render('index', ['vehicle' => $vehicle]);
    }

    #[Route(path: '/vehicles/edit/:id', method: 'GET')]
    public function editAction(int $id): string
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $vehicle = $this->vehicleService->getVehicleById($id);
        return $this->render('edit', ['vehicle' => $vehicle]);
    }

    #[Route(path: '/vehicles/update/:id', method: 'POST')]
    public function updateAction(int $id): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        // Retrieve data from $_POST and sanitize it
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
        $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        // We should also validate the input
        if (empty($year) || empty($make) || empty($model) || $price === false) {
            // Redirect back with an error message or handle error appropriately
            // You'd use your own error handling mechanism here
            echo "Invalid input!";
            return;
        }

        // At this point, consider the data sanitized and validated

        // Update the vehicle in the database
        $this->vehicleService->updateVehicle($id, $year, $make, $model, $price);

        // Redirect back to the edit page for the vehicle (or wherever you want to redirect)
        header("Location: /vehicles/edit/{$id}");
        exit;
    }
}
