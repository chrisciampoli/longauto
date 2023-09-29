<?php

/** @var array $vehicles */ ?>
<!-- Custom styles for this template -->
<link href="/assets/dist/css/product.css" rel="stylesheet">
<div class="container-fluid">
    <div class="album py-5 bg-light">
        <div class="container">
            <?php
            $chunks = array_chunk($vehicles, 3);
            foreach ($chunks as $chunkedVehicles) : ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($chunkedVehicles as $vehicle) : ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <!-- You can replace the SVG with an actual image or other content -->
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" />
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $vehicle->make . ' ' . $vehicle->model ?></text>
                                </svg>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $vehicle->year . ' ' . $vehicle->make . ' ' . $vehicle->model ?></h5>
                                    <p class="card-text">$<?= number_format($vehicle->price, 2) ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="/vehicles/<?= $vehicle->id ?>" class="btn btn-sm btn-outline-secondary">View</a>

                                            <!-- Display edit button only if the user is logged in -->
                                            <?php if (isset($_SESSION['user_id'])) : ?>
                                                <a href="/vehicles/edit/<?= $vehicle->id ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>