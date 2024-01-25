document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".search-button").addEventListener("click", function () {
        var searchTerm = document.querySelector(".search-input").value;
        searchTerms(searchTerm);
    });

    function searchTerms(term) {
        var termBoxes = document.querySelectorAll(".term-box");
        termBoxes.forEach(function (box) {
            var termText = box.textContent || box.innerText;
            var regex = new RegExp("(" + term.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&") + ")", "gi");
            var highlightedText = termText.replace(regex, "<span style='background-color: #FFFF00'>$1</span>");
            box.innerHTML = highlightedText;

            if (termText.toLowerCase().includes(term.toLowerCase())) {
                box.style.display = "block";
            } else {
                box.style.display = "none";
            }
        });
    }
});