import './index.html';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import Swiper, {Pagination, EffectFade} from 'swiper';
import 'swiper/swiper.scss';
import 'swiper/components/effect-fade/effect-fade.scss';
import Scrollbar from 'smooth-scrollbar';

Swiper.use([Pagination, EffectFade]);
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
        gsap.to(Array.from(homeSwiperTitle).map(elem => {
          const e = elem.nextElementSibling;
          e.classList.remove('active');
          e.parentElement.classList.remove('active');
          return e;
        }), {height: 0});
        slidesTransitions.in[activeIndex].play(0);
        slidesTransitions.out[previousIndex].play(0);
      },
      transitionStart() {
        gsap.to(Array.from(homeSwiperTitle).map(elem => {
          const e = elem.nextElementSibling;
          e.classList.remove('active');
          e.parentElement.classList.remove('active');
          return e;
        }), {height: 0});
      },
    },
    
  });
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
  const pin = ScrollTrigger.create({
    id: 'home-slider',
    trigger: homeSwiper,
    start: 'center center',
    end: `+=${100 * (swiper.slides.length) * windowHeightFactor}%`,
    pin: true,
    firstScroll: true,
    onToggle(self) {
      bodyScrollBar.updatePluginOptions('dampScroll', {amount: self.isActive ? 1 : 0});
      if (self.isActive) {
        bodyScrollBar.setMomentum(0, 0);
        bodyScrollBar.setPosition(0, self.direction === 1 ? self.start + 1 : self.end - 1);
      }
      setTimeout(() => self.vars.firstScroll = !self.isActive, ignoreTime);
    },
    onUpdate(self) {
      bodyScrollBar.setMomentum(0, 0);
      bodyScrollBar.updatePluginOptions('dampScroll', {amount: 1});
      setTimeout(() => bodyScrollBar.updatePluginOptions('dampScroll', {amount: self.isActive ? 0.999 : 0}), ignoreTime);
      if (ignoreScroll) return;
      ignoreScroll = true;
      setTimeout(() => ignoreScroll = false, ignoreTime);
      const currentSlide = Math.floor(self.progress * swiper.slides.length);
      
      if (self.vars.firstScroll) return;
      const nextSlide = currentSlide + self.direction;
      if (nextSlide < 0) {
        bodyScrollBar.scrollTo(0, self.start - 1);
        setTimeout(((activeSlide) => () => swiper.slideTo(0))(activeSlide), 200);
        activeSlide = 0;
      }
      else if (nextSlide > swiper.slides.length - 1) {
        bodyScrollBar.scrollTo(0, self.end + 1);
        setTimeout(((activeSlide) => () => swiper.slideTo(swiper.slides.length - 1))(activeSlide), 200);
        
        activeSlide = swiper.slides.length - 1;
      }
      else {
        slideTo(nextSlide);
        setTimeout(((activeSlide, nextSlide) => () => swiper.slideTo(nextSlide))(activeSlide, nextSlide), 200);
        activeSlide = nextSlide;
      }
    },
  });
  for (let i = 0; i < dots.length; i++) {
    const dot = dots[i];
    dot.addEventListener('click', () => {
      ignoreScroll = true;
      setTimeout(() => ignoreScroll = false, ignoreTime);
      slideTo(i);
      setTimeout(((nextSlide) => () => swiper.slideTo(nextSlide))(i), 200);
      activeSlide = i;
    });
  }
  
  homeSwiperTitle.forEach((title) => {
    title.addEventListener('click', (e) => {
      ignoreScroll = true;
      bodyScrollBar.updatePluginOptions('dampScroll', {amount: 1});
      let nextSib = title.nextElementSibling;
      
      if (nextSib.classList.contains('active')) {
        gsap.to(nextSib, {height: 0}).then(() => setTimeout(() => {
          bodyScrollBar.updatePluginOptions('dampScroll', {amount: pin.isActive ? 0.999 : 0});
          ignoreScroll = false;
        }, 300));
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
        gsap.to(nextSib, {height: 'auto'}).then(() => setTimeout(() => {
          bodyScrollBar.updatePluginOptions('dampScroll', {amount: pin.isActive ? 0.999 : 0});
          ignoreScroll = false;
        }, 300));
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