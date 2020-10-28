import './index.html';
import Swiper, {Pagination} from 'swiper';
import 'swiper/swiper.scss';

export default (container = document) => {
  let aboutUs = container.querySelector('.component-about-us');
  if (!aboutUs) return;
  Swiper.use([Pagination]);
  
  let swiper;
  let init = false;
  
  function swiperMode() {
    let mobile = window.matchMedia('(max-width: 1023.98px)');
    let desktop = window.matchMedia('(min-width: 1024px)');
    
    // Enable (for mobile)
    if(mobile.matches) {
      if (!init) {
        init = true;
        swiper = new Swiper('.about-us-content', {
          slidesPerView: 1,
          spaceBetween: 20,
          grabCursor: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          breakpoints: {
            576:{
              slidesPerView:2,
              spaceBetween: 45,
            }
          }
        });
      }
    }
    
    // Disable (for desktop)
    else if(desktop.matches) {
      swiper.destroy();
      init = false;
    }
  }
  
  /* On Load
   **************************************************************/
  window.addEventListener('load', function() {
    swiperMode();
  });
  
  /* On Resize
   **************************************************************/
  window.addEventListener('resize', function() {
    swiperMode();
  });
  
};