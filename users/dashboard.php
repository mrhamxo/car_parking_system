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
            <div class="bg-success mt-4 ml-4 col-3 text-center pt-2" style="height:50px;width:200px">
                Available
            </div>
            <div class="bg-danger mt-4 ml-4 col-3 pt-3 text-center" style="height:50px;width:200px">
                Unavailable
            </div>
        </div>
        <div class="row mt-4 ml-4">
            <?php
            $sql="SELECT *FROM parks";
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res)){
            ?>
            <div style="display:table;height:200px; display:table-cell;background-color:green;text-decoration:none;padding:50px; text-align:center"
                class="col-3 ml-1 mt-4">
                <p><?php echo "Park Name: ".$row['park_name'];?></p>
                <p><?php echo "Total Slots: ". $row['total_slots'];?></p>
                <p><?php echo "Location: ". $row['location'];?></p>
                <a style="display:table-cell;background-color:green;text-decoration: none;padding:50px;text-align:center;"
                    href="uet_slot.php?id=<?php echo $row['pid']?>" class="text-light">click
                </a>
            </div>
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