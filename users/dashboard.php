<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('location: login.php');
}
include('config/dbconn.php');
include('includes/header.php');
include('includes/sidebar.php');
?>
<div class="content-wrapper" style="background-color:rgb(254, 254, 255)">
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                                <li class="breadcrumb-item active"><?php echo $user;?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div>
                <div class="row" style="margin-left:20px">
                    <div class="bg-success mt-4 ml-4 col-3 text-center pt-2" style="height:50px;width:200px">
                        Available
                    </div>
                    <div class="bg-danger mt-4 ml-4 col-3 pt-3 text-center" style="height:50px;width:200px">
                        Unavailable
                    </div>
                </div>
        <div class="row mt-4 ml-4">
            <?php
            $sql = "SELECT *FROM parks";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <a href="uet_slot.php?id=<?php echo $row['pid'] ?>"
                class="card my-card bg-success m-4 text-center text-truncate" style="height:300px;width:250px">
                <div class="card-body">
                    <p><?php echo "<b>Park Name<hr></b>" . $row['park_name']; ?></p>
                    <p>
                        <?php
                            $sql1 = "SELECT COUNT(selected_park) as all_slots FROM park_slot WHERE selected_park='{$row['pid']}'";
                            $res1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($res1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($res1)) {
                            ?>
                        <?php echo "<b>Total Slots<hr></b>" . $row1['all_slots']; ?>
                        <?php
                                }
                            }
                            ?>
                    </p>
                    <p><?php echo "<b>Address<hr></b>" . $row['address']; ?></p>
                </div>
            </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</div>
</div>
<?php
include('includes/footer.php');
?>