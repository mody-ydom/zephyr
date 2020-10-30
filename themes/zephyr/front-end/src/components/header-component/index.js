import './index.html';
import {gsap} from 'gsap';
import Scrollbar from 'smooth-scrollbar';

export default (container = document) => {
  
  const header = document.querySelector('header');
  const bodyScrollBar = Scrollbar.get(document.querySelector('[smooth-scroll-container]'));
  
  if(container.querySelector('main')?.hasAttribute('dark') || container.matches?.('[dark]') ){
    header.querySelector('.header-content').classList.add('dark');
  }
  else {
    header.querySelector('.header-content').classList.remove('dark');
  }
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
  let lastOffsetY = 0;
  bodyScrollBar.addListener(({offset: {y}}) => {
    const deltaY = lastOffsetY - y;
    lastOffsetY = y;
    if (header.classList.contains('freeze')) return;
    const headerRect = header.getBoundingClientRect();
    let headerTop = headerRect.top + deltaY;
    if (headerTop < -headerRect.height)
      headerTop = -headerRect.height;
    if (headerTop > 0)
      headerTop = 0;
    header.style.top = headerTop + 'px';
    
    if (y > headerRect.height && !header.classList.contains('black')) {
      header.classList.add('black');
    }
    if (y <= headerRect.height && header.classList.contains('black')) {
      header.classList.remove('black');
    }
  });
  
};
