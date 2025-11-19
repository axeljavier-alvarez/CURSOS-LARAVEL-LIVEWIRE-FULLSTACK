import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// ✅ Agrega esto para habilitar Alpine + Livewire
import Alpine from 'alpinejs';
window.Alpine = Alpine;

// Si usas Livewire v3, ya no necesitas importarlo manualmente,
// solo inicializa Alpine antes de que Livewire lo detecte.
Alpine.start();
