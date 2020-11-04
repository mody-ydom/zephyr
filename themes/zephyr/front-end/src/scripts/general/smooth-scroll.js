import Scrollbar, {ScrollbarPlugin} from 'smooth-scrollbar';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

class DisableScrollPlugin extends ScrollbarPlugin {
  static pluginName = 'disableScroll';
  
  static defaultOptions = {
    direction: null,
  };
  
  onInit() {
    super.onInit();
    this.scrollbar.track[`${this.options.direction}Axis`]?.element.remove();
  }
  
  transformDelta(delta, _) {
    if (this.options.direction) {
      delta[this.options.direction] = 0;
    }
    
    return {...delta};
  }
}

class DampScrollPlugin extends ScrollbarPlugin {
  static pluginName = 'dampScroll';
  
  static defaultOptions = {
    amount: 0,
  };
  
  
  transformDelta(delta, _) {
    delta.y *= (1 - this.options.amount);
    if (this.options.amount === 0.999) delta.y = delta.y > 0 ? 2 : -2;
    return {...delta};
  }
  
  onRender(remainMomentum) {
    // console.log(this.options.amount);
    if (this.options.amount >= 0.999) this.scrollbar.setMomentum(0, 0);
  }
}

Scrollbar.use(DisableScrollPlugin);
Scrollbar.use(DampScrollPlugin);

function calculateScrollSpeedFactor() {
  if (window.matchMedia('(min-width:576px)').matches) {
    window.scrollSpeedFactor = document.body.dataset.scrollSpeedDesktop / 100;
  }
  else {
    window.scrollSpeedFactor = document.body.dataset.scrollSpeedMobile / 100;
  }
}

export default () => {
  gsap.registerPlugin(ScrollTrigger);
  calculateScrollSpeedFactor();
  
  const scrollContainer = document.querySelector('[smooth-scroll-container]');
  if (!scrollContainer) return;
  ScrollTrigger.defaults({
    scroller: scrollContainer,
  });
  const bodyScrollBar = Scrollbar.init(scrollContainer, {damping: window.scrollSpeedFactor, plugins: {disableScroll: {direction: 'x'}}});
  bodyScrollBar.setPosition(0, 0);
  ScrollTrigger.scrollerProxy(scrollContainer, {
    scrollTop(value) {
      if (arguments.length) {
        bodyScrollBar.scrollTop = value;
      }
      return bodyScrollBar.scrollTop;
    },
  });
  bodyScrollBar.addListener(ScrollTrigger.update);
  setTimeout(function () {
    ScrollTrigger.refresh();
  }, 0);
}
