import './index.html';
import {gsap} from 'gsap';
import Swiper,{Pagination} from 'swiper';
import 'swiper/swiper.scss';
export default (container = document) => {
  let homeSwiper = container.querySelector('.component-home-swiper');
  if (!homeSwiper) return;
  const homeSwiperTitle = container.querySelectorAll('.home-swiper .category-title')
  Swiper.use([Pagination]);
  let swiper = new Swiper('.home-swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
  
  homeSwiperTitle.forEach((title) => {
    title.addEventListener('click', (e) => {
      let nextSib = title.nextElementSibling;
      
      if (nextSib.classList.contains('active')) {
        gsap.to(nextSib, {height: 0});
        nextSib.classList.remove('active');
        title.parentElement.classList.remove('active');
      }
      else {
        gsap.to(Array.from(homeSwiperTitle).map(elem => {
          const e = elem.nextElementSibling;
          e.classList.remove('active');
          e.parentElement.classList.remove('active');
          return e;
        }), {height: 0});
        gsap.to(nextSib, {height: 'auto'});
        // setTimeout(function () {
        //   scrollbar.scrollIntoView(title, {
        //     offsetTop: 80,
        //   });
        // }, 400);
        nextSib.classList.add('active');
        title.parentElement.classList.add('active');
      }
    });
  });
  
};