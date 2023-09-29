<?php

/** @var array $vehicles */ ?>


<link href="/assets/dist/css/product.css" rel="stylesheet">
<div class="container">
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
            <a class="py-2 d-none d-md-inline-block" href="/">Back</a>
            <!-- Display edit button only if the user is logged in -->
            <?php if (isset($_SESSION['user_id'])) : ?>
              <a href="/vehicles/edit/<?= $vehicle->id ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>