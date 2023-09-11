document.addEventListener("DOMContentLoaded", function() {
    const search = document.getElementById("search");
    const suggestionList = document.getElementById("suggestionList");

    searchInput.addEventListener("keyup", function() {
        const searchTerm = search.value;
        suggestionList.innerHTML = "";

        if (searchTerm.trim() !== "") {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", `search.php?query=${encodeURIComponent(searchTerm)}`, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const suggestions = JSON.parse(xhr.responseText);

                    suggestions.forEach(function (suggestion) {
                        const li = document.createElement("li");
                        const link = document.createElement("a");
                        link.href = "search.php?search=" + suggestion;
                        link.textContent = suggestion;
                        li.appendChild(link);
                        suggestionList.appendChild(li);
                      });
                }
            };

            xhr.send();
        }
    });
});


// const suggestions = [
//   { text: "Suggestion 1", id: "suggestion-1" },
//   { text: "Suggestion 2", id: "suggestion-2" },
//   { text: "Suggestion 3", id: "suggestion-3" },
// ];