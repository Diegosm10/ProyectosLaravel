import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function showKilometers() {
        const select = document.getElementById('inputMachine');
        const selectedOption = select.options[select.selectedIndex];
        const kilometers = selectedOption.getAttribute('data-kilometers');

        document.getElementById('kilometers').value = kilometers ?? '';
}

document.getElementById('inputMachine').addEventListener('change', showKilometers);