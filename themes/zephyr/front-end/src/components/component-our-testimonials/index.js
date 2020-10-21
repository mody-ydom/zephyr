import './index.html';
import Swiper,{Pagination} from 'swiper';
import 'swiper/swiper.scss';

export default (container = document) => {
  let testimonials = container.querySelector('.component-our-testimonials');
  if (!testimonials) return;
  const homeSwiperTitle = container.querySelectorAll('.home-swiper .category-title')
  Swiper.use([Pagination]);
  let swiper = new Swiper('.testimonials', {
    slidesPerView: 1,
    spaceBetween: 30,
    grabCursor: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
};