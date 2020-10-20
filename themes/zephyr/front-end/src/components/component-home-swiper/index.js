import './index.html';
import Swiper,{Pagination} from 'swiper';
import 'swiper/swiper.scss';
export default (container = document) => {
  let homeSwiper = container.querySelector('.component-home-swiper');
  if (!homeSwiper) return;
  Swiper.use([Pagination]);
  let swiper = new Swiper('.home-swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    // breakpoints: {
    //   576:{
    //     slidesPerView:2,
    //     slidesPerColumn:2,
    //     spaceBetween: 40,
    //   },
    //   1024: {
    //     slidesPerView: 3,
    //     slidesPerColumn: 2,
    //     spaceBetween: 76,
    //     noSwiping: true,
    //     allowTouchMove: false,
    //   },
    // }
  });
  
  
};