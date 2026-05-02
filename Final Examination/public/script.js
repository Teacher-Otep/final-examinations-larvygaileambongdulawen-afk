// Function to show selected section
function showSection(sectionID) {
    const sections = document.querySelectorAll('.content, .homecontent');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    const activeSection = document.getElementById(sectionID);
    if (activeSection) {
        activeSection.style.display = 'block';
    }
}

// Function to show welcome message when logo is clicked
function showWelcomeMessage() {
    // Hide all content sections
    const sections = document.querySelectorAll('.content');
    sections.forEach(section => section.style.display = 'none');

    // Show the home section with the welcome message
    const home = document.getElementById('home');
    home.style.display = 'block';
    home.innerHTML = `
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    `;
}

// Logo mouse event: trigger welcome message
document.getElementById('logo').addEventListener('click', showWelcomeMessage);

// Clear Fields button
document.getElementById('clrbtn').addEventListener('click', () => {
    const inputs = document.querySelectorAll('.field');
    inputs.forEach(input => input.value = '');
});

// Success toast for Insert
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'success') {
        const toast = document.getElementById('success-toast');
        toast.classList.remove('toast-hidden');
        
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.classList.add('toast-hidden'), 500);
        }, 3000);

        window.history.replaceState({}, document.title, window.location.pathname);
    }
};
