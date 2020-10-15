import 'normalize.css/normalize.css';
import './styles/style.scss';
import {barba, animations, fixContainer, smoothScroll, videoScrollAutoPlay} from './scripts/general';
import * as components from './components';
import './html';
import Scrollbar from 'smooth-scrollbar';


const reInvokableFunction = (container = document) => {
  try {
    eval(`jQuery('form.quform-form').quform();`);
  } catch (e) {
    //do nothing
  }
  const bodyScrollBar = Scrollbar.get(document.querySelector('[smooth-scroll-container]'));
  bodyScrollBar.scrollTo(0, 0);
  bodyScrollBar.update();
  for (const component of Object.values(components)) {
    requestAnimationFrame(() => requestAnimationFrame(() => component(container)));
  }
  setTimeout(function () {
    animations(container);
  }, 100);
  videoScrollAutoPlay(container);
};

function onLoad() {
  if (document.readyState === 'interactive') {
    smoothScroll();
    fixContainer();
    reInvokableFunction();
    barba(reInvokableFunction);
  }
}

onLoad();

document.onreadystatechange = function () {
  onLoad();
};
