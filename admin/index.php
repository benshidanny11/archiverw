<?php
session_start();
include("../displayerrors.php");
if (!isset($_SESSION['uname'])) {
  header('location: ./../login.php');
}
require("./dbfiles/connect.php");
if (!isset($_GET['parentid']) && !isset($_GET['id'])) {
  $sql_get_levels = 'SELECT components.name as name,components.name as text,components.id as id,components.componentId as parent_id, components.structureId as stid,time_lines.id as tid FROM components INNER JOIN structures ON components.structureId=structures.id INNER JOIN time_lines ON structures.timeLineId=time_lines.id WHERE structures.timeLineId=1 AND structures.name <> \'Su prefegitura\' AND components.componentId is null';
  $result_levels = $conn->query($sql_get_levels);
} else if (!isset($_GET['parentid'])&& isset($_GET['id'])) {
  $sql_get_levels = 'SELECT components.name as name,components.name as text,components.id as id,components.componentId as parent_id, components.structureId as stid,time_lines.id as tid FROM components INNER JOIN structures ON components.structureId=structures.id INNER JOIN time_lines ON structures.timeLineId=time_lines.id WHERE structures.timeLineId=' . $_GET['id'] . ' AND structures.name <> \'Su prefegitura\' AND components.componentId IS  NULL';
  $result_levels = $conn->query($sql_get_levels);

} else if (isset($_GET['parentid'])&& isset($_GET['id'])) {
  $sql_get_levels = 'SELECT components.name as name,components.name as text,components.id as id,components.componentId as parent_id, components.structureId as stid,time_lines.id as tid FROM components INNER JOIN structures ON components.structureId=structures.id INNER JOIN time_lines ON structures.timeLineId=time_lines.id WHERE structures.timeLineId=' . $_GET['id'] . ' AND structures.name <> \'Su prefegitura\' AND components.componentId=' . $_GET['parentid'];
  $sql_get_suprefecture_levels = 'SELECT components.name as name,components.name as text,components.id as id,components.componentId as parent_id, components.structureId as stid,time_lines.id as tid FROM components INNER JOIN structures ON components.structureId=structures.id INNER JOIN time_lines ON structures.timeLineId=time_lines.id WHERE structures.timeLineId=' . $_GET['id'] . ' AND structures.name = \'Su prefegitura\' AND components.componentId=' . $_GET['parentid'];
  $result_levels = $conn->query($sql_get_levels);
  $result_suprefecture_levels = $conn->query($sql_get_suprefecture_levels);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="au theme template" />
  <meta name="author" content="Hau Nguyen" />
  <meta name="keywords" content="au theme template" />

  <!-- Title Page-->
  <title>Dashboard</title>


  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all" />
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all" />
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all" />

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all" />
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all" />
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all" />
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all" />
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all" />
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all" />
  <style>
    hr {
      margin-top: 20px;
      margin-bottom: 20px;
      border: 0;
      border-top: 1px solid rgb(160, 160, 160);
    }
  </style>
</head>

<body class="animsition">
  <div class="page-wrapper">


    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="">
        <a class="logo" href="index.html">
          <h3>ARCHIVE</h3>
        </a>
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li class="active">
              <a class="js-arrow" href="index.php">
                <i class="fas fa-table"></i>Admnistrative levels</a>

            </li>
            <li>
              <a href="#"> <i class="far fa-clock"></i>Time lines</a>
            </li>
            <li>
              <a href="structures.php"> <i class="fas fa-chart-bar"></i>Structures</a>
            </li>
            <li>
              <a href="books.php"> <i class="fas fa-book"></i>Books</a>
            </li>
            <li class="disabled" style="pointer-events: none;">
              <a href="leaders.php"><i class="fas fa-users"></i>Leaders</a>
            </li>
            <li class="">
              <a href="feedbacks.php">
                <i class="fas fa-comment-dots"></i>Feedbacks
              </a>
            </li>
            <li>
              <a href=""><i class="fas fa-users-cog"></i>Users</a>
            </li>


          </ul>
        </nav>
      </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              <div class="form-header"></div>
              <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">

                    <div class="content">
                      <a class="js-acc-btn" href="#"><?php echo $_SESSION['name'] ?></a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                      <div class="info clearfix">

                        <div class="content">
                          <a href="#"> <i class="zmdi zmdi-power"></i>Logout</a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- HEADER DESKTOP-->

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="overview-wrap">
                  <h2 class="title-1">Administration levels</h2>
                  <a class="au-btn au-btn-icon au-btn--blue" href="registercomponent.php">
                    <i class="zmdi zmdi-plus"></i>Add level
                  </a>
                  <a class="au-btn au-btn-icon au-btn--blue" id="btnclick">
                    <i class="zmdi zmdi-plus"></i> Back
                  </a>
                </div>
              </div>
            </div>
            <hr />

            <div class="row">

              <div class="card col-12">
                <label for="floatingSelect">Please choose TimeLine to view Structures and click on level to view leaders</label>
                <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="choosetimeline">

                </select>

                <ul class="list-group" id="structreitem">

                  <?php
                  if ($result_levels->num_rows > 0) {

                    while ($row_get_levels = $result_levels->fetch_assoc()) {
                      echo ' <li class="list-group-item">
                            <div class="row d-flex">
                                <div class="col-6"><span>' . $row_get_levels['name'] . '</span></div>
                                <div class="col-6 ">
                                    <div class="row d-flex">
                                    <a href="index.php?id=' . $row_get_levels['tid'] . '&parentid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="far fa-list-alt"></i>Levels</a>
                                       
                                        <a href="leaders.php?compid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="fas fa-user-tie"></i>Leaders</a>
                                         
                                        <a href="editlevel.php?compid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="fas fa-edit"></i>Edit level</a>
                                        <a href="deletecomponent.php?compid=' . $row_get_levels['id'] . '" class="btn btn-danger"><i class="fas fa-trash"></i>Delete  level</a>


                                    </div>

                                </div>
                            </div>
                        </li>';
                    }
                  } else {
                    echo '<div class="alert  alert-warning martop" role="alert">No levels found!</div>';
                  }


                  ?>
                </ul>
                <?php
                if(isset($result_suprefecture_levels)){

                
                if($result_suprefecture_levels->num_rows > 0){
                echo '<div class="alert alert-light martop" role="alert">
                Su prefecture that was there during this period
                </div>';

                echo '<ul class="list-group" id="structreitem">';

                while ($row_get_levels = $result_suprefecture_levels->fetch_assoc()) {
                  echo ' <li class="list-group-item">
                  <div class="row d-flex">
                      <div class="col-6"><span>' . $row_get_levels['name'] . '</span></div>
                      <div class="col-6 ">
                          <div class="row d-flex">
                          <a href="index.php?id=' . $row_get_levels['tid'] . '&parentid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="far fa-list-alt"></i>Levels</a>
                             
                              <a href="leaders.php?compid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="fas fa-user-tie"></i>Leaders</a>
                               
                              <a href="editlevel.php?compid=' . $row_get_levels['id'] . '" class="btn btn-primary"><i class="fas fa-edit"></i>Edit level</a>
                              <a href="deletecomponent.php?compid=' . $row_get_levels['id'] . '" class="btn btn-danger"><i class="fas fa-trash"></i>Delete  level</a>


                          </div>

                      </div>
                  </div>
              </li>';
                }
                echo '</ul>';
              }
            }
                ?>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="copyright">
                  <p>
                    Copyright © <script>
                      document.write(new Date().getFullYear());
                    </script> Archive. All rights reserved.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>
  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js"></script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js"></script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="js/main.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function() {


      //time line and levels loading


      $.ajax({
        url: "dbfiles/alltimelines.php",
        method: "GET",
        dataType: "json",
        success: function(data) {
          $.each(data, (index, item) => {
            var option = document.createElement("option");
            option.value = item.id;
            option.innerHTML = `From ${item.from} to ${item.to}`;

            $("#choosetimeline").append(option);
          })

          //load default levels

          $.ajax({
            url: 'dbfiles/componentstree.php?timelineid=' + data[0].id,
            method: 'GET',
            dataType: 'json',
            success: function(data) {

              let treearray = [];
              data.forEach((item) => {
                item.parent = item.parent === null ? "#" : item.parent;
                item.icon = "far fa-list-alt";
              })


              $('#myTree').
              on('changed.jstree', function(e, data) {
                const {
                  id,
                  stid
                } = data.node.original;

                location.href = `leaders.php?compid=${id}&strid=${stid}`
              }).jstree({
                'core': {
                  'data': data,
                  'href': "leaders.php"
                }
              });


            },
            error: function(err) {
              console.log(err)
            }
          });


        },
        error: function(err) {
          console.log(err);
        },
      });




      $("#choosetimeline").change(function() {

        var period = $("#choosetimeline").val();

        //load default levels

        $.ajax({
          url: 'dbfiles/componentstree.php?timelineid=' + period,
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            console.log(data)
            let treearray = [];
            data.forEach((item) => {
              item.parent = item.parent === null ? "#" : item.parent;
              item.icon = "far fa-list-alt";
            })


            $('#myTree').jstree("destroy").empty();

            $('#myTree').
            on('changed.jstree', function(e, data) {
              const {
                id,
                stid
              } = data.node.original;

              location.href = `leaders.php?compid=${id}&strid=${stid}`
            }).jstree({
              'core': {
                'check_callback': true,
                'data': data,
                'href': "leaders.php"
              }
            });


          },
          error: function(err) {
            console.log(err)
          }
        });
      });
      $("#btnclick").on("click", function(e) {
        window.history.back()
      });

      $("#choosetimeline").on("change", function(e) {

        var id = $("#choosetimeline").val()
        location.href = "index.php?id=" + id;
      });

    });
  </script>
</body>

</html>
<!-- end document-->