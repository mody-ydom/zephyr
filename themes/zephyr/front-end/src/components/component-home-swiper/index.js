import './index.html';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import Swiper, {Pagination, EffectFade, Navigation,Autoplay} from 'swiper';
import 'swiper/swiper.scss';
import 'swiper/components/effect-fade/effect-fade.scss';
import 'swiper/components/navigation/navigation.scss';
import Scrollbar from 'smooth-scrollbar';

Swiper.use([Pagination, EffectFade, Navigation,Autoplay]);
gsap.registerPlugin(ScrollTrigger);


export default (container = document) => {
  let homeSwiper = container.querySelector('.component-home-swiper');
  if (!homeSwiper) return;
  const homeSwiperTitle = container.querySelectorAll('.home-swiper .category-title');
  const slidesTransitions = {in: {}, out: {}};
  const swiper = new Swiper('.home-swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    effect: 'fade',
    allowTouchMove: false,
    autoplay:false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    
    on: {
      init() {
        const slides = this.slides;
        for (let i = 0; i < slides.length; i++) {
          const
            slide = slides[i],
            image = slide.querySelector('.image-wrapper'),
            title = slide.querySelector('.headline-6'),
            subTitle = slide.querySelector('.sub-title'),
            categories = slide.querySelectorAll('.categories'),
            inTl = gsap.timeline({paused: true, id: `transition in ${i}`}),
            outTl = gsap.timeline({paused: true, id: `transition out ${i}`});
          
          inTl
            .fromTo(image, {xPercent: 100}, {xPercent: 0})
            .fromTo([title, subTitle, ...categories], {yPercent: 50, autoAlpha: 0}, {yPercent: 0, autoAlpha: 1, stagger: .1}, 0);
          
          outTl
            .to(image, {xPercent: 100, duration: 0.1}, 0)
            .to([title, subTitle, ...categories], {yPercent: 50, autoAlpha: 0, duration: 0.1}, 0);
          
          
          slidesTransitions.in[i] = inTl;
          slidesTransitions.out[i] = outTl;
          i === 0 && inTl.play();
        }
      },
      transitionEnd() {
        const {activeIndex, previousIndex} = this;
        // if(activeSlide === previousIndex)return;
        if (window.matchMedia('(max-width:767.98px)').matches) {
          gsap.to(Array.from(homeSwiperTitle).map(elem => {
            const e = elem.nextElementSibling;
            e.classList.remove('active');
            e.parentElement.classList.remove('active');
            return e;
          }), {height: 0});
        }
        else {
          gsap.to(Array.from(homeSwiperTitle), {height: 'auto'});
        }
        slidesTransitions.in[activeIndex].play(0);
        slidesTransitions.out[previousIndex].play(0);
      },
      transitionStart() {
        if (window.matchMedia('(max-width:767.98px)').matches) {
          gsap.to(Array.from(homeSwiperTitle).map(elem => {
            const e = elem.nextElementSibling;
            e.classList.remove('active');
            e.parentElement.classList.remove('active');
            return e;
          }), {height: 0});
        }
        else {
          gsap.to(Array.from(homeSwiperTitle), {height: 'auto'});
        }
      },
    },
    
  });
  
  new ScrollTrigger.create({
    trigger:homeSwiper,
    start:'top 50%',
    end:'bottom 80%',
    onToggle(self){
      const {isActive} = self;
      isActive||window.innerWidth<992?swiper.autoplay.stop():swiper.autoplay.start();
    }
  })
  const dots = swiper.pagination.bullets;
  const windowHeightFactor = 0.5;
  let activeSlide = 0;
  let ignoreScroll = false;
  const ignoreTime = 1000;
  const bodyScrollBar = Scrollbar.get(document.querySelector('[smooth-scroll-container]'));
  const slideTo = index => {
    const sectionStart = homeSwiper.parentElement.getBoundingClientRect().top + bodyScrollBar.scrollTop - (window.innerHeight - homeSwiper.getBoundingClientRect().height) / 2;
    const slideHeight = window.innerHeight * windowHeightFactor;
    bodyScrollBar.setPosition(0, sectionStart + slideHeight * (+index + 0.5));
  };
  
  homeSwiperTitle.forEach((title) => {
    title.addEventListener('click', (e) => {
      if (window.matchMedia('(max-width:767.98px)').matches) {
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
          nextSib.classList.add('active');
          title.parentElement.classList.add('active');
        }
      }
    });
  });
  
};