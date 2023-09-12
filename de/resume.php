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
  <link rel="stylesheet" href="../style/resume.css">
  <link rel="stylesheet" href="../style/footer.css">
  <script src="../script/header.js"></script>
  <script src="../script/caption.js"></script>
  <script src="../script/popup.js"></script>
  <script src="../script/search.js"></script>
</head>

<body>

  <?php
    include 'header.php';
    require_once '../database_connection.php';
    require_once '../session.php';
    require_once '../system/database_methods.php';
  
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
      echo "
      <div id='popup' class='popup'>
        <h3>{$_SESSION['message']}</h3>
        <input type='checkbox' id='close'>
        <label for='close'>
          <img src='../icons/icon_close.svg' class='icon' alt='close'>
        </label>
      </div>";
    }

    require_once '../close_database_connection.php';
  ?>

  <noscript>
    <div class='noscript'>
      <div>
        <h2> JavaScript muss für die Nutzung der seite aktiviert sein.</h2>
      </div>
    </div>
  </noscript>

  <section id="caption">
    <div class="container">
        <h1>Ich bin <span  class="flexible_caption">Julius Steck</span><span id="cursor" class="cursor">_</span> </h1>
    </div>

  </section>

  <section id="resume">
    <div class="container">
      <div class="devider">
        <div class="line"></div>
        <h3> Arbeitserfahrung</h3>
        <div class="line"></div>
      </div>

      <div class='chapter'>
        <div class="position">
          <h4>Junior Consultant</h4>
          <p> Februar 2023 - heute </p>
          <a href="https://www.achtzig20.de"> 8020.eco</a>
          <ul>
            <li>Volkswagen - AG EG-3 Data Governance</li>
            <li>Audi AG -  PX-I Company IT NEV CO China</li>
            <li>Volkswagen AG - EKEK-4 Sound Design</li>
          </ul>
        </div>

        <div class="position">
          <h4>Dualer Student</h4>
          <p> September 2019 - Juli 2022</p>
          <a href="https://www.audi.de"> Audi AG</a>
          <ul>
            <li>I/VX-2 Website und Ponfigurator</li>
            <li>I/PX-I Projektmanagement PPE Copmany IT NEV CO China</li>
            <li>I/GG-S2 Unternehmensstrategie Digitalisierung</li>
            <li>I/BS-N Digitalisierung der Beschaffung und Data Analytics</li>
          </ul>
        </div>
      </div>

      <div class="devider">
        <div class="line"></div>
        <h3> Ausbildung</h3>
        <div class="line"></div>
      </div>

      <div class='chapter'>
        <div class="position">
          <h4>Data Science</h4>
          <p> Februar 2023 - heute </p>
          <a href="https://www.thi.de"> Technische Hochschule Ingolstadt</a>
          <ul>
            <li>Notenschnitt: 1.0</li>
          </ul>
        </div>

        <div class="position">
          <h4>Wirtschaftsinformatik</h4>
          <p> September 2019 - Juli 2022</p>
          <a href="https://www.thi.de">Technische Hochschule Ingolstadt</a>
          <ul>
            <li>Notenschnitt: 2.0</li>
          </ul>
        </div>

      <!--  <div class="position">
          <h4>Mathematik</h4>
          <p> September 2023 - </p>
          <a href="https://www.tum.de"> Technische Universität München</a>
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div> -->
      </div>

      <div class="devider">
        <div class="line"></div>
        <h3>Projekte</h3>
        <div class="line"></div>
      </div>

      <div class='chapter'>
        <div class="position">
          <h4>Entwicklung Respect@THI App</h4>
          <p> September 2020 - Mai 2022 </p>
          <a href="https://www.sueddeutsche.de/bayern/ingolstadt-diskriminierung-app-hochschule-thi-1.5585689"> Süddeutsche Zeitung</a>
          <ul>
            <li>Design der Funktionen</li>
            <li>Programmierung der Nutzeroberfläche</li>
            <li>Abstimmung mit Stakeholdern</li>
          </ul>
        </div>
      </div>

      <div class="devider">
        <div class="line"></div>
        <h3>Fähigkeiten</h3>
        <div class="line"></div>
      </div>

      <div class='chapter'>
        <div class="position">
          <h4>Sprachen</h4>
          <ul>
            <li>Deutsch - Muttersprache</li>
            <li>Englisch -  C1/C2</li>
            <li>Französisch - B2</li>
            <li>Chinesisch - HSK2</li>
          </ul>
        </div>

        <div class="position">
          <h4>Programmierung</h4>
          <ul>
            <li>Python</li>
            <li>Mojo</li>
            <li>Java</li>
            <li>JavaScript</li>
            <li>SQL</li>
            <li>HTML</li>
            <li>PHP</li>
            <li>CSS</li>
          </ul>
        </div>
      </div>

      <div class="devider">
        <div class="line"></div>
        <h3>Freizeit</h3>
        <div class="line"></div>
      </div>

      <div class='chapter'>
        <div class="position">
          <h4>Hobbies</h4>
          <ul>
            <li>Kraftsport</li>
            <li>Segeln</li>
            <li>Klavier</li>
          </ul>
        </div>

        <div class="position">
          <h4>Engagement</h4>
          <ul>
            <li>Jugendarbeit Evangelische Gemeinde Brunnenreuth</li>
            <li>Neuland Ingolstadt e.V.</li>
            <li>Students' Life e.V.</li>
            <li>Studentischer Börsenverein e.V.</li>
            <li>Diverses politisches Engagement</li>
          </ul>
        </div>
      </div>

      <br>
      <a href="../files/Julius_Steck_Lebenslauf_01.07.2023.pdf">Lebenslauf Download</a>
      
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>
</body>
</html>
