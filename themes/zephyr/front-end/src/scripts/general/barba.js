import barba from '@barba/core';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);


export default (reInvokableFunction) => {
  const transition1 = {
    name: 'skew-overlay-transition',
    to: {
      custom: ({current, next}) => (current.namespace === 'blog' && next.namespace === 'blog'),
    }, leave(data) {
      console.log('leave: skew-overlay-transition');
      const background = '.skew-overlay-transition';
      return gsap.timeline()
        .set(background, {
          xPercent: -110,
          display: 'block',
          skewX: 10,
        })
        .to(background, {
          duration: 1,
          xPercent: 0,
          ease: 'power4.inOut',
          skewX: 0,
        });
    },
    enter(data) {
      console.log('enter: skew-overlay-transition');
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
      const background = '.skew-overlay-transition';
      return gsap.timeline()
        .set(background, {
          xPercent: 0,
          display: 'block',
        })
        .to(background, {
          duration: 0.6,
          xPercent: 100,
          ease: 'power4.inOut',
        })
        .set(background, {
          display: 'none',
        });
    },
  };
  const transition2 = {
    name: 'opacity-transition',
    leave(data) {
      return gsap.to(data.current.container, {
        opacity: 0,
      });
    },
    enter(data) {
      gsap.set(data.current.container, {zIndex: -1, position: 'absolute'});
      window.scrollTo(0, 0);
      return gsap.from(data.next.container, {
        opacity: 0, onComplete: ScrollTrigger.refresh,
      });
    },
  };
  const transition3 = {
    name: 'bottom-overlay-transition',
    to: {
      custom: ({current, next}) => {
        console.log(current.namespace, next, (current.namespace === 'blog' && next.namespace === 'home'), (current.namespace === 'home' && next.namespace === 'blog'), (current.namespace === 'home' && next.namespace === 'home'));
        return (current.namespace === 'blog' && next.namespace === 'home') || (current.namespace === 'home' && next.namespace === 'blog') || (current.namespace === 'home' && next.namespace === 'home');
      },
    },
    leave(data) {
      console.log('leave: bottom-overlay-transition');
      return gsap.fromTo('.barba-overlay-transition', {yPercent: 100}, {
        duration: 0.35,
        yPercent: 0,
        ease: 'power2.out',
      });
      
    },
    enter(data) {
      console.log('enter: bottom-overlay-transition');
      gsap.set(data.current.container, {zIndex: -1, position: 'absolute'});
      return gsap.fromTo('.barba-overlay-transition', {yPercent: 0, y: 0}, {
        duration: 0.3,
        delay: 1,
        y: 0,
        yPercent: -100,
        ease: 'power2.in',
        onComplete: () => {
          ScrollTrigger.refresh();
        },
      });
    },
  };
  if (document.querySelector('[data-barba]')) {
    barba.init({
      transitions: [transition1, transition3],
      timeout: 0,
      prevent: ({el}) => el.classList && el.classList.contains('ab-item'),
      // prefetchIgnore: true,
    });
    barba.hooks.beforeEnter(data => reInvokableFunction(data.next.container));
    barba.hooks.beforeLeave(() => {
      window.dispatchEvent(new Event('will-leave'));
      // for (let scrollTrigger of ScrollTrigger.getAll()) {
      //   scrollTrigger.kill();
      // }
    });
    window.addEventListener('beforeunload', () => window.scrollTo(0, 0));
    gsap.timeline()
      .fromTo('.barba-overlay-transition', {yPercent: 100}, {duration: 0, yPercent: 0})
      .fromTo('.barba-overlay-transition', {yPercent: 0, y: 0},
        {duration: 0, y: 0, yPercent: -100});
    
  }
  else {
    console.log('no barba container');
  }
}
