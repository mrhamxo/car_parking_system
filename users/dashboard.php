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
        <div class="row mr-4">
            <div class="btn btn-success mt-4 ml-4 col-3">
                Available
            </div>
            <div class="btn btn-danger mt-4 ml-4 col-3">
                Unavailable
            </div>
        </div>
        <div class="row mt-4 ml-4">
            <?php
            $sql="SELECT *
            FROM parking
            JOIN park_slot
            ON parking.slot_id = park_slot.slot_id";
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res)){
            ?>
            <div style="display:table;height:200px" class="col-3 ml-1 mt-4">
                <a style="display:table-cell;background-color:green;text-decoration: none;padding:50px;text-align:center;"
                    href="uet_slot.php" class="text-light">
                    <p><?php echo "Park Name: ".$row['parking_name'];?></p>
                    <p><?php echo "Total Slots: ". $row['total_slots'];?></p>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
include('includes/footer.php');
?>