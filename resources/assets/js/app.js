
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

$('#indexTabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});

$('.carousel').carousel();

$('[data-toggle=popover]').popover({
    html: true,
    content: function() {
        var _source = $('#' +$(this).attr('data-source'));
        var content = _source.html();

        return content;
    }
});