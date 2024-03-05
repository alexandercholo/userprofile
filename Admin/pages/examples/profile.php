<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="login-v2.php" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span href="login-v2.php" class="brand-text font-weight-light">Log-out</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="userprofile.php" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">Nina Mcintire</h3>
                <div class="card-body">
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
                <a href="userprofile.php" class="btn btn-primary btn-block"><b>View Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <form class="form-horizontal" method="POST" action="saveprofilechanges.php" enctype="multipart/form-data">

            <div class="card">
              <div class="card-header p-2">
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="POST" action="saveprofilechanges.php">
                    <div class="form-group row">
                      <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
                      </div>
                    </div>
                    
    <div class="form-group row">
      <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
      <div class="col-sm-10">
        <input type="tel" class="form-control" id="phone_number" placeholder="Phone Number" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="address" class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="address" placeholder="Address" required>
      </div>
    </div>
    <form method="post" action="saveprofilechanges.php">
    <!-- Other form fields -->

    <form method="post" action="saveprofilechanges.php" onsubmit="return validateForm()">

    <!-- Other form fields -->
<form action="saveprofilechanges.php" method="POST" onsubmit="return validateForm()">
    <div class="form-group row">
        <label for="dob"  class="col-sm-2 col-form-label">Date of Birth:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD" required>
    </div>  
  </div>
</form>



    <div class="form-group row">
      <label for="gender" class="col-sm-2 col-form-label">Gender</label>
      <div class="col-sm-10">
        <select class="form-control" id="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">50/50</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="profile_picture" class="col-sm-2 col-form-label">Profile Picture</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="profile_picture">
      </div>
    </div>
    <div class="form-group row">
      <label for="bio" class="col-sm-2 col-form-label">Notes</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="bio" placeholder="Bio/Description"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="social_media" class="col-sm-2 col-form-label">Social Media Links</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="social_media" placeholder="Social Media Links">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button  type="submit" class="btn btn-danger">Save Changes</button>
      </div>
    </div>
  </form>
</div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

</body>
</html>
