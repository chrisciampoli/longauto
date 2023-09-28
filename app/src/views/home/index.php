<?php

/** @var array $vehicles */ ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Long Auto - Christopher Ciampoli</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/">



    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/assets/dist/css/product.css" rel="stylesheet">
</head>

<body>

    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="#" aria-label="Product">
                <img src="https://longofathens.com/site-images/dealers/0/athens-logo.jpg" alt="Long Auto Logo" width="100" height="50">
            </a>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '';
            } else {
                echo '<a class="py-2 d-none d-md-inline-block" href="/register">Register</a>';
            }
            ?>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<a class="py-2 d-none d-md-inline-block" href="/logout">Logout</a>';
            } else {
                echo '<a class="py-2 d-none d-md-inline-block" href="/login">Login</a>';
            }
            ?>
        </nav>
    </header>

    <main>
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
    </main>


    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-muted">&copy; 20231</small>
            </div>
        </div>
    </footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>