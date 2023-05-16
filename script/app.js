document.addEventListener('DOMContentLoaded', () => {

  const navbar = document.getElementById('header');
  const menu = document.getElementById('menu');
  const black = document.getElementById('black');
  const flexible_caption = document.getElementById('flexible_caption');
  const cursor = document.getElementById("cursor");
  const path = window.location.pathname;

  window.addEventListener("scroll", () => {
    if (window.scrollY >= 10) {
      navbar.classList.remove("header_not_scrolled");
      navbar.classList.add("header_scrolled");
    } else {
      navbar.classList.remove("header_scrolled");
      navbar.classList.add("header_not_scrolled");
    }
  });

  menu.addEventListener("change", () => {
    if (menu.checked) {
      black.classList.remove("invisible");
      black.classList.add("visible");
      header.classList.add("inverse");
    } else {
      black.classList.remove("visible");
      black.classList.add("invisible");
      header.classList.remove("inverse");
    }
  });

  let words;

  if (path.includes("/en/")) {
    words =  ["Julius_Steck", "a_Data_Scientist", "creative", "a_Math_Lover", "a_Developer", "seaching"];
  } else if (path.includes("/de/")) {
    words =  ["Julius_Steck", "ein_Data_Scientist", "kreativ", "Mathe_begeistert", "ein_Entwickler", "auf_der_Suche"];
  } else {
    words =  ["Julius_Steck", "a_Data_Scientist", "creative", "a_Math_Lover", "a_Developer", "seaching"];
  }


  let currentIndex = 0;
  let currentWord = '';

  function displayLetters() {
    if (currentIndex < words.length) {
      const word = words[currentIndex];
      currentWord = '';
      let i = 0;

      const interval = setInterval(() => {
        if (i < word.length) {
          currentWord += word[i];
          flexible_caption.innerHTML = currentWord;
          i++;
        } else {
          clearInterval(interval);
          setTimeout(() => {
            removeLetters(word);
          }, 2000); // Delay before removing letters
        }
      }, 150); // Delay between each letter appearance
    } else {
      currentIndex = 0;
      setTimeout(displayLetters, 500); // Delay before restarting from the beginning
    }
  }

  function removeLetters(word) {
    let i = word.length - 1;
    const interval = setInterval(() => {
      if (i >= 0) {
        currentWord = currentWord.slice(0, -1);
        flexible_caption.innerHTML = currentWord;
        i--;
      } else {
        clearInterval(interval);
        currentIndex++;
        setTimeout(displayLetters, 500); // Delay before displaying the next word
      }
    }, 100); // Delay between each letter removal (adjust as desired)
  }

  function blinkCursor() {
    cursor.classList.toggle("cursor");
    setTimeout(blinkCursor, 500);
  }

  blinkCursor();
  displayLetters();
});
