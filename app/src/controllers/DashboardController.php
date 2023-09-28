<?php

namespace LongAuto\Controllers;

use LongAuto\Attributes\Route;
use LongAuto\Services\VehicleService;

class DashboardController extends AbstractController {
    private VehicleService $vehicleService;

    public function __construct(VehicleService $vehicleService) {
        $this->vehicleService = $vehicleService;
    }


    #[Route(path: '/dashboard', method: 'GET')]
    public function indexAction(): string {
        // You can fetch user-specific data here if needed.

        return $this->render('index', [
            'message' => 'Welcome to your Dashboard!'
        ]);
    }
}
