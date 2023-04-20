<?php
session_start();
if(!isset($_SESSION['welcomevisited'])){
  header('Location: welcome.php');
}
include("dbfiles/connect.php");
//$sql_get_component_and_str_and_timeline = 'SELECT components.name as compname, `structures`.name as strname,time_lines.from,time_lines.to FROM `components` INNER JOIN structures on components.structureId = structures.id INNER JOIN `time_lines` ON `structures`.`timeLineId`=`time_lines`.`id` WHERE `components`.`id`=' . $_GET['compid'] . ' LIMIT 1';

$sql_leaders = 'SELECT `leaders`.name,components.name as compname,date_from,`leaders`.dateto, `structures`.name as strname,time_lines.from,time_lines.to FROM `leaders` INNER JOIN `components` ON `leaders`.`componentId` = `components`.`id` INNER JOIN structures on components.structureId = structures.id INNER JOIN `time_lines` ON `structures`.`timeLineId`=`time_lines`.`id` WHERE `leaders`.`name` LIKE \'%'.$_GET['name'].'%\' ORDER BY date_from DESC;';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaders</title>

    <link href="./assets/styles/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="./assets/styles/archive.css">
    <link href="./assets/styles/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
</head>

<body>
    <?php include_once("header.php"); ?>

    <div class="main-content">
        <div class="col-md-12 pt-5">
            <div class="container-fluid">



                <div class="row">
                    <div class="col-md-12">


                        <div class="card">
                            <div class="card-header alert-light d-flex">
                                <h5 class="card-title col-10" id="cardtitle">
                                   Umuyobozi <b><?php echo $_GET['name'];?></b>, naho yayoboye

                                </h5>

                                <div class="col-2">
                                    <button class="btn btn-outline-primary" id="btnback">Gusubira inyuma</button>
                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="leaderstable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Amazina</th>
                                            <th>Aho yayoboye</th>
                                            <th>Igihe Yagiriyeho</th>
                                            <th>Igihe Yaviriyeho</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        $result = $conn->query($sql_leaders);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<tr>
                                                        <td>' . $row['name'] . '</td>
                                                        <td>' . $row['compname'] .'</td>
                                                        <td>' . $row['date_from'] .'</td>
                                                        <td>' . $row['dateto'] . '</td>
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
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
        $("#leaderstable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthMenu": [10],
            order: [[2, 'asc']]
        });

        $("#btnback").on("click", () => {
            goBack();
        })

        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>