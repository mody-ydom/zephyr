import './index.html';
import {gsap} from 'gsap';
import Scrollbar from 'smooth-scrollbar';

export default (container = document) => {
  // let headerContent = container.querySelector('.header-content');
  // if (!headerContent) return;
  //
  // let burgerMenu = container.querySelector('.menu'),
  //   crossMenu = container.querySelector('.cross'),
  //   links = container.querySelector('.links');
  // if (!burgerMenu) return;
  //
  // burgerMenu.addEventListener('click', function () {
  //   burgerMenu.classList.add('active');
  //   crossMenu.classList.add('active');
  //   links.classList.add('active');
  // });
  //
  // crossMenu.addEventListener('click', function () {
  //   crossMenu.classList.remove('active');
  //   burgerMenu.classList.remove('active');
  //   links.classList.remove('active');
  // });
  //
  // window.addEventListener('scroll', function () {
  //   if (this.scrollY >= 100) {
  //     console.log('>200');
  //     headerContent.parentElement.parentElement.classList.add('active');
  //   }
  //   else {
  //     headerContent.parentElement.parentElement.classList.remove('active');
  //   }
  // });
  
  const header = document.querySelector('header');
  const burgerMenu = container.querySelector('#burger-menu'),
    menu = container.querySelector('.links');
  if (!burgerMenu) return;
  const burgerTl = gsap.timeline({paused: true});
  const burgerSpans = burgerMenu.querySelectorAll('span');
  const menuLinks = header.querySelectorAll('a.small-link');
  const scrollbar = Scrollbar.get(document.querySelector('[smooth-scroll-container]'));
  
  gsap.set(burgerSpans, {transformOrigin: 'center'});
  burgerTl
    .to(burgerSpans, {yPercent: gsap.utils.wrap([266.666667, 0, -266.666667]), duration: 0.35})
    .set(burgerSpans, {autoAlpha: gsap.utils.wrap([1, 0, 1])})
    .to(burgerSpans, {rotation: gsap.utils.wrap([45, 0, -45])})
    .set(burgerSpans, {rotation: gsap.utils.wrap([45, 0, 135])});
  
  burgerMenu.addEventListener('click', function () {
    if (burgerMenu.classList.contains('active')) {
      burgerMenu.classList.remove('active');
      menu.classList.remove('active');
      burgerTl.reverse();
    }
    else {
      burgerMenu.classList.add('active');
      menu.classList.add('active');
      burgerTl.play();
      gsap.fromTo(menu.querySelectorAll('.small-link'), {y: 30, autoAlpha: 0}, {y: 0, autoAlpha: 1, stagger: .1, duration: .5, delay: .5});
    }
  });
  
  for (const menuLink of menuLinks) {
    menuLink.addEventListener('click', function () {
      burgerMenu.classList.remove('active');
      menu.classList.remove('active');
      burgerTl.reverse();
    });
  }
  
};
