<form action="/loginPost" method="POST" id="loginForm">
  <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

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

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>

  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</form>

<script>
  $(document).ready(function() {
    $("#loginForm").validate({
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
          required: "Please enter your username",
          minlength: "Username should be at least 3 characters long"
        },
        password: {
          required: "Please enter your password",
          minlength: "Password should be at least 6 characters long"
        }
      }
    });
  });
</script>