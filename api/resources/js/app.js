require('./bootstrap');

window.Vue = require('vue');

Vue.component('file-component', require('./components/FileuploadComponent.vue').default);

window.onload = function () {
    const app = new Vue({
        el: '#app'
    });
};

