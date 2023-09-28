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

    public function getById(int $id): ?Vehicle {
        $stmt = $this->pdo->prepare("SELECT * FROM vehicles WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Vehicle::class);
        return $stmt->fetch() ?: null;
    }
}
