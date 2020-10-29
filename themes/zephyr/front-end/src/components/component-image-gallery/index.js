import './index.html';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import {getElementsForAnimation} from '../../scripts/functions';

gsap.registerPlugin(ScrollTrigger);

const isAdmin = NODE_ENV_ADMIN;

export default (container = document) => {
  
  const sections = container.querySelectorAll('.component-image-gallery');
  if (!sections.length) return;
  
  resizeAll(sections);
  
  const imageWrappers = getElementsForAnimation(container, '.component-image-gallery .image-wrapper');
  for (let imageWrapper of imageWrappers) {
    
    const background = imageWrapper.querySelector('img.bg');
    const leftImage = imageWrapper.querySelector('img.left');
    const rightImage = imageWrapper.querySelector('img.right');
    const tlOptions = isAdmin ? {} : {
      scrollTrigger: {
        trigger: imageWrapper,
        start: `top ${imageWrapper.classList.contains('pt-0') ? '50' : '80'}%`,
        once: true,
      },
    };
    const imageWrapperTl = gsap.timeline(tlOptions);
    if (imageWrapper.classList.contains('full-width')) {
      imageWrapperTl
        .add(gsap.fromTo(leftImage, {x: '+=50'}, {x: '-=50', duration: 1}), 0)
        .add(gsap.fromTo(rightImage, {x: '-=50'}, {x: '+=50', duration: 1}), 0);
    }
    else {
      if (leftImage) {
        imageWrapperTl.add(gsap.fromTo(leftImage, {y: '+=50'}, {y: '-=50', duration: 1}), 0);
      }
      else {
        imageWrapperTl.add(gsap.fromTo(background, {scale: 1.25}, {scale: 1, duration: 1}), 0);
      }
    }
  }
  
  
  function resizeAll(sections) {
    for (let section of sections) {
      const grid = section.querySelector('.images-grid');
      
      const rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
      const rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
      
      for (let gridItem of grid.children) {
        resizeGridItem(gridItem, rowHeight, rowGap);
      }
    }
  }
  
  function resizeGridItem(item, rowHeight, rowGap) {
    const rowSpan = Math.ceil((item.firstElementChild.getBoundingClientRect().height + rowGap) / (rowHeight + rowGap));
    item.style.gridRowEnd = 'span ' + rowSpan;
  }
  
  window.addEventListener('container-fixed', () => resizeAll(sections));
};