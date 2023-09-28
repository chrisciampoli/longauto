<?php

namespace LongAuto\Repositories;

use PDO;
use LongAuto\Models\Vehicle;

class VehicleRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM vehicles");
        return $stmt->fetchAll(PDO::FETCH_CLASS, Vehicle::class);
    }
}
