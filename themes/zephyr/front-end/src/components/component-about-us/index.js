import './index.html';
import Swiper, {Pagination} from 'swiper';
import 'swiper/swiper.scss';

export default (container = document) => {
  let aboutUs = container.querySelector('.component-about-us');
  if (!aboutUs) return;
  Swiper.use([Pagination]);
  let swiper = new Swiper('.about-us-content', {
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
        slidesPerColumn:2,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 3,
        slidesPerColumn: 2,
        spaceBetween: 76,
        noSwiping: true,
        allowTouchMove: false,
      },
    }
  });
  

  
};