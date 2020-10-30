import 'normalize.css/normalize.css';
import './styles/style.scss';
import {barba, animations, fixContainer, smoothScroll} from './scripts/general';
import * as components from './components';
import './html';
import Scrollbar from 'smooth-scrollbar';
import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';


const isAdmin = NODE_ENV_ADMIN;
const reInvokableFunction = (container = document) => {
  
  const bodyScrollBar = Scrollbar.get(document.querySelector('[smooth-scroll-container]'));
  bodyScrollBar.updatePluginOptions('dampScroll', {amount: 0});
  bodyScrollBar.scrollTo(0, 0,500);
  bodyScrollBar.update();
  for (let scrollTriggerInstance of ScrollTrigger.getAll()) {
    scrollTriggerInstance.kill();
  }
  for (const component of Object.values(components)) {
    requestAnimationFrame(() => requestAnimationFrame(() => component(container)));
  }
  setTimeout(function () {
    animations(container);
  }, 400);
};

function onLoad() {
  if (document.readyState === 'interactive') {
    fixContainer();
    if (!isAdmin) {
      gsap.registerPlugin(ScrollTrigger);
      smoothScroll();
      barba(reInvokableFunction);
      reInvokableFunction();
    }
    if (isAdmin) {
      const getBlockList = () => window.wp.data.select('core/block-editor').getBlocks();
      let blockList = getBlockList();
      window.wp.data.subscribe(() => {
        const newBlockList = getBlockList();
        const blockListChanged = newBlockList !== blockList;
        blockList = newBlockList;
        if (blockListChanged) {
          setTimeout(function () {
            for (const component of Object.values(components)) {
              requestAnimationFrame(() => requestAnimationFrame(() => component()));
            }
          }, 500);
        }
      });
    }
  }
}

onLoad();

document.onreadystatechange = function () {
  onLoad();
};

window.addEventListener('load', () => ScrollTrigger.refresh());