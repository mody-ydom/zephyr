import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import getElementsForAnimation from '../../functions/getElementsForAnimation';

gsap.registerPlugin(ScrollTrigger);

export default function parallaxAnimation(container = document, containerSelector = '[parallax-container]', childrenSelector = '[data-parallax-factor]', factorData = 'parallaxFactor') {
  const parallaxContainers = getElementsForAnimation(container, containerSelector);
  if (!parallaxContainers) return;
  setTimeout(function () {
    for (const parallaxContainer of parallaxContainers) {
      const tl = gsap.timeline({
        scrollTrigger: {
          scrub: 0.8,
          trigger: parallaxContainer,
          start: 'top bottom',
          end: 'bottom top',
        },
      });
      for (const parallaxChild of parallaxContainer.querySelectorAll(childrenSelector)) {
        if (parallaxChild.complete) {
          const parallaxFactor = parallaxChild.dataset[factorData];
          const yMovement = parallaxContainer.getBoundingClientRect().height * parallaxFactor;
          tl.fromTo(parallaxChild, {y: yMovement}, {
            y: -yMovement, ease: 'linear',
          }, '<');
          ScrollTrigger.refresh();
        }
        else {
          parallaxChild.addEventListener('load', () => {
            const parallaxFactor = parallaxChild.dataset[factorData];
            const yMovement = parallaxContainer.getBoundingClientRect().height * parallaxFactor;
            tl.fromTo(parallaxChild, {y: yMovement}, {
              y: -yMovement, ease: 'linear',
            }, '<');
            ScrollTrigger.refresh();
          });
        }
       
      }
    }
  }, 500);
}

