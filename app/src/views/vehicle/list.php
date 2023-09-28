<?php /** @var array $vehicles */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicles</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                    <tr>
                        <td><?= $vehicle->id ?></td>
                        <td><?= $vehicle->make ?></td>
                        <td><?= $vehicle->model ?></td>
                        <td><?= $vehicle->year ?></td>
                        <td>$<?= number_format($vehicle->price, 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
