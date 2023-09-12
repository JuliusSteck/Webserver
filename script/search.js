document.addEventListener("DOMContentLoaded", function() {
    const search = document.getElementById("search");
    const suggestionList = document.getElementById("suggestionList");

    search.addEventListener("keyup", function() {
        const searchTerm = search.value;
        suggestionList.innerHTML = "";

        if (searchTerm.trim() !== "") {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", `../system/search.php?query=${encodeURIComponent(searchTerm)}`, true);

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