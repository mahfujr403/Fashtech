
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById('btn');
    const sidebar = document.querySelector('.sidebar');
    const homeContent = document.querySelector('.home_content');

    btn.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        homeContent.classList.toggle('active');
    });
});
