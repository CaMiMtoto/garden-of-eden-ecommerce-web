/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


$(function () {

    $('[data-toggle="tooltip"]').tooltip();

    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();

    $('.scroll').click(function (e) {
        // prevent default action
        e.preventDefault();

        // get id of target div (placed in href attribute of anchor element)
        // and pass it to the scrollToElement function
        // also, use 2000 as an argument for the scroll speed (2 seconds, 2000 milliseconds)
        scrollToElement($(this).attr('href'), 2000);
    });
});

var scrollToElement = function (el, ms) {
    var speed = (ms) ? ms : 600;
    $('html,body').animate({
        scrollTop: $(el).offset().top
    }, speed);
}
