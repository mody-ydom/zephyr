import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default function coreIconsAnimations(container = document) {
  if (Array.isArray(container)) return;
  const newsFilter = container.getElementsByClassName('news-filter');
  
  const hiddenBars = container.querySelectorAll('.news-filter .hidden-bars');
  if (newsFilter) {
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: '.filters',
        once: true,
        start: 'top 80%',
      }, delay: 1,
    });
    tl.to(hiddenBars, {
      scaleY: 0,
      transformOrigin: 'top',
      ease: 'power1.out',
    });
    tl.to(hiddenBars, {
      scaleY: (index, target) => 1 - target.closest('[data-percentage]').dataset['percentage'],
      transformOrigin: 'top',
      ease: 'power1.in',
    });
    
    for (const newsFilterElement of newsFilter) {
      newsFilterElement.addEventListener('mouseenter', () => {
        const tl = gsap.timeline();
        const hiddenBars = newsFilterElement.querySelector('.hidden-bars');
        tl.fromTo(newsFilterElement.querySelector('.icon img'), {xPercent: 100 * 29 / 30}, {xPercent: 0, duration: 2, ease: 'steps(29)', force3D: false});
        if (hiddenBars) {
          tl.fromTo(
            newsFilterElement.querySelector('.hidden-bars'),
            {scaleY: (index, target) => 1 - target.closest('[data-percentage]').dataset['percentage'], transformOrigin: 'top'},
            {scaleY: 0, duration: 0.2, repeat: 1, yoyo: true},
            '<');
        }
      });
    }
    
  }
};