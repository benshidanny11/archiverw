<?php
session_start();
if (!isset($_SESSION['welcomevisited'])) {
  header('Location: welcome.php');
}


require("./dbfiles/connect.php");
require("./displayerrors.php");
$sql = "SELECT * FROM `time_lines` ORDER BY time_lines.from ASC";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Archive :: Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="./assets/styles/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/styles/archive.css">
  <link href="./assets/styles/main.css" rel="stylesheet" />
</head>

<body class="hold-transition layout-top-nav">
  <?php include_once("header.php"); ?>

  <div class="martop"></div>
  <div class="container">
    <div class="col-md-12 pt-5">
      <div class="card cardmod">
        <!-- Time line section -->
        <div class="row">

          <div class="list-group col-12">
            <div class="alert alert-light text-center" role="alert">
              <h3>Iriburiro</h3>
              <p>Mu gihe u Rwanda rwasubiranaga ubwigenge ku itariki ya 1 Nyakanga 1962 rwari rufite inzego
                z’ibanze zari zigizwe na perefegitura icumi zasimbuye teritwari n’amakomini 229 yari yaturutse
                ku ihuzwa rya susheferi 559 n’ibyitwaga centres extra-coutumiers et circonscriptions urbaines 1 .
                Izo nzego zashyizweho n’itegeko ry’ubwami bw’ububiligi ry’agateganyo (décret royal
                intérimaire) ryo kuwa 25 Ugushyingo 1959 mu rwego rwo gutegura ubwigenge bw’intara y’u
                Rwanda.</p>
              <a href="descdetails.php" class="btn btn-primary" style="text-decoration: none;">Soma birambuye</a>
            </div>
            <button type="button" class="list-group-item list-group-item-action alert-light" aria-current="true">
            Reba uko inzego z'ibanze zagiye zihinduka kuva 1960 kugera 2020, n'uko abayobozi bagiye basimburana. 
            </button>
            <?php


            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '
              <a href="timeline.php?id=' . $row['id'] . '&from=' . $row['from'] . '&to=' . $row['to'] . '" class="list-group-item list-group-item-action">' . $row['name'] . '</a>';
              }
            }

            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once("footer.php");
  ?>

  <script src="./assets/js/jquery-1.11.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>