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
    .from(getElementsForAnimation(container, '.component-our-process .aqua,.component-our-process .orange,.component-our-process .pill'), {autoAlpha: 0, scale: 0, stagger: 0.4, duration: .75})
    .from(getElementsForAnimation(container, '.component-our-process .big-aqua'), {autoAlpha: 0, y: 150, stagger: 0.2, duration: 1}, '<+=.3')
    .from(getElementsForAnimation(container, '.component-our-process .hand'), {autoAlpha: 0, xPercent: -100, stagger: 0.2, duration: 1.5}, '<+=.3')
    .from(getElementsForAnimation(container, '.component-our-process .lines'), {autoAlpha: 0, stagger: 0.2}, '<+=.3');
};