document.addEventListener('DOMContentLoaded', () => {

  const flexible_caption = document.getElementById('flexible_caption');
  const cursor = document.getElementById("cursor");
  const path = window.location.pathname;

  let words;

  if (path.includes("/en/")) {
    words =  ["Julius_Steck", "a_Data_Scientist", "creative", "a_Math_Lover", "a_Developer"];
  } else if (path.includes("/de/")) {
    words =  ["Julius_Steck", "ein_Data_Scientist", "kreativ", "Mathe_begeistert", "ein_Entwickler"];
  } else {
    words =  ["Julius_Steck", "a_Data_Scientist", "creative", "a_Math_Lover", "a_Developer", "seaching"];
  }

  let currentIndex = 0;

  function displayLetters() {
    if(flexible_caption) {
      if (currentIndex < words.length) {
        const word = words[currentIndex];
        let currentWord = '';
        let i = 0;
        const interval = setInterval(() => {
          if (i < word.length) {
            currentWord += word[i];
            flexible_caption.innerHTML = currentWord;
            i++;
          } else {
            clearInterval(interval);
            setTimeout(() => {
              let j = currentWord.length - 1;
              const interval2 = setInterval(() => {
                if (j >= 0) {
                  currentWord = currentWord.slice(0, -1);
                  flexible_caption.innerHTML = currentWord;
                  j--;
                } else {
                  clearInterval(interval2);
                  currentIndex++;
                  setTimeout(displayLetters, 500); // Delay before displaying the next word
                }
              }, 100); // Delay between each letter removal
            }, 2000); // Delay before removing letters
          }
        }, 150); // Delay between each letter appearance
      } else {
        currentIndex = 0;
        setTimeout(displayLetters, 500); // Delay before restarting from the beginning
      }
    }
  }

  function blinkCursor() {
    cursor.classList.toggle("cursor");
    setTimeout(blinkCursor, 500);
  }

  blinkCursor();
  displayLetters();
});
