<?php

namespace LongAuto\Repositories;

use PDO;
use LongAuto\Models\Vehicle;

class VehicleRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM vehicles");
        return $stmt->fetchAll(PDO::FETCH_CLASS, Vehicle::class);
    }

    public function getById(int $id): ?Vehicle
    {
        $stmt = $this->pdo->prepare("SELECT * FROM vehicles WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Vehicle::class);
        return $stmt->fetch() ?: null;
    }

    public function update(int $id, int $year, string $make, string $model, float $price): bool
    {
        $stmt = $this->pdo->prepare("UPDATE vehicles SET year = :year, make = :make, model = :model, price = :price WHERE id = :id");
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':make', $make, PDO::PARAM_STR);
        $stmt->bindParam(':model', $model, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
