import './index.html';
import Swiper, {Pagination} from 'swiper';
import 'swiper/swiper.scss';

export default (container = document) => {
  let ourJourney = container.querySelector('.component-our-journey');
  if (!ourJourney) return;
  Swiper.use([Pagination]);
  let swiper2 = Swiper;
  let init = false;
  
  function swiperMode() {
    let mobile = window.matchMedia('(min-width: 0px) and (max-width: 1024px)');
    let desktop = window.matchMedia('(min-width: 1024px)');
    
    // Enable (for mobile)
    if(mobile.matches) {
      if (!init) {
        init = true;
        swiper2 = new Swiper('.our-journey-content', {
          slidesPerView: 2,
          spaceBetween: 50,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          breakpoints: {
            576:{
              slidesPerView:2,
              spaceBetween: 40,
            }
          }
        });
      }
    }
    // Disable (for desktop)
    else if(desktop.matches) {
      swiper2.destroy();
      init = false;
    }
  }
  
  window.addEventListener('load',function (){
    swiperMode();
  });
  window.addEventListener('resize', function() {
    swiperMode();
  });
};