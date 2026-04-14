import 'virtual:svg-icons-register';

// Функция для обновления информации о размерах блока .grid
function updateGridInfo() {
    const grid = document.querySelector('.grid');
    const info = document.querySelector('.info');

    if (grid && info) {
        const gridWidth = grid.offsetWidth;
        const remValue = gridWidth / parseFloat(getComputedStyle(document.documentElement).fontSize);
        const baseFontSize = parseFloat(getComputedStyle(document.querySelector('.body')).fontSize);

        info.innerHTML = `<div>Ширина .grid: ${gridWidth}px</div><div>Ширина .grid: ${remValue.toFixed(2)}rem</div><div>Базовый шрифт: ${baseFontSize}px</div><div>Базовый шрифт: 1rem</div>`;
    }
}

// Обновляем информацию при загрузке страницы и при изменении размера окна
window.addEventListener('load', updateGridInfo);
window.addEventListener('resize', updateGridInfo);
