<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Long Auto - Christopher Ciampoli</title>
    <!-- Common CSS, JS, etc. here -->
</head>

<body>
    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="/" aria-label="Logo">
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
        <?= $content ?>
    </main>


    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-muted">&copy; 2023</small>
            </div>
        </div>
    </footer>
    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
</body>

</html>