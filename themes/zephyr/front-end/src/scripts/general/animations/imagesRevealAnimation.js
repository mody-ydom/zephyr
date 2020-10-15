import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import {wrap, unwrap, debounce} from '../../functions';
import getElementsForAnimation from '../../functions/getElementsForAnimation';


gsap.registerPlugin(ScrollTrigger);


export default function imageRevealAnimation(container = document, selector = '[data-reveal-direction]', directionData = 'revealDirection') {
  const images = getElementsForAnimation(container, selector),
    imagesWrapper = [];
  if (!images) return;
  const wrappers = document.createElement('DIV');
  wrappers.innerHTML = `
  <div class="image-reveal--left"></div>
  <div class="image-reveal--right"></div>
  <div class="image-reveal--top"></div>
  <div class="image-reveal--bottom"></div>
  <div class="image-reveal--parent"></div>
  `;
  if (!document.getElementById('image-reveal-style')) {
    const styles = document.createElement('STYLE');
    styles.innerHTML = `
  .image-reveal--parent {position:relative}
  .image-reveal--parent [class*="image-reveal--"], .image-reveal--parent img {position:absolute; width:100%; height:100%; overflow:hidden;}
  .image-reveal--parent .image-reveal--right {top:0;right:0;width:0;}
  .image-reveal--parent .image-reveal--right img {top:0;bottom:unset;left:unset;right:0;max-width:unset;max-height:unset;}
  .image-reveal--parent .image-reveal--left {top:0;left:0;width:0;}
  .image-reveal--parent .image-reveal--left img {top:0;bottom:unset;left:0;right:unset;max-width:unset;max-height:unset;}
  .image-reveal--parent .image-reveal--top {top:0;left:0;height:0;}
  .image-reveal--parent .image-reveal--top img {top:0;bottom:unset;left:0;right:unset;max-width:unset;max-height:unset;}
  .image-reveal--parent .image-reveal--bottom {bottom:0;left:0;height:0;}
  .image-reveal--parent .image-reveal--bottom img {top:unset;bottom:0;left:0;right:unset;max-width:unset;max-height:unset;}
  `;
    styles.setAttribute('id', 'image-reveal-style');
    document.body.appendChild(styles);
  }
  prepareImages();
  
  window.addEventListener('resize', debounce(function () {
    
    for (const image of images) {
      unwrap(image, image.closest('.image-reveal--parent'));
      image.removeAttribute('style');
    }
    
    prepareImages();
  }, 100));
  
  
  function prepareImages() {
    for (const image of images) {
      let wrapper,
        parent = wrappers.querySelector('.image-reveal--parent').cloneNode(),
        {height, width} = image.getBoundingClientRect();
      gsap.set(image, {height, width, position: 'absolute'});
      gsap.set(parent, {height, width});
      switch (image.dataset[directionData]) {
        case 'left':
          wrapper = wrappers.querySelector('.image-reveal--left').cloneNode();
          break;
        case 'right':
          wrapper = wrappers.querySelector('.image-reveal--right').cloneNode();
          break;
        case 'top':
          wrapper = wrappers.querySelector('.image-reveal--top').cloneNode();
          break;
        case 'bottom':
          wrapper = wrappers.querySelector('.image-reveal--bottom').cloneNode();
          break;
      }
      wrap(image, wrapper);
      wrap(wrapper, parent);
      imagesWrapper.push(parent);
    }
    ScrollTrigger.batch(imagesWrapper, {
      onEnter: batch => {
        return gsap.to(batch.map(e => e.firstChild), {
          width: '100%',
          height: '100%',
          stagger: 0.05,
          duration: 0.95,
          ease: 'power2.out',
        });
      },
      start: 'top 90%',
      once: true,
    });
  }
}