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
  
  
  const imageWrappers = getElementsForAnimation(container, '.component-image-gallery .image-item-container');
  const imageWrapperTl = gsap.timeline();
  const scrollTriggerBatch = new ScrollTrigger.batch(imageWrappers, {
    onEnter(batch) {
      gsap.fromTo(batch, {y: 300, autoAlpha: 0}, {y: 0, duration: .5, autoAlpha: 1,stagger:.3});
      // gsap.fromTo(batch, {scale: 0, autoAlpha: 0}, {scale: 1, duration: 1, autoAlpha: 1,ease:'expo.out',stagger:.3})
    },
    start: 'top 50%',
    once: true,
  });
  gsap.set(imageWrappers,{y:300,autoAlpha:0})
  // gsap.set(imageWrappers,{autoAlpha:0})
  ScrollTrigger.addEventListener('refreshInit', () => gsap.set(imageWrappers,{y:0,autoAlpha:0}));
  for (let imageWrapper of imageWrappers) {
    
    const background = imageWrapper.querySelector('img.bg');
    const leftImage = imageWrapper.querySelector('img.left');
    const rightImage = imageWrapper.querySelector('img.right');
    //
    // if (background.complete) {
    //
    // }
    // else {
    //   background.addEventListener('load', () => {
 
    //   });
    // }
    
    if (rightImage || leftImage) {
      // imageWrapperTl
      //   .add(gsap.fromTo(leftImage, {yPercent:-50, x: '+=50'}, {x: '-=50', duration: 1}), 0)
      //   .add(gsap.fromTo(rightImage, {yPercent:-50, x: '-=50'}, {x: '+=50', duration: 1}), 0);
    }
    else {
      if (leftImage) {
        // imageWrapperTl.add(gsap.fromTo(leftImage, {yPercent:-50,xPercent:-50,x:0,y: '+=50'}, {y: '-=50', duration: 1}), 0);
      }
      else {
        // imageWrapperTl.add(gsap.fromTo(background, {scale: 1.25}, {scale: 1, duration: 1}), 0);
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
  
  function resizeGridItem(item, rowHeight = false, rowGap = false) {
    rowHeight || (rowHeight = parseInt(window.getComputedStyle(item.closest('.images-grid')).getPropertyValue('grid-auto-rows')));
    rowGap || (rowGap = parseInt(window.getComputedStyle(item.closest('.images-grid')).getPropertyValue('grid-row-gap')));
    
    const rowSpan = Math.ceil((item.firstElementChild.getBoundingClientRect().height + rowGap) / (rowHeight + rowGap));
    item.style.gridRowEnd = 'span ' + rowSpan;
  }
  
  window.addEventListener('container-fixed', () => resizeAll(sections));
  
  const images = getElementsForAnimation(container, '.component-image-gallery img');
  
  for (let image of images) {
    if (image.complete) {
      resizeAll(sections);
      // resizeGridItem(image.closest('.grid-item'));
      ScrollTrigger.refresh();
    }
    else {
      image.addEventListener('load', () => {
        resizeAll(sections);
        // resizeGridItem(image.closest('.grid-item'));
        ScrollTrigger.refresh();
      });
    }
  }
  
  
  
  
  
  
  
  
  
  for (const videoComponent of imageWrappers) {
    const playBtn = videoComponent.querySelector('.play-video');
    const video = videoComponent.querySelector('video');
    if(!video) continue;
    playBtn?.addEventListener('click', function () {
      if (playBtn.classList.contains('clicked')) {
        video.pause();
        playBtn.classList.remove('clicked');
      }
      else {
        video.play().then(()=>{console.log('a7a');}).catch(e=>{console.log(e);});
        playBtn.classList.add('clicked');
      }
    });
  }
};