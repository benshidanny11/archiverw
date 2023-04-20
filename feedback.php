<?php
session_start();
if (!isset($_SESSION['welcomevisited'])) {
    header('Location: welcome.php');
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
    <link href="./assets/styles/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/styles/archive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./assets/styles/main.css" rel="stylesheet" />
</head>

<body>

    <?php include_once("header.php"); ?>

    <!-- <div class="content-wrapper"> -->
    <div class="container">
        <div class="col-md-12 pt-5">
            <div class="card cardmod">
                <div class="card-header d-flex">
                    <h5 class="card-title col-9" id="cardtitle">Duhe igitekerezo cyangwa inyunganizi</h5>
                </div>

                <div class="alert alert-light martop" role="alert">

                    <form action="feedbackaction.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="advicetitle">Amazina yombi</label>
                            <input type="text" class="form-control txt"  placeholder="Injiza amazina yawe" name="name" required/>
                        </div>
                        <div class="form-group">
                            <label for="advicetitle">Email address</label>
                            <input type="email" class="form-control txt" placeholder="Injiza email address yawe" name="email" required/>
                        </div>
                        <div class="form-group">
                            <label for="advicetitle">Inomero ya telephone</label>
                            <input type="tel" class="form-control txt" placeholder="Injiza numero ya telephone yawe" name="phonenumber" required/>
                        </div>
                        <div class="form-group">
                            <label for="advicetitle">Igitekerezo</label>
                            <textarea class="form-control" placeholder="Andika igitekerezo cyawe" name="feedback" required>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="advicetitle">Document (optional)</label>
                            <input type="file" class="form-control " placeholder="Hitamo document" name="document" />
                        </div>
                      
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary" data-dismiss="modal" href="index.php">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary" name="submit" value="" ><i class="fas fa-comment-dots"></i> Ohereza igitekezo</button>
                        </div>
                    </form>
                </div>



            </div>



        </div>


    </div>
    <!-- </div> -->

    <?php
    require_once("footer.php");
    ?>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script type="text/javascript">
        $("#btnback").on("click", function(e) {
            window.history.back();
        });
    </script>
</body>
</body>

</html>