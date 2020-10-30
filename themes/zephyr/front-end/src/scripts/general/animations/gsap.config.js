import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default function gsapConfig() {
  gsap.config({
    nullTargetWarn: false,
  });
  gsap.defaults({
    overwrite: true
  })
}