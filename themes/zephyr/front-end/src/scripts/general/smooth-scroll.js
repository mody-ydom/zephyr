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

Scrollbar.use(DisableScrollPlugin);

export default () => {
  gsap.registerPlugin(ScrollTrigger);
  const scrollContainer = document.querySelector('[smooth-scroll-container]');
  if (!scrollContainer) return;
  ScrollTrigger.defaults({
    scroller: scrollContainer,
  });
  const bodyScrollBar = Scrollbar.init(scrollContainer, {damping: 0.075, plugins: {disableScroll: {direction: 'x'}}});
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
