<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('location:login.php');
}
?>
<?php
include('config/dbconn.php');
include('config/dbconn.php');
include('includes/header.php');
include('includes/sidebar.php');
echo "<script>if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
    }  
    </script>";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
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
        </div>
    </div>

    <div class="animated fadeIn">
        <div class="row justify-content-center" >
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Add </strong>Parks
                    </div>
                    <div class="card-body card-block">
                        <?php
                        if(isset($_POST['check'])){
                        //echo "<h1>Hello This is Check</h1>";
                        $sql="select *from slots";
                        $res=mysqli_query($conn,$sql);
                        if($res){
                        echo "Successfully!";
                        }
                        }
                        ?>
                        <form action="" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label for="select1">Select Park:</label>
                                <select class="form-control" id="park" name="park">
                                    <option value="park">Select Park</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="select2">Select Slot:</label>
                                <select class="form-control" id="slot" name="slot">
                                    <option value="slot">Select Slot</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" name="check" value="?= $id;">Select_Slot</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
    </div><!-- .animated -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        function loadData(type, category_id) {
            $.ajax({
                url: "load-cs.php",
                type: "POST",
                data: {
                    type: type,
                    id: category_id
                },
                success: function(data) {
                    if (type == "stateData") {
                        $("#slot").html(data);
                    } else {
                        $("#park").append(data);
                    }

                }
            });
        }

        loadData();

        $("#park").on("change", function() {
            var park = $("#park").val();

            if (park != "") {
                loadData("stateData", park);
            } else {
                $("#slot").html("");
            }


        })
    });
    </script>
</div>
<?php
include('includes/footer.php');
?>
</body>

</html>