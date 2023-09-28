<?php

namespace LongAuto\Controllers;

use LongAuto\Attributes\Route;
use LongAuto\Services\VehicleService;

class HomeController extends AbstractController {
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService) {
        $this->vehicleService = $vehicleService;
    }

    #[Route(path: '/')]
    public function indexAction(): string {
        $vehicles = $this->vehicleService->getAllVehicles();
        return $this->render('index', [
            'vehicles' => $vehicles
        ]);
    }

    #[Route(path: '/test')]
    public function testAction(): string {
        return $this->render('index', [
            'message' => 'Welcome to Home!'
        ]);
    }
}
