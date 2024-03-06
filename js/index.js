document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const sideMenu = document.getElementById('side-menu');

    menuToggle.addEventListener('click', () => {
        sideMenu.classList.toggle('active'); // Переключаем класс для отображения/скрытия меню
        menuToggle.classList.toggle('active'); // Переключаем класс для анимации палочек
        const bars = document.querySelectorAll('.bar');
        bars.forEach(bar => {
            bar.classList.toggle('active'); // Переключаем класс для анимации палочек в крестик
        });
    });
});