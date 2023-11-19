<!DOCTYPE html>
<html lang="de">
<head>
  <title>Julius Steck</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../icons/icon.png">
  <link rel="stylesheet" href="../style/style.css">
  <script src="../script/search.js"></script>
</head>
<body>

<section id="game">
  <div class="container">
    <div>
        <div class="grid-container">
            <button id="start-pause-button">Start</button>
            <label id="score">0</label>
            <?php
                for($i = 0; $i < 100; i++){
                    echo'<div class="grid-item" id="cell-$i"></div>'
                }
            ?>
        </div>
    </div>
  </div>
</section>

</body>
</html>
