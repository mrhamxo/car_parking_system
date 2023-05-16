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
    <div class="row mr-4">
        <div class="bg-success mt-4 ml-4 col-3 text-center pt-2" style="height:50px;width:200px">
            Available
        </div>
        <div class="bg-danger mt-4 ml-4 col-3 pt-2 text-center" style="height:50px;width:200px">
            Unavailable
        </div>
    </div>
    <?php
    //$id=$_GET['id'];
    // $check=1;
    // if($check == 1){
    // ?>
    <div class="row mt-4 ml-4">
        <?php
             $id=$_GET['id'];
             $sql="SELECT parks.park_name,park_slot.slot_name,park_slot.availability_status FROM parks INNER JOIN park_slot ON parks.pid=park_slot.selected_park WHERE park_slot.selected_park=$id";
             $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res)){
            if($row['availability_status']=="available"){
            ?>
        <div class="card my-card bg-danger m-4 text-center text-truncate"
            style="height:300px;width:250px;padding-top:10px;padding-bottom:0px">
            <p><?php echo "<b>Slot Name</b><br>".$row['slot_name'];?></p>
            <hr>
            <p><?php echo "<b>Selected Park</b><br>". $row['park_name'];?></p>
            <hr>
        </div>
        <?php
            }else{?>
        <div class="card my-card bg-success m-4 text-center text-truncate"
            style="height:300px;width:250px;padding-top:10px;padding-bottom:0px">
            <p><?php //echo "<b>Slot Name</b><br>".$row['slot_name'];?></p>
            <hr>
            <p><?php //echo "<b>Selected Park</b><br>". $row['selected_park'];?></p>
            <hr>
        </div>
        <?php }
    }?>
    </div>
</div>
</div>
</div>
</div>
<?php
include('includes/footer.php');
?>