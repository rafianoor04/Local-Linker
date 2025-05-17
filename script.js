document.addEventListener("DOMContentLoaded", () => {
    console.log("Local Service Management System Initialized");
});
document.addEventListener("DOMContentLoaded", () => {
    console.log("Local Service Management System Initialized");

    // Get the user icon and dropdown menu
    const userIcon = document.getElementById("user-icon");
    const dropdownMenu = document.getElementById("dropdown-menu");

    // Toggle dropdown menu visibility on user icon click
    userIcon.addEventListener("click", (event) => {
        // Prevent the click event from propagating to the window click handler
        event.stopPropagation();

        // Toggle the visibility of the dropdown menu
        dropdownMenu.classList.toggle("show");
    });

    // Close dropdown menu if clicked outside
    window.addEventListener("click", (event) => {
        // Check if the click was outside of the user icon and dropdown menu
        if (!event.target.matches('#user-icon') && !event.target.matches('#dropdown-menu') && !event.target.matches('#dropdown-menu a')) {
            dropdownMenu.classList.remove("show");
        }
    });
});
