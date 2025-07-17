document.addEventListener("DOMContentLoaded", function () {
    // Adds required class to labels
    document.querySelectorAll("label").forEach((label) => {
        const input = document.querySelector(`#${label.getAttribute("for")}`);
        if (input && input.hasAttribute("required")) {
            label.classList.add("required");
        }
    });

    const toggleButton = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("default-sidebar");
    const mainContent = document.getElementById("main-content");

    let sidebarHidden = false;

    if (toggleButton) {
        toggleButton.addEventListener("click", function () {
            if (sidebarHidden) {
                // Show sidebar
                sidebar.classList.add("sm:translate-x-0");
                mainContent.classList.remove("sm:ml-0");
                mainContent.classList.add("sm:ml-64");
                toggleButton.setAttribute("aria-expanded", "true");
                sidebarHidden = false;
            } else {
                // Hide sidebar
                sidebar.classList.remove("sm:translate-x-0");
                mainContent.classList.remove("sm:ml-64");
                mainContent.classList.add("sm:ml-0");
                toggleButton.setAttribute("aria-expanded", "false");
                sidebarHidden = true;
            }
        });
    }
});
