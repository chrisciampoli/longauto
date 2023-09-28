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
        $vehicle = $this->vehicleService->getVehicleById($id);
        return $this->render('edit', ['vehicle' => $vehicle]);
    }

    #[Route(path: '/vehicles/update/:id', method: 'POST')]
    public function updateAction(int $id): void
    {
        // Here you would get POST data, validate it, then update the vehicle in the database.
        // After updating, you might want to redirect the user back to the list or the view page.
    }
}
