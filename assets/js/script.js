import $ from 'jquery';
import BlazeSlider from 'blaze-slider'
import 'bootstrap/dist/js/bootstrap.bundle';
import AOS from 'aos';

document.addEventListener('DOMContentLoaded', function() {

    //add animation
    AOS.init({
        easing: 'ease-out-back',
        duration: 2000,
    });

    //add slider 
    const el = document.querySelector('.blaze-slider');

    if(el) {
        new BlazeSlider(el, {
            all: {
            enableAutoplay: true,
            autoplayInterval: 1000,
            transitionDuration: 2000,
            slidesToShow: 4,
            },
            '(max-width: 900px)': {
            slidesToShow: 2,
            },
            '(max-width: 500px)': {
            slidesToShow: 1,
            },
        })
    }

     //Add slider to Testimonials Section
     const slider = document.querySelectorAll('.blaze-slider-testimonials').forEach(slider => {
        new BlazeSlider(slider, {
            all : {
                slidesToShow: 3,
                slideGap: '48px',
            },
            '(max-width: 900px)': {
            slidesToShow: 2,
            },
            '(max-width: 500px)': {
            slidesToShow: 1,
            },

        })
     })

     //Add class to menu burger
     $('.navbar-toggler').on('click', function() {
        $(this).toggleClass('active');
     })

     //Change header color on scroll
     $(window).on('scroll', function(e) {
        if (window.scrollY > 0) {
          $('.header').addClass('scrolled');
        }
          else {
            $('.header').removeClass('scrolled');
          }
      })
});
