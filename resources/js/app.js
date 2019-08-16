import Vue from 'vue';
Vue.component('quiz', require('./vue-components/quiz/components/main.vue').default);
Vue.component('finals', require('./vue-components/quiz/components/finals.vue').default);


new Vue({
    el: '#app',
});