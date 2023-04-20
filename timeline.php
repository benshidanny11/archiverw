<?php
header('Content-type: text/html; charset=UTF-8');
session_start();
if (!isset($_SESSION['welcomevisited'])) {
    header('Location: welcome.php');
}
require("./dbfiles/connect.php");
$parent = 0;
//Quries
$sql_get_time_line = 'SELECT * FROM time_lines WHERE id=' . $_GET['id'];

if (!isset($_GET['parentid'])) {
    $sql_get_levels = 'SELECT components.name as name,components.id as id,components.componentId as parent_id, components.structureId as stid,structures.name as strname FROM components INNER JOIN structures ON components.structureId=structures.id WHERE structures.timeLineId=' . $_GET['id'] . ' AND components.componentId is null';
    $sql_get_parent_structre = 'SELECT structures.name as strname FROM components INNER JOIN structures ON components.structureId=structures.id WHERE structures.timeLineId=' . $_GET['id'] . ' AND  components.componentId is null LIMIT 1';
    $result_levels = $conn->query($sql_get_levels);
    $result_parent_structre = $conn->query($sql_get_parent_structre);
    // $row_get_levels = $result_levels->fetch_assoc();
} else if (isset($_GET['parentid'])) {
    $sql_get_levels = "SELECT components.name as name,components.id as id,components.componentId as parent_id, components.structureId as stid,time_lines.id as tid,structures.name as strname FROM components INNER JOIN structures ON components.structureId=structures.id INNER JOIN time_lines ON structures.timeLineId=time_lines.id WHERE structures.name <> 'Su prefegitura' AND components.componentId=" . $_GET['parentid'];
    $sql_get_parent_structre = 'SELECT structures.name as strname,components.name as compname FROM components INNER JOIN structures ON components.structureId=structures.id WHERE structures.timeLineId=' . $_GET['id'] . ' AND components.id=' . $_GET['parentid'] . ' LIMIT 1';
    $sql_get_level_structre = 'SELECT structures.name as strname FROM components INNER JOIN structures ON components.structureId=structures.id WHERE structures.timeLineId=' . $_GET['id'] . ' AND components.componentId=' . $_GET['parentid'] . ' LIMIT 1';
    $result_levels = $conn->query($sql_get_levels);
    $result_parent_structre = $conn->query($sql_get_parent_structre);
    $result_level_structre = $conn->query($sql_get_level_structre);

    $sql_get_suprefecture_levels = "SELECT components.name as name,components.id as id,components.componentId as parent_id, components.structureId as stid,time_lines.id as tid FROM components INNER JOIN structures ON components.structureId=structures.id INNER JOIN time_lines ON structures.timeLineId=time_lines.id WHERE structures.name = 'Su prefegitura' AND components.componentId=" . $_GET['parentid'];
    $result_suprefecture_levels = $conn->query($sql_get_suprefecture_levels);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive :: time line structure</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./assets/styles/archive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link href="assets/styles/main.css" rel="stylesheet" />
    <style>
        .module {
            position: relative;
        }

        .module .collapse,
        .module .collapsing {
            height: 7rem;
        }

        .module .collapse {
            display: block;
            overflow: hidden;
        }

        .module .collapse.show {
            height: auto;
        }


        .read-more {
            opacity: 1;
            transition: all .3s linear;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1;

            background-image: linear-gradient(to bottom, transparent 80%, white);
        }

        .read-more:not(.collapsed) {
            opacity: 0;

        }

        .module {
            position: relative;
        }

        .module .collapse,
        .module .collapsing {
            height: 5rem;
        }

        .module .collapse {
            display: block;
            overflow: hidden;
        }

        .module .collapse.show {
            height: auto;
        }


        .read-more {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1;
            background-image: linear-gradient(to bottom, transparent 60%, white);
            opacity: 1;
            transition: all .3s linear;
        }

        .read-more:not(.collapsed) {
            opacity: 0;
            /* visibility: hidden; */
        }
    </style>
</head>

<body>

    <?php include_once("header.php"); ?>
    <div class="container">
        <div class="col-md-12 pt-5">
            <div class="card cardmod">
                <div class="card-header d-flex">
                    <h5 class="card-title col-9" id="cardtitle">
                        <?php

                        if (isset($result_parent_structre) && isset($result_level_structre)) {

                            $row_level_str = $result_level_structre->fetch_assoc();
                            $row_parent_str = $result_parent_structre->fetch_assoc();
                            if ($row_level_str['strname'] == "Uturere") {
                                echo $row_level_str['strname'] . ' twari mu ' . substr($row_parent_str['compname'], 1) . ' Kuva ' . $_GET['from'] . ' Kugera ' . $_GET['to'];
                            } else {
                                echo $row_level_str['strname'] . ' zari ziri muri ' . $row_parent_str['strname'] . ' ya ' . $row_parent_str['compname'] . ' Kuva ' . $_GET['from'] . ' Kugera ' . $_GET['to'];
                            }
                        } else {
                            $row_parent_str = $result_parent_structre->fetch_assoc();
                            echo $row_parent_str['strname'] . ' zari zihari Kuva ' . $_GET['from'] . ' Kugera ' . $_GET['to'];
                        }
                        ?>
                    </h5>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" id="btnback">Gusubira inyuma</a>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title ">Shaka abayobozi bayoboye inzego</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h6>Shaka ukoresheje urwego</h6>
                            <div class="col-10">

                                <select id="selectlevel" placeholder="Hitamo urwego...">
                                    <option value="">Hitamo urwego...</option>

                                </select>
                            </div>
                            <div class="col-2">
                                <button id="searchleader" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    Shaka
                                </button>
                            </div>

                            <h6>Shaka ukoresheje izina ry'umuyobozi</h6>
                            <div class="col-10">

                                <input type="text" class="form-control" placeholder="Andika izina" id="selectleader" />
                            </div>
                            <div class="col-2">
                                <button id="searchleaderByName" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                    Shaka
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-light martop" role="alert">

                    <?php
                    $result_timeline = $conn->query($sql_get_time_line);
                    if ($result_timeline->num_rows > 0) {
                        $row = $result_timeline->fetch_assoc();
                        echo ' <div class="module">
                        <a class="read-more collapsed" data-toggle="collapse" href="#collapseExample" role="button"></a>
                        <div class="collapse" id="collapseExample" aria-expanded="false">
                          <p>
                           '.$row['description'].'
                          </p>
                        </div>
                      </div>';
                    }

                    ?>
                </div>

                <ul class="list-group" id="structreitem">

                    <?php
                    if ($result_levels->num_rows > 0) {

                        while ($row_get_levels = $result_levels->fetch_assoc()) {
                            if ($row_get_levels['strname'] == 'Komini' || $row_get_levels['strname'] == 'District' || $row_get_levels['strname'] == 'Uturere') {
                                echo ' <li class="list-group-item">
                                <div class="row d-flex">
                                    <div class="col-9"><span>' . $row_get_levels['name'] . '</span></div>
                                    <div class="col-3">
                                            <a href="leaders.php?compid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="fas fa-user-tie"></i> Abayobozi</a>
                                            
                                    </div>
                                </div>
                            </li>';
                            } else {
                                echo ' <li class="list-group-item">
                                <div class="row d-flex">
                                    <div class="col-8"><span>' . $row_get_levels['name'] . '</span></div>
                                    <div class="col-4 ">
                                        <div class="row d-flex">
                                        <a href="timeline.php?id=' . $_GET['id'] . '&parentid=' . $row_get_levels['id'] . '&from=' . $_GET['from'] . '&to=' . $_GET['to'] . '" class="btn btn-primary col-5"><i class="far fa-list-alt"></i> Inzego zirimo</a>
                                            <div class="v-divider col-1"></div>
                                            <a href="leaders.php?compid=' . $row_get_levels['id'] . '" class="btn btn-primary col-5"><i class="fas fa-user-tie"></i> Abayobozi</a>
        
                                        </div>
        
                                    </div>
                                </div>
                            </li>';
                            }
                        }
                    } else {
                        echo '<div class="alert  alert-warning martop" role="alert">Umusozo w\'inzego!</div>';
                    }


                    ?>
                </ul>
                <?php

                if ($result_suprefecture_levels->num_rows > 0) {
                    echo '<div class="alert alert-light martop" role="alert">
                   Su prefegitura zari ziriho muri iki gihe
                   </div>';

                    echo '<ul class="list-group" id="structreitem">';

                    while ($row_get_levels = $result_suprefecture_levels->fetch_assoc()) {
                        echo ' <li class="list-group-item">
                                <div class="row d-flex">
                                    <div class="col-9"><span>' . $row_get_levels['name'] . '</span></div>
                                    <div class="col-3">
                                            <a href="leaders.php?compid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="fas fa-user-tie"></i> Abayobozi</a>    
                                    </div>
                                </div>
                            </li>';
                    }
                    echo '</ul>';
                }

                ?>
            </div>



        </div>


    </div>
    <!-- </div> -->

    <?php
    require_once("footer.php");
    ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script type="text/javascript">
        $("#btnback").on("click", function(e) {
            window.history.back();
        });


        let levelOptions = document.getElementById("selectlevel");
        let leaderlOptions = document.getElementById("selectleader");
        let levelid = "";

        document.getElementById("searchleader").addEventListener("click", function(e) {
            if (levelid === "") {
                alert("Banza uhitemo urwego")
            } else {
                location.href = 'leaders.php?compid=' + levelid;
            }
        });
        $.ajax({
            type: "GET",
            url: 'dbfiles/componentsforleadersfilter.php?timelineid=' + <?php echo $_GET['id']; ?>, // get the route value
            success: function(response) {
                const levels = [];
                for (var i = 0; i < response.length; i++) {
                    levels.push(response[i]);
                }
                levels.forEach((level) => {
                    const levelOption = document.createElement("option");
                    levelOption.innerHTML = `${level.name} (kuva ${level.tfrom} kugera ${level.tto})`;
                    levelOption.value = level.compid;
                    levelOptions.appendChild(levelOption);


                });
                $('#selectlevel').selectize({
                    sortField: 'text'
                }).on("change", function(e) {
                    levelid = e.target.value;
                });
            }
        })

        document.getElementById("searchleaderByName").addEventListener("click", function(e) {
            const leaderName = document.getElementById('selectleader').value;
            if (leaderName === "") {
                alert("Banza wandike Izina")
            } else {
                location.href = 'leadersfilterbyname.php?name=' + leaderName;
            }
        });

        $('#readMore').click(function() {
            $('.read').toggleClass('read-less');
            if ($(this).text() == 'Show Less') $(this).text('Show More');
            else $(this).text('Show Less');
        });
    </script>
</body>
</body>

</html>