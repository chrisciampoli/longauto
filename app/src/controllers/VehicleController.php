<?php

namespace LongAuto\Controllers;

use LongAuto\Attributes\Route;
use LongAuto\Services\VehicleService;

class VehicleController extends AbstractController {
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService) {
        $this->vehicleService = $vehicleService;
    }

    #[Route(path: '/vehicles', method: 'GET')]
    public function listAction(): string {
        $vehicles = $this->vehicleService->getAllVehicles();
        return $this->render('list', ['vehicles' => $vehicles]);
    }
}
