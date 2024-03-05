<?php
// Include your database connection file
include 'db.php';

// Initialize error variables
$username_err = $lastname_err = $firstname_err = $middlename_err = $email_err = $password_err = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate lastname
    if (empty(trim($_POST["lastname"]))) {
        $lastname_err = "Please enter your last name.";
    } else {
        $lastname = trim($_POST["lastname"]);
    }

    // Validate firstname
    if (empty(trim($_POST["firstname"]))) {
        $firstname_err = "Please enter your first name.";
    } else {
        $firstname = trim($_POST["firstname"]);
    }

    // Validate middlename
    $middlename = trim($_POST["middlename"]);

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);

        // Check if email already exists in the database
        $sql = "SELECT id FROM user WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $email_err = "This email is already taken.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($lastname_err) && empty($firstname_err) && empty($email_err) && empty($password_err)) {
        // Prepare an insert statement
        // Prepare an insert statement
     $sql = "INSERT INTO user (user_id, username, lastname, firstname, middlename, email, password, status, active) VALUES (?, ?, ?, ?, ?, ?, ?, 'default_value', 'default_value')";



        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters to the prepared statement
            $stmt->bind_param("issssss", $param_user_id, $param_username, $param_lastname, $param_firstname, $param_middlename, $param_email, $param_password);

            // Set parameters
            $param_user_id = 255; // Change this to the desired user ID
            $param_username = $username;
            $param_lastname = $lastname;
            $param_firstname = $firstname;
            $param_middlename = $middlename;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login-v2.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close the prepared statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Icheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <form action="registerform.php" method="post">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="registerform.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <?php if (isset($username_err)): ?>
            <span class="text-danger"><?php echo $username_err; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <?php if (isset($lastname_err)): ?>
            <span class="text-danger"><?php echo $lastname_err; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <?php if (isset($firstname_err)): ?>
            <span class="text-danger"><?php echo $firstname_err; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="middlename" placeholder="Middle Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <?php if (isset($middlename_err)): ?>
            <span class="text-danger"><?php echo $middlename_err; ?></span>
          <?php endif; ?>
        </div>

        <div class="input-group mb-3">
    <input type="text" class="form-control" name="user_id" placeholder="User ID" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-id-badge"></span>
        </div>
    </div>
</div>
<?php if (isset($user_id_err)): ?>
    <span class="text-danger"><?php echo $user_id_err; ?></span>
<?php endif; ?>


        <div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<?php if (isset($email_err)): ?>
    <span class="text-danger" style="font-size: 12px;"><?php echo $email_err; ?></span>
<?php endif; ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php if (isset($password_err)): ?>
            <span class="text-danger"><?php echo $password_err; ?></span>
          <?php endif; ?>
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" <?php echo isset($_POST['terms']) ? 'checked' : ''; ?>>
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login-v2.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>