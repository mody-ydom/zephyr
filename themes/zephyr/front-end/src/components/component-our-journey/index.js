import './index.html';
import Swiper, {Pagination} from 'swiper';

export default (container = document) => {
  let ourJourney = container.querySelector('.component-our-journey');
  if (!ourJourney) return;
  Swiper.use([Pagination]);
  let swiper2 = Swiper;
  let init = false;
  swiper2 = new Swiper('.swiper-container', {
    slidesPerView: 1,
    slidesPerColumn: 1,
    slidesPerColumnFill: "row",
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      576:{
        slidesPerView:2,
        slidesPerColumn:3,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        slidesPerColumn: 3,
        spaceBetween: 40
      },
    }
  });
  
  function swiperMode() {
    let mobile = window.matchMedia('(min-width: 0px) and (max-width: 767px)');
    let tablet = window.matchMedia('(min-width: 769px) and (max-width: 1024px)');
    let desktop = window.matchMedia('(min-width: 1024px)');
    
    // Enable (for mobile)
    if(mobile.matches) {
      if (!init) {
        init = true;
        swiper2 = new Swiper('.swiper-container', {
          slidesPerView: 1,
          slidesPerColumn: 1,
          slidesPerColumnFill: "row",
          spaceBetween: 30,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          breakpoints: {
            576:{
              slidesPerView:2,
              slidesPerColumn:1,
              spaceBetween: 40,
            },
            1024: {
              slidesPerView: 3,
              slidesPerColumn: 2,
              spaceBetween: 76
            },
          }
        });
      }
      
    }
    
    // Disable (for tablet)
    else if(tablet.matches) {
      swiper.destroy();
      init = false;
    }
    
    // Disable (for desktop)
    else if(desktop.matches) {
      swiper.destroy();
      init = false;
    }
  }
  
  // window.addEventListener('load',function (){
  //   swiperMode();
  // });
  // window.addEventListener('resize', function() {
  //   swiperMode();
  // });
};