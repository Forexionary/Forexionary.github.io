document.addEventListener("DOMContentLoaded", function() {
    // Get the current page URL or use the hash value
    var currentURL = window.location.href;
    var currentPage = currentURL.substring(currentURL.lastIndexOf('/') + 1);

    // Find the navigation link corresponding to the current page and add the 'active' class
    var webPages = document.querySelectorAll(".web-page");
    webPages.forEach(function(page) {
        if (page.getAttribute("href") === currentPage) {
            page.classList.add("active");
        }
    });
});
