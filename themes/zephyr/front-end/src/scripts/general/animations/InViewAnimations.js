import 'waypoints/lib/noframework.waypoints.min.js';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';
import getElementsForAnimation from '../../functions/getElementsForAnimation';

gsap.registerPlugin(ScrollTrigger);


export default function inViewAnimations(container = document) {
  const elements1 = getElementsForAnimation(container, '.iv-st-from-left, .iv-st-from-right');
  gsap.set(elements1, {autoAlpha: 0});
  ScrollTrigger.batch(elements1, {
    onEnter: batch => {
      gsap.set(batch, {autoAlpha: 1});
      gsap.fromTo(batch, {autoAlpha:0,xPercent: (_, target) => 100 * (target.classList.contains('iv-st-from-right') ? 1 : -1)},{
        duration: .7,
        autoAlpha: 0,
        xPercent: 0,
        ease: 'power1.out',
        stagger: .1,
        clearProps: 'transform',
      });
    },
    onEnterBack: batch => {
      gsap.set(batch, {autoAlpha: 1});
      gsap.fromTo(batch, {autoAlpha:0,xPercent: (_, target) => 100 * (target.classList.contains('iv-st-from-right') ? 1 : -1)},{
        duration: .7,
        autoAlpha: 0,
        xPercent: 0,
        ease: 'power1.out',
        stagger: .1,
        clearProps: 'transform',
      });
    },
    start: 'top 80%',
    once: true,
  });
  const elements2 = getElementsForAnimation(container, '.iv-st-from-top, .iv-st-from-bottom');
  gsap.set(elements2, {autoAlpha: 0});
  ScrollTrigger.batch(elements2, {
    onEnter: batch => {
      console.log(batch);
      gsap.set(batch, {autoAlpha: 1});
      gsap.fromTo(batch, {autoAlpha:0,yPercent: (_, target) => 50 * (target.classList.contains('iv-st-from-bottom') ? 1 : -1)},{
        duration: .7,
        autoAlpha: 0,
        yPercent: 0,
        ease: 'power1.out',
        stagger: .1,
        clearProps: 'transform',
      });
    },
    onEnterBack: batch => {
      gsap.set(batch, {autoAlpha: 1});
      gsap.fromTo(batch, {autoAlpha:0,yPercent: (_, target) => 50 * (target.classList.contains('iv-st-from-bottom') ? 1 : -1)},{
        duration: .7,
        autoAlpha: 0,
        yPercent: 0,
        ease: 'power1.out',
        stagger: .1,
        clearProps: 'transform',
      });
    },
    start: 'top 80%',
    once: true,
  });
  
  ScrollTrigger.addEventListener('refreshInit', () => gsap.set('.iv-st-from-top, .iv-st-from-bottom', {yPercent: 0}));
}


