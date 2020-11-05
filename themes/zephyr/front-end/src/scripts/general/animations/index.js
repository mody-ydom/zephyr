import parallaxAnimation from './parallaxAnimation';
import imageRevealAnimation from './imagesRevealAnimation';
import wordsUpAnimation from './wordsUpAnimation';
import linesUpAnimation from './linesUpAnimation';
import inViewAnimations from './InViewAnimations';
import realLinesUpAnimation from './realLinesUpAnimation';
import gsapConfig from './gsap.config';

export default function animations(container = document) {
  gsapConfig();
  imageRevealAnimation(container);
  wordsUpAnimation(container);
  linesUpAnimation(container);
  inViewAnimations(container);
  setTimeout(function () {
    parallaxAnimation(container);
    realLinesUpAnimation(container);
  }, 200);
}