<?php
session_start();
include('../../displayerrors.php');
if (!isset($_SESSION['welcomevisited'])) {
  header('Location: welcome.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--<meta charset="UTF-8" />-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Archive :: Home</title>

  <link href="./assets/styles/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/styles/archive.css">
  <link href="./assets/styles/main.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    @keyframes sway {
  0% {
    transform: rotate(8deg);
  }
  50% {
    transform: rotate(-8deg);
  }
  100% {
    transform: rotate(8deg);
  }
}

.object {
  position: absolute;
  animation: sway 2.4s infinite;
  animation-timing-function: ease-in-out;
  -webkit-transform-origin: top;
  -moz-transform-origin: top;
  transform-origin: top;
  left: 0;
  right: 0;
  height: 6%;
  z-index: 999;
  text-transform: uppercase;
}

.object-shape {
  width: 135px;
  height: 135px;
  border-radius: 50%;
  display: block;
  background-color: #2187C7;
  margin: 0 auto;
  position: relative;
  color: #fff;
  text-align: center;
  padding-top: 25px;
  font-weight: 600;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.object-shape span {
  font-size: 22px;
  color:white;
}

.object-rope {
  height: 100%;
  width: 5px;
  background-color: #2187C7;
  content: "";
  display: block;
  margin-left: 50%;
}

.content {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0 auto;
  max-width: 500px;
  padding: 35vh 20px 20px 20px
}

.logo {
  max-width: 300px;
}

p {
  font-family: sans-serif;
  text-align: center;
}

.message {
  margin-top: 40px;
}
  </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="object">
    <div class="object-rope"></div>
    <div class="object-shape">
    Bientot <span class="soon">disponible</span>
    </div>
</div>

<div class="content">
  <p class="message">La section francaise est en construction et sera disponible tres bientot</p>
  <a href="../../welcome.php" class="btn btn-primary">Retournez a la page d'accueil</a>
</div>

</body>

</html>