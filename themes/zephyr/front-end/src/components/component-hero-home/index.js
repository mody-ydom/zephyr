import './index.html';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import getElementsForAnimation from '../../scripts/functions/getElementsForAnimation';

gsap.registerPlugin(ScrollTrigger);
export default (container = document) => {
  const hero = container.querySelector('.component-hero.no-bg');
  if (!hero) return;
  
  gsap.timeline({
    scrollTrigger: {
      trigger: hero,
      start: 'top 75%',
      once: true,
    },
  })
    .fromTo(hero.querySelectorAll('.test-blob,.circle.oval'), {autoAlpha: 0, x: 100}, {autoAlpha: 1, x: 0, duration: 0.75, stagger: 0.4})
    .fromTo(hero.querySelectorAll('.circle.orange-circle'), {autoAlpha: 0, y: 100}, {autoAlpha: 1, y: 0, duration: 0.5, stagger: 0.2}, '<+=.3')
    .fromTo(hero.querySelectorAll('.circle.aqua-circle'), {autoAlpha: 0, y: 100}, {autoAlpha: 1, y: 0, duration: 0.5, stagger: 0.2}, '<+=.3')
    .fromTo(hero.querySelectorAll('.circle.dark-circle'), {autoAlpha: 0, y: -100}, {autoAlpha: 1, y: 0, duration: 0.5, stagger: 0.2}, '<+=.3');
};