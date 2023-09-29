<?php

/** @var array $vehicles */ ?>

<!-- Custom styles for this template -->
<link href="/assets/dist/css/product.css" rel="stylesheet">
<div class="container mt-4">
  <form action="/vehicles/update/<?= $vehicle->id ?>" method="post">
    <div class="col">
      <div class="card shadow-sm">
        <!-- You can replace the SVG with an actual image or other content -->
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#55595c" />
          <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $vehicle->make . ' ' . $vehicle->model ?></text>
        </svg>
        <div class="card-body">
          <div class="mb-3">
            <label for="year" class="form-label">Year:</label>
            <input type="number" class="form-control" id="year" name="year" value="<?= $vehicle->year ?>" required>
          </div>
          <div class="mb-3">
            <label for="make" class="form-label">Make:</label>
            <input type="text" class="form-control" id="make" name="make" value="<?= $vehicle->make ?>" required>
          </div>
          <div class="mb-3">
            <label for="model" class="form-label">Model:</label>
            <input type="text" class="form-control" id="model" name="model" value="<?= $vehicle->model ?>" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price ($):</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= number_format($vehicle->price, 2) ?>" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>