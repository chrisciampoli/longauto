<?php

namespace LongAuto\Services;

use LongAuto\Repositories\VehicleRepository;

class VehicleService {
    private VehicleRepository $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository) {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function getAllVehicles(): array {
        return $this->vehicleRepository->getAll();
    }

    public function getVehicleById(int $id) {
        return $this->vehicleRepository->getById($id);
    }

    public function updateVehicle(int $id, int $year, string $make, string $model, float $price): bool {
        return $this->vehicleRepository->update($id, $year, $make, $model, $price);
    }
    
}
