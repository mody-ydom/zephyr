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
    .from(hero.querySelectorAll('.test-blob,.circle.oval'), {duration: .75, stagger: .4, autoAlpha: 0, xPercent: 75})
    .from(hero.querySelectorAll('.circle.orange-circle'), {duration: .5, stagger: .2, autoAlpha: 0, y: 100}, '<+=.3')
    .from(hero.querySelectorAll('.circle.aqua-circle'), {duration: .5, stagger: .2, autoAlpha: 0, y: 100}, '<+=.3')
    .from(hero.querySelectorAll('.circle.dark-circle'), {duration: .5, stagger: .2, autoAlpha: 0, y: -100}, '<+=.3');
};