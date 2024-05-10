<!DOCTYPE html>
<html lang="de">
<head>
  <title>Julius Steck</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../../icons/icon.png">
  <link rel="stylesheet" href="../../../style/style.css">
  <link rel="stylesheet" href="../../../style/header.css">
  <link rel="stylesheet" href="../../../style/footer.css">
  <script src="../../../script/search.js"></script>
  <script src="../../../script/header.js"></script>
  <link rel="stylesheet" href="snake.css">
  <script src="snake.js"></script>
</head>
<body>

<?php
  include '../../../de/header.php';
?>

<section id="game">
  <div class="container">
    <div class="center">
        <p></p>
        <button id="start-pause-button">Start</button>
        <label id="score">0</label>
        <div class="grid-container">
            <?php
                for($i = 0; $i < 400; $i++){
                    echo"<div class='grid-item' id='$i'></div>";
                }
            ?>
        </div>
    </div>
  </div>
</section>

<?php
  include '../../../de/footer.php';
?>

</body>
</html>
