<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    header('location:login.php');
}
include('config/dbconn.php');
include('includes/header.php');
//include('includes/topbar.php');
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
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add </strong>Parks
                            </div>
                            <?php
                            if (isset($_POST['park_btn'])) {
                                $park_name = $_POST['park_name'];
                                $address = $_POST['address'];
                                $sql = "INSERT INTO `parks` (`park_name`, `address`) VALUES ('{$park_name}', '{$address}')";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    echo "<script>
                                    window.location.href=('manage_parks.php');
                                    </script>";
                                }
                            }
                            ?>
                            <div class="card-body card-block">
                                <form action="" method="POST" class="form-horizontal">
                                    <?php
                                if(isset($_POST['add_park'])){
                                $park_name=$_POST['park_name'];
                                $address=$_POST['address'];
                                echo $park_name;
                                echo $address;
                                }
                                ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Park Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="park_name" class="form-control"
                                                placeholder="Enter Park Name" required="true">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Address</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="address" name="address" class="form-control"
                                                placeholder="Enter Park Address" autocomplete="off">
                                        </div>
                                    </div>
                                    <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="otherCheckBox" class=" form-control-label">Other
                                                Address:</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="checkbox" id="otherCheckBox" onclick="myFunction()">
                                            <input type="text" id="otherAddress" style="display:none" name="address"
                                                class="form-control" placeholder="Enter Other Address"
                                                autocomplete="off" required="true">
                                        </div>
                                    </div> -->

                                    <button type="submit" name="add_park" class="btn btn-primary btn-sm">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let autocomplete;
let address1Field;

function initAutocomplete() {
    address1Field = document.querySelector("#address");

    autocomplete = new google.maps.places.Autocomplete(address1Field, {
        componentRestrictions: {
            country: ["us", "ca", "pak"]
        },
        fields: ["address_components", "geometry"],
        types: ["address"],
    });
    address1Field.focus();
    autocomplete.addListener("place_changed", fillInAddress);
}

window.initAutocomplete = initAutocomplete;
</script>
<script>
function myFunction() {
    var otherCheckBox = document.getElementById("otherCheckBox");
    var otherAddress = document.getElementById("otherAddress");
    if (otherCheckBox.checked == true) {
        otherAddress.style.display = "block";
    } else {
        otherAddress.style.display = "none";
    }
}
</script>
<?php
include('includes/footer.php');
?>