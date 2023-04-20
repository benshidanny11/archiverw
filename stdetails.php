<?php
require("./dbfiles/connect.php");
$parent = 26;
//Quries
$sql_get_comp_children = 'SELECT * FROM components WHERE componentId=' . $_GET['compid'];
$sql_get_component_name = 'SELECT name FROM components WHERE id=' . $_GET['compid'];
$sql_get_structrename = 'SELECT name FROM structures WHERE id=' . $_GET['stid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive :: time line structure</title>
    <link href="./assets/styles/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/styles/bootstrap.css" rel="stylesheet" />
    <link href="./assets/styles/bootstrap.css.map" rel="stylesheet" />
    <link href="./assets/styles/main.css" />
    <link rel="stylesheet" href="./assets/styles/archive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <header id="page-top">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-12 text-center">
                    <h2>ARCHIVE RWANDA</h2>
                    <hr class="star-primary" />
                </div>
            </div>
        </div>
    </header>


    <!-- <div class="content-wrapper"> -->
    <div class="container">
        <div class="col-md-12 pt-5">
            <div class="card">
                <div class="card-header d-flex">
                    <?php

                    $result_get_structrename = $conn->query($sql_get_structrename);
                    $result_get_componentname = $conn->query($sql_get_component_name);
                    if ($result_get_structrename->num_rows > 0) {
                        $row_comp = $result_get_componentname->fetch_assoc();
                        $row = $result_get_structrename->fetch_assoc();
                        echo  ' <h5 class="card-title col-8">Uko inzego zari zubatse muri '.$row['name'].' ya '.$row_comp['name'].'</h5>';
                    }
                    ?>


                    <div class="col-4">
                        <a href="index.php" class="btn btn-outline-primary">Gusubira inyuma</a>
                    </div>
                </div>
            </div>

            <?php

            $result_get_componentchildren = $conn->query($sql_get_comp_children);
            if ($result_get_componentchildren->num_rows > 0) {
                while ($row = $result_get_componentchildren->fetch_assoc()) {
                    echo '<div class="card  card-outline card-primary collapsed-card mt-1">
                        <div class="card-header"><p class="card-title"><p>' . $row['name'] . '<p/>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                     </button>
                 </div>
              </div>
            </div>';
                }
            }

            ?>
        </div>
    </div>
    <!-- </div> -->




    <script src="./assets/js/jquery-1.11.0.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>
</body>

</html>