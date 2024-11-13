/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

import Swiper from 'swiper';
import { Autoplay, EffectFade, Pagination } from 'swiper/modules';

window.Swiper = Swiper;


(function($) {
  $(document).ready(function() {
    function throttle(func, limit) {
      let inThrottle;
      return function() {
          const args = arguments;
          const context = this;
          if (!inThrottle) {
              func.apply(context, args);
              inThrottle = true;
              setTimeout(() => inThrottle = false, limit);
          }
      }
    }
    
    function toggleScrollClass() {
      const scrollThreshold = 40;
      if (window.scrollY > scrollThreshold) {
          document.body.classList.add('scroll');
      } else {
          document.body.classList.remove('scroll');
      }
    }
    
    toggleScrollClass();
    document.addEventListener('scroll', throttle(() => {
      toggleScrollClass();
    }, 20));
    
    
    const mobileNav = document.getElementById('mobile-nav');
    const mobileNavOpenBtn = document.getElementById('mobile-nav-open-btn');
    const mobileNavCloseBtn = document.getElementById('mobile-nav-close-btn');
    
    mobileNavOpenBtn.addEventListener('click', () => {
      mobileNav.classList.add('open');
      document.body.classList.add('overflow-hidden');
    });
    
    mobileNavCloseBtn.addEventListener('click', () => {
      mobileNav.classList.remove('open');
      document.body.classList.remove('overflow-hidden');
    });
    
    // eslint-disable-next-line no-undef
    new Swiper('.swiper.slider', {
      modules: [Autoplay],
      initialSlide: 1,
      slidesPerView: 1,
      spaceBetween: 8,
      breakpoints: {
        480: {
          slidesPerView: 2,
        },
    
        768: {
          slidesPerView: 3,
          spaceBetween: 12,
        },
        1024: {
          slidesPerView: 3,
        },
        1280: {
          slidesPerView: 4,
        },
      }
    });
    
    new Swiper('.hero-banner-slider', {
      modules: [Autoplay, EffectFade, Pagination],
      effect: 'fade',
      pagination: {
        el: '.hero-pagination',
    
      },
      fadeEffect: {
        crossFade: true,
      },
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
      speed: 1000,
      loop: true,
    });
    
    // Fade in/out utility
    function createFadeObserver({ threshold = 0, rootMargin = '-12% 0px -8% 0px' } = {}) {
      return new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
            entry.target.classList.remove('fade-out');
          } else {
            entry.target.classList.add('fade-out');
            entry.target.classList.remove('fade-in');
          }
        });
      }, {
        threshold,
        rootMargin
      });
    }
    
    // Initialize fade observer
    const fadeObserver = createFadeObserver();
    
    // Observe all elements with data-fade attribute
    document.querySelectorAll('[data-fade]').forEach(element => {
      element.classList.add('fade-element');
      fadeObserver.observe(element);
    });
    
    // Add this function before the form handler
    function showToast(message, duration = 5000) {
      const toast = document.querySelector('.toast-notification');
      const toastMessage = toast.querySelector('.toast-message');
      
      toastMessage.textContent = message;
      toast.classList.add('show');
      
      setTimeout(() => {
        toast.classList.remove('show');
      }, duration);
    }
    
    // Update the form handler
    $('form[data-form-id="inquiry-form"]').on('submit', function(e) {
      e.preventDefault();
      
      const $form = $(this);
      const $submitButton = $form.find('button[type="submit"]');
      const $buttonText = $submitButton.find('.button-text');
      const $buttonLoader = $submitButton.find('.button-loader');
      
      // Disable submit button and show loading state
      $submitButton.prop('disabled', true);
      $buttonText.addClass('opacity-50');
      $buttonLoader.removeClass('hidden');
      
      const formData = new FormData(this);
      
      $.ajax({
        url: '/wp-admin/admin-ajax.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            showToast(response.data.message);
            $form[0].reset();
          } else {
            showToast(response.data.message);
          }
        },
        error: function() {
          showToast('An error occurred. Please try again later.');
        },
        complete: function() {
          $submitButton.prop('disabled', false);
          $buttonText.removeClass('opacity-50');
          $buttonLoader.addClass('hidden');
        }
      });
    });
    
  });
})(jQuery);