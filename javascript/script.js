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

// eslint-disable-next-line no-undef
const heroSlider = new Swiper('.hero-banner-slider', {
  modules: [Autoplay, EffectFade, Pagination],
  effect: 'fade',
  pagination: {
    el: '.hero-pagination',

  },
  fadeEffect: {
    crossFade: true,
  },
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  speed: 1000,
  loop: true,
});

