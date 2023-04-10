<?php
include('config/dbconn.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                        <li class="breadcrumb-item active">Register Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
     <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Register User
            </h3>
            <!-- Button trigger modal -->
            <a href="add_users.php" class="btn btn-primary float-sm-right">Add Users</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <h1>All Users</h1>
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>User_Name</th>
                  <th>Email</th>
                  <th>User_type</th>
                  <th>Password</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM `user`";
                $qry = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($qry)) {
                ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['user_type']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
   </div>
<?php
include('includes/footer.php');
?>