<?php
include('config/dbconn.php');
include('includes/header.php');
include('includes/topbar.php');
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
                            <h4 class="m-0"><strong>Edit</strong> Parks</h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right text-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="add_vehicle.php">Manage Parks</a></li>
                                <li class="breadcrumb-item active">Edit Parks</li>
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
                                <strong>Edit </strong>Parks
                            </div>
                            <?php
                            $edit_park = $_GET['id'];
                            $sql = "SELECT * FROM parks WHERE pid = {$edit_park}";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="card-body card-block">
                                        <form action="update_park.php" method="POST" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Park Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="hidden" name="pid" value="<?php echo $row['pid'] ?>" />
                                                    <input type="text" id="catename" name="park_name" value="<?php echo $row['park_name'] ?>" class="form-control" placeholder="Enter Park Name" required="true">
                                                </div>
                                            </div>
                                            <!-- <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Total Slots</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="catename" name="edit_total_slots" value="<?php echo $row['total_slots'] ?>" class="form-control" placeholder="Enter Total Slot" required="true">
                                                </div>
                                            </div> -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="address" name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Enter Park address" required="true">
                                                </div>
                                            </div>
                                            <p style="text-align: center;">
                                                <button type="submit" name="edit_park_btn" class="btn btn-primary btn-sm">Update</button>
                                            </p>
                                        </form>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- /.container-fluid -->
    </div>
</div>

<script>
    let autocomplete;
    let address1Field;
    // let address2Field;
    // let postalField;

    function initAutocomplete() {
        address1Field = document.querySelector("#address");
        // address2Field = document.querySelector("#address2");
        // postalField = document.querySelector("#postcode");
        // Create the autocomplete object, restricting the search predictions to
        // addresses in the US and Canada.
        autocomplete = new google.maps.places.Autocomplete(address1Field, {
            componentRestrictions: {
                country: ["us", "ca", "pak"]
            },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });
        address1Field.focus();
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
    }

    // function fillInAddress() {
    //     // Get the place details from the autocomplete object.
    //     const place = autocomplete.getPlace();
    //     let address1 = "";
    //     let postcode = "";

    //     // Get each component of the address from the place details,
    //     // and then fill-in the corresponding field on the form.
    //     // place.address_components are google.maps.GeocoderAddressComponent objects
    //     // which are documented at http://goo.gle/3l5i5Mr
    //     for (const component of place.address_components) {
    //         // @ts-ignore remove once typings fixed
    //         const componentType = component.types[0];

    //         switch (componentType) {
    //             case "street_number": {
    //                 address1 = `${component.long_name} ${address1}`;
    //                 break;
    //             }

    //             case "route": {
    //                 address1 += component.short_name;
    //                 break;
    //             }

    //             case "postal_code": {
    //                 postcode = `${component.long_name}${postcode}`;
    //                 break;
    //             }

    //             case "postal_code_suffix": {
    //                 postcode = `${postcode}-${component.long_name}`;
    //                 break;
    //             }
    //             case "locality":
    //                 document.querySelector("#locality").value = component.long_name;
    //                 break;
    //             case "administrative_area_level_1": {
    //                 document.querySelector("#state").value = component.short_name;
    //                 break;
    //             }
    //             case "country":
    //                 document.querySelector("#country").value = component.long_name;
    //                 break;
    //         }
    //     }

    //     address1Field.value = address1;
    //     postalField.value = postcode;
    //     // After filling the form with address components from the Autocomplete
    //     // prediction, set cursor focus on the second address line to encourage
    //     // entry of subpremise information such as apartment, unit, or floor number.
    //     address2Field.focus();
    // }

    window.initAutocomplete = initAutocomplete;
</script>
<?php
include('includes/footer.php');
?>