<!DOCTYPE html>
<html lang="de">
<head>
    <title>Julius Steck</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icons/icon.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/caption.css">
    <link rel="stylesheet" href="../style/footer.css">
    <script src="../script/header.js"></script>
    <script src="../script/caption.js"></script>

    <style>
      .text_input {
        position: relative;
      }

      .text_input .inputText:focus{

      }

      .text_input .floating-label {
        position: absolute;
        pointer-events: none;
        top: 0px;
        left: 10px;
        transition: 0.2s ease all;

      }

      .text_input input:focus ~ .floating-label,
      .text_input input:not(:focus):valid ~ .floating-label{
        top: -10px;
        left: 30px;
        opacity: 1;
        background-color: var(--background-color);
      }
    </style>
</head>

<body>
  <?php
    include 'header.php';

    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    header("Location: management.php");
    }

    //fix
  ?>

  <section id="caption">
    <div class="container">
      <div class='center'>
        <h1>Hier <span  class="flexible_caption">anmelden</span><span id="cursor" class="cursor">_</span> </h1>
      </div>
    </div>
  </section>

  <section id="login" class="login">
    <div class="container">
      <form id="login-form" action="management.php" method="post" class='center'>
          <div class="text_input">
            <input type="text" required/>
            <label class="floating-label">Your email address</label>
          </div>

      </form>
    </div>
  </section>

  <?php
    include 'footer.php';
   ?>
</body>
</html>
