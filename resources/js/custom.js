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

    // ===================== Tailwind Modal for Dynamic Content =====================
    document.addEventListener("click", function (e) {
        const target = e.target.closest("[data-modal-popup='true']");
        if (!target) return;

        e.preventDefault();

        let link = target.dataset.link;
        let modalSize = target.dataset.modalSize;
        let modal = document.getElementById("modalTemplate");
        let modalContent = document.getElementById("modalContent");

        // Reset modal size
        modalContent.className = "relative w-full max-h-full"; // reset
        if (modalSize === "modal-sm") {
            modalContent.classList.add("max-w-md");
        } else if (modalSize === "modal-lg") {
            modalContent.classList.add("max-w-3xl");
        } else if (modalSize === "modal-xl") {
            modalContent.classList.add("max-w-5xl");
        } else {
            modalContent.classList.add("max-w-2xl"); // default
        }

        // Fetch content via AJAX
        fetch(link)
            .then((res) => {
                if (!res.ok) throw new Error("Network response was not ok");
                return res.text();
            })
            .then((html) => {
                modalContent.innerHTML = html;
                modal.classList.remove("hidden");
                modal.classList.add("flex"); // show as flex for centering
            })
            .catch(() => {
                alert("An error occurred while loading the modal.");
            });
    });

    function closeModal() {
        const modal = document.getElementById("modalTemplate");
        if (document.activeElement && modal.contains(document.activeElement)) {
            document.activeElement.blur();
        }
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    document.addEventListener("click", function (e) {
        const modal = document.getElementById("modalTemplate");

        // Handles [data-modal-close] from AJAX-loaded content
        if (e.target.closest("[data-modal-close]")) {
            closeModal();
        }

        // Close on backdrop click
        if (e.target === modal) {
            closeModal();
        }
    });

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            closeModal();
        }
    });
});
