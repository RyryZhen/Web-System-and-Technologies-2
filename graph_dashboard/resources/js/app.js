import './bootstrap';

import Alpine from 'alpinejs';
import Chart from 'chart.js/auto'; // <--- Add this

window.Alpine = Alpine;
window.Chart = Chart; // <--- Add this to make it globally available

Alpine.start();