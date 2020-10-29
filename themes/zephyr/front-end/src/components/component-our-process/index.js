import './index.html';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import getElementsForAnimation from '../../scripts/functions/getElementsForAnimation';

gsap.registerPlugin(ScrollTrigger);

export default (container = document) => {
  const section = container.querySelector('.component-our-process');
  if (!section) return;
  
  gsap.timeline({
    scrollTrigger: {
      trigger: section,
      start: 'top 75%',
      once: true,
    },
  })
    .from(getElementsForAnimation(container, '.aqua,.orange,.pill'), {autoAlpha: 0, scale: 0, stagger: 0.4, duration: 1.5}, 0)
    .from(getElementsForAnimation(container, '.big-aqua'), {autoAlpha: 0, y: 150, stagger: 0.2, duration: 1}, 0)
    .from(getElementsForAnimation(container, '.hand'), {autoAlpha: 0, xPercent: -100, stagger: 0.2, duration: 1.5}, 0)
    .from(getElementsForAnimation(container, '.lines'), {autoAlpha: 0, stagger: 0.2}, 0)
};