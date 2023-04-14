<?php
session_start();
include('config/dbconn.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                Register Users
              </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                <li class="breadcrumb-item active">Register Users</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
      </div>
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <!-- <div class="card-header">
                            </div> -->
              <div class="card-body">
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
                                <th>Update</th>
                                <th>User Status</th>
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
                                  <td>
                                    <?php
                                    if ($row['user_type'] == 1) {
                                      echo '<p class="">Admin</p>';
                                    } else {
                                      echo '<p class="">User</p>';
                                    }
                                    ?>
                                  </td>
                                  <td><?php echo $row['password']; ?></td>
                                  <td>
                                    <a href='user_register_edit.php?id=<?php echo $row['id'] ?>'>Edit</a>
                                    <!-- <a href='delete-inline.php?id=<?php echo $row['sid'] ?>'>Delete</a> -->
                                  </td>
                                  <td>
                                    <?php
                                    if ($row['user_status'] == 1) {
                                      echo '<a class="btn btn-success" href="user_status.php?id=' . $row['id'] . '&user_status=0">Active</a>';
                                    } else {
                                      echo '<a class="btn btn-danger" href="user_status.php?id=' . $row['id'] . '&user_status=1">Inactive</a>';
                                    }
                                    ?>
                                  </td>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>