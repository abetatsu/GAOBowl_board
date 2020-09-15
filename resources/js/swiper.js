// core version + navigation, pagination modules:
// import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';
import Swiper, { Navigation, Pagination } from 'swiper';
// configure Swiper to use modulesSwiper.use([Navigation, Pagination]);


// configure Swiper to use modules
Swiper.use([Navigation, Pagination]);

// init Swiper:
var mySwiper = new Swiper('.swiper-container', {
     // Optional parameters
     loop: true,
   
     // If we need pagination
     pagination: {
       el: '.swiper-pagination',
     },
   
     // Navigation arrows
     navigation: {
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev',
     },
   
     // And if we need scrollbar
     scrollbar: {
       el: '.swiper-scrollbar',
     },
   })
