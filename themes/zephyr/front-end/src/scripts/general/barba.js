import barba from '@barba/core';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);


export default (reInvokableFunction) => {
  const transition1 = {
    name: 'skew-overlay-transition',
    to: {
      custom: ({current, next}) => (current.namespace === 'blog' && next.namespace === 'blog'),
    },
    leave(data) {
      const background = '.skew-overlay-transition';
      return gsap.timeline()
        .set(background, {
          xPercent: -105,
          display: 'block',
        })
        .to(background, {
          duration: 1,
          xPercent: 0,
          ease: 'power4.inOut',
        })
        .set(data.current.container, {autoAlpha: 0});
    },
    enter(data) {
      const background = '.skew-overlay-transition';
      gsap.set(data.current.container, {zIndex: -1, position: 'absolute'});
  
      return gsap.timeline({
        onComplete() {
          // ScrollTrigger.refresh();
        },
      })
        .set(background, {
          xPercent: 0,
          display: 'block',
        })
        .to(background, {
          duration: 0.6,
          xPercent: 105,
          ease: 'power4.inOut',
        })
        .set(background, {
          display: 'none',
        });
    },
  };
  const transitionblog = {
    name: 'opacityblog-transition',
    to: {
      custom: ({current, next}) => (current.namespace === 'blog' && next.namespace === 'blog'),
    },
    leave(data) {
      return gsap.to(data.current.container.querySelector('.right-content'), {
        opacity: 0,
      });
    },
    enter(data) {
      gsap.set(data.current.container.querySelector('.right-content'), {zIndex: -1, position: 'absolute'});
      window.scrollTo(0, 0);
      return gsap.from(data.next.container.querySelector('.right-content'), {
        opacity: 0,
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
        opacity: 0,
      });
    },
  };
  const transition3 = {
    name: 'bottom-overlay-transition',
    to: {
      custom: ({current, next}) => {
        return (current.namespace === 'blog' && next.namespace === 'home') ||
          (current.namespace === 'home' && next.namespace === 'blog') ||
          (current.namespace === 'home' && next.namespace === 'home');
      },
    },
    leave(data) {
      return gsap.timeline()
        .fromTo('.barba-overlay-transition', {yPercent: 100}, {
          duration: 0.35,
          yPercent: 0,
          ease: 'power2.out',
        })
        .set(data.current.container, {autoAlpha: 0});
  
    },
    enter(data) {
      gsap.set(data.current.container, {zIndex: -1, position: 'absolute'});
      if (data.next.namespace === 'blog') {
        const background = '.skew-overlay-transition';
        gsap.timeline()
          .set(background, {
            xPercent: 0,
            display: 'block',
          })
          .to(background, {
            duration: 0.6,
            xPercent: 105,
            ease: 'power4.inOut',
          })
          .set(background, {
            display: 'none',
          });
      }
      return gsap.fromTo('.barba-overlay-transition', {yPercent: 0, y: 0}, {
        duration: 0.3,
        delay: 1,
        y: 0,
        yPercent: -100,
        ease: 'power2.in',
        onComplete: () => {
          // ScrollTrigger.refresh();
        },
      });
    },
  };
  if (document.querySelector('[data-barba]')) {
    barba.init({
      transitions: [transition2,transitionblog],
      timeout: 0,
      prevent: ({el}) => el.classList && el.classList.contains('ab-item'),
      // prefetchIgnore: true,
    });
    barba.hooks.beforeEnter(data =>{reInvokableFunction(data.next.container)});
    barba.hooks.afterEnter(()=>ScrollTrigger.refresh());
    barba.hooks.beforeEnter(data => document.body.className = data.next.container.dataset.bodyClass);
    barba.hooks.beforeLeave(() => {
      window.dispatchEvent(new Event('will-leave'));
      for (let scrollTrigger of ScrollTrigger.getAll()) {
        scrollTrigger.kill();
      }
    });
    gsap.timeline()
      .fromTo('.barba-overlay-transition', {yPercent: 100}, {duration: 0, yPercent: 0})
      .fromTo('.barba-overlay-transition', {yPercent: 0, y: 0},
        {duration: 0, y: 0, yPercent: -100});
    gsap.timeline()
      .fromTo('.skew-overlay-transition', {xPercent: -105}, {duration: 0, xPercent: 0})
      .fromTo('.skew-overlay-transition', {xPercent: 0, x: 0},
        {duration: 0, x: 0, xPercent: 105});
  
  }
  else {
    console.log('no barba container');
  }
}
