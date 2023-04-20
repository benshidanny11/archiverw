<?php

session_start();
if(!isset($_SESSION['welcomevisited'])){
  header('Location: welcome.php');
}
include("dbfiles/connect.php");
$sql = "SELECT * FROM `books`";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

    <link href="./assets/styles/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="./assets/styles/archive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet"  href="./assets/styles/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .bookimage:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include_once("header.php"); ?>
    <div class="martop5"></div>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-header alert-light d-flex">
                                <h5 class="card-title col-8" id="cardtitle">
                                    Inyandiko z'amateka naho biherereye
                                </h5>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="leaderstable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Urwego rwayanditse</th>
                                            <th>Aho giherereye</th>
                                            <th>Coordinates</th>
                                            <th>Map</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<tr>
                                                        <td>' . $row['bookowner'] . '</td>
                                                        <td>' . $row['location'] . '</td>
                                                        <td>Lat:' . $row['latitude'] . ',Long: ' . $row['longitude'] . '</td>
                                                        <td><a href="http://maps.google.com/maps?q=' . $row['latitude'] . '+' . $row['longitude'] . '+(label)&ll=' . $row['latitude'] . ',' . $row['longitude'] . '&spn=0.004250,0.011579&t=h&iwloc=A&hl=en" class="btn btn-primary" id="viewmap" target="_blank" style=" width: 150px;"><i class="fas fa-map-marker-alt"></i> Reba kwikarita</a></td>
                                                    </tr>';
                                            }
                                        }
                                        mysqli_close($conn);

                                        ?>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>

    <div class="modal fade" id="bookimagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="closemodal" class="close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <img src="" id="imagepreview" style="width: 450px; height: 500px;">
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $("#leaderstable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthMenu": [10]
        });

        var imagelist = document.getElementsByClassName("bookimage");

        for (let i = 0; i < imagelist.length; i++) {
            imagelist[i].addEventListener("click", () => {
                $('#imagepreview').attr('src', $(imagelist[i]).attr('src'));
                $('#bookimagemodal').modal('show');
            });
        }
        $("#closemodal").on("click", function() {
            $("#bookimagemodal").modal("hide");
        })
    </script>

</body>

</html>