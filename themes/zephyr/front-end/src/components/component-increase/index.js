import './index.html';
import Swiper, { Pagination} from 'swiper';

export default (container = document) => {
  const increaseComponent = container.querySelector('.component-increase');
  if(!increaseComponent)return ;
  Swiper.use([Pagination]);
  let swiper;
  let init = false;
  
  function swiperMode() {
    let mobile = window.matchMedia('(min-width: 0px) and (max-width: 1024px)');
    let desktop = window.matchMedia('(min-width: 1024px)');
    
    // Enable (for mobile)
    if(mobile.matches) {
      if (!init) {
        init = true;
        swiper = new Swiper('.increase-container', {
          slidesPerView: 1,
          spaceBetween: 0,
          grabCursor: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          breakpoints: {
            767:{
              slidesPerView:2,
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
  
  window.addEventListener('load',function (){
    swiperMode();
  });
  window.addEventListener('resize', function() {
    swiperMode();
  });
};