<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Long Auto - Christopher Ciampoli - Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and jQuery validation plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form action="/registerPost" method="POST" id="registrationForm">
        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please Register</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= htmlentities($error) ?></div>
        <?php endif; ?>

        <div class="form-floating">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
          <label for="username">Username</label>
        </div>
        
        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
      </form>
    </main>

    <script>
        $(document).ready(function() {
            $("#registrationForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    username: {
                        required: "Please enter a username",
                        minlength: "Username should be at least 3 characters long"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password should be at least 6 characters long"
                    }
                }
            });
        });
    </script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
