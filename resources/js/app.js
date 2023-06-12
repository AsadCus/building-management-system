// import './bootstrap';
import Alpine from 'alpinejs';a
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

// import './components/Example';
import '../../public/dist/css/app.css';   
import './view/master/maintenance';
import './view/master/form';
import './view/master/value';
import './view/master/building';
import './view/master/floor';
import './view/master/room';

Alpine.start();