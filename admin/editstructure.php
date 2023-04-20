<?php

session_start();
if (!isset($_SESSION['uname'])) {
    header('location: ./../login.php');
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
    <!-- <link href="jhttps://cdn.jsdelivr.net/npm/jquery-editable-select@2.2.5/dist/jquery-editable-select.min.css" rel="stylesheet"> -->

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
                        <li>
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-table"></i>Admnistrative levels</a>
                        </li>
                        <li>
                            <a href="#"> <i class="far fa-clock"></i>Time lines</a>
                        </li>
                        <li class="active">
                            <a href="structures.php">
                                <i class="fas fa-chart-bar"></i>Structures</a>
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
                            <a href="books.php"><i class="fas fa-users-cog"></i>Users</a>
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
                                    <a class="au-btn au-btn-icon au-btn--blue" href="structures.php">
                                        <i class="fas fa-arrow-left"></i>Back
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Edit admnistrative structure</div>
                                    <div class="card-body">
                                        <input type="text" hidden name="" />
                                        <form action='editstructreaction.php?strid=<?php echo $_GET['id'] ?>' method="post">

                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Structure name</label>
                                                <input type="text" id="cc-pament" name="strname" class="form-control" placeholder="Enter structure name" required />

                                            </div>

                                            <div>
                                                <button id="payment-button" name="submit" type="submit" class="btn btn-primary btn-large btn-block">
                                                    Add structure
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <hr />


                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>
                                        Copyright © <script>
                                            document.write(new Date().getFullYear());
                                        </script> Archive. All rights reserved
                                    </p>
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
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-editable-select@2.2.5/dist/jquery-editable-select.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajax({
                url: "dbfiles/structuresforadd.php",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    var parentStructreSelect = document.getElementById("parentlevelstructre");

                    data.map((strucure) => {
                        var option = document.createElement("option");
                        option.value = strucure.id;
                        option.innerHTML = strucure.name;

                        parentStructreSelect.appendChild(option);


                    })

                },
                error: function(err) {
                    console.log(err);
                },
            });

            $.ajax({
                url: "dbfiles/alltimelines.php",
                method: "GET",
                dataType: "json",
                success: function(data) {

                    $.each(data, (index, item) => {
                        var option = document.createElement("option");
                        option.value = item.id;
                        option.innerHTML = `From ${item.from} to ${item.to}`;

                        $("#timeline").append(option);
                    })

                },
                error: function(err) {
                    console.log(err);
                },
            });



        });
    </script>
</body>

</html>
<!-- end document-->