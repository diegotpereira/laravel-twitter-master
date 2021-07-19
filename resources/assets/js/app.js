import Vue from 'vue'


require('./bootstrap');

Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('timeline-component', require('./components/TimelineComponent.vue').default);

const app = new Vue({
    el: '#app'
});
