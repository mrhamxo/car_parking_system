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
<?php
$id=$_GET['id'];
echo $id;
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
    $check=1;
    if($check == 1){
    ?>
    <div class="conatiner" style="margin:20px 0px 0px 50px;background-attachment:fixed;width:900px">
        <div class="row">
            <div class="col-3 mr-4 mt-4 bg-success" style="border:2px solid red;width:300px;height:300px">

            </div>
            <div class="col-3 mr-4 mt-4 bg-success" style="border:2px solid red;width:300px;height:300px">

            </div>
            <div class="col-3 mr-4 mt-4 bg-success" style="border:2px solid red;width:300px;height:300px">

            </div>
            <div class="col-3 mr-4 mt-4 mb-4 bg-success" style="border:2px solid red;width:300px;height:300px">

            </div>
        </div>
    </div>
    <?php
    }else{
    ?>
    <div class="conatiner" style="margin:50px 0px 0px 50px;background-attachment:fixed;width:900px">
        <div class="row">
            <div class="col-3 mr-4 mt-4 bg-danger" style="border:2px solid red;width:300px;height:300px">

            </div>
            <div class="col-3 mr-4 mt-4 bg-danger" style="border:2px solid red;width:300px;height:300px">

            </div>
            <div class="col-3 mr-4 mt-4 bg-danger" style="border:2px solid red;width:300px;height:300px">

            </div>
            <div class="col-3 mr-4 mt-4 mb-4 bg-danger" style="border:2px solid red;width:300px;height:300px">

            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
</div>
</div>
<?php
include('includes/footer.php');
?>