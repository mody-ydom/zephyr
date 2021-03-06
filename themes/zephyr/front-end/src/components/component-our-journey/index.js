import './index.html';
import Swiper, {Pagination,Navigation} from 'swiper';
import 'swiper/swiper.scss';

export default (container = document) => {
  let ourJourney = container.querySelector('.component-our-journey');
  if (!ourJourney) return;
  Swiper.use([Pagination,Navigation]);
  let swiper;
  let init = false;
  
  function swiperMode() {
    let mobile = window.matchMedia('(max-width: 1023.98px)');
    let desktop = window.matchMedia('(min-width: 1024px)');
    
    // Enable (for mobile)
    if(mobile.matches) {
      if (!init) {
        init = true;
        swiper = new Swiper('.our-journey-content', {
          slidesPerView: 1,
          spaceBetween: 50,
          grabCursor: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          // navigation: {
          //   nextEl: '.swiper-button-next',
          //   prevEl: '.swiper-button-prev',
          // },
          breakpoints: {
            767:{
              slidesPerView:2,
              spaceBetween: 40,
            }
          }
        });
      }
    }
    // Disable (for desktop)
    else if(desktop.matches) {
      swiper?.destroy();
      init = false;
    }
  }
  swiperMode();
  window.addEventListener('load',function (){
    swiperMode();
  });
  window.addEventListener('resize', function() {
    swiperMode();
  });
};