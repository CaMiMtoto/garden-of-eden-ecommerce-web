try {
    window.$=require('jquery');
    window.jQuery=require('jquery');
    require('bootstrap/dist/js/bootstrap.min');
    window.lozad = require('lozad');

    window.slick=require('slick-carousel/slick/slick.min');
    require('../../public/js/nouislider.min.js');
    require('../../public/js/jquery.zoom.min.js');
    require('../../public/js/main.js');
} catch (e) {

}


// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
