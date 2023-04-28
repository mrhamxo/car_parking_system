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
            <div style="display:table;height:200px" class="col-3 ml-1">
                <a style="display:table-cell;background-color:green;text-decoration: none;padding:50px;text-align:center;"
                    href="uet_slot.php"></a>
            </div>
            <div style="display:table;" class="col-3 ml-1">
                <a style="display:table-cell;background-color:green;text-decoration: none;padding:50px;text-align:center;"
                    href="uet1_slot.php"></a>
            </div>
            <div style="display:table;" class="col-3 ml-1">
                <a style="display:table-cell;background-color:green;text-decoration: none;padding:50px;text-align:center;"
                    href="uet2_slot.php"></a>
            </div>
            <div style="display:table;height:200px" class="col-3 ml-1 mt-4">
                <a style="display:table-cell;background-color:green;text-decoration: none;padding:50px;text-align:center;"
                    href="uet3_slot.php"></a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
include('includes/footer.php');
?>