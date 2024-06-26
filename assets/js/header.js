document.addEventListener('DOMContentLoaded', function () {
    const body = document.querySelector("body"),
          nav = document.querySelector("nav"),
          modeToggle = document.querySelector(".dark-light"),
          searchToggle = document.querySelector(".searchToggle"),
          sidebarOpen = document.querySelector(".sidebarOpen"),
          siderbarClose = document.querySelector(".siderbarClose");

    // Get mode from local storage
    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark-mode") {
        body.classList.add("dark");
    }

    // Toggle dark and light mode
    modeToggle.addEventListener("click", () => {
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        if (!body.classList.contains("dark")) {
            localStorage.setItem("mode", "light-mode");
        } else {
            localStorage.setItem("mode", "dark-mode");
        }
    });

    // // Toggle search box
    // searchToggle.addEventListener("click", () => {
    //     searchToggle.classList.toggle("active");
    // });

    // Toggle sidebar
    sidebarOpen.addEventListener("click", () => {
        nav.classList.add("active");
    });
    // Close sidebar
    body.addEventListener("click", e => {
        let clickedElm = e.target;
        
        if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu") && !clickedElm.closest('.menu')) {
            nav.classList.remove("active");
        }
    });
});
