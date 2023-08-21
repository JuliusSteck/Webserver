<div id="black" class="invisible"></div>

<header id="header">
  <div class="top container">
    <a href="welcome.php">
      <h2>
        Julius_Steck
      </h2>
    </a>

    <input type="checkbox" id="menu">
    <label for="menu">
        <img src='../icons/icon_menu.svg' class='icon' alt='menu'>
    </label>

    <nav>
      <ul>
        <li><a href="welcome.php" class="underline">Blog</a></li>
        <li><a href="resume.php" class="underline">Über_mich</a></li>
        <li><a href="podcast.php" class="underline">Podcast</a></li>
        <li><a href="shop.php" class="underline">Shop</a></li>
        <li><a href="contact.php" class="underline">Kontakt</a></li>
        <li class="search">
          <input type="checkbox" id="magnifying_glass">
          <label for="magnifying_glass">
            <img src='../icons/icon_search.svg' class='icon_small' alt='search'>
          </label>

          <form id="search-form" action="search.php">
            <div class='text_input'>
              <input type="text" id="search" name="search" required>
              <label for="search" class='floating_label'>Suchen</label>
            </div>
            <button type="submit" id="search-button">suchen</button>
          </form>
        </li>
      </ul>
    </nav>
  </div>
</header>
