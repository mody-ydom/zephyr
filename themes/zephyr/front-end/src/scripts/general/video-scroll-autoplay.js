import {gsap} from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default (container = document) => {
  
  const videos = container.querySelectorAll('[scroll-play-video]');
  if (!videos) return;
  for (let video of videos) {
    ScrollTrigger.create({
      trigger: video,
      start: 'top 80%',
      end: 'bottom 20%',
      onEnter() {
        video.play();
      },
      onEnterBack() {
        video.play();
      },
      onLeave() {
        video.pause();
      },
      onLeaveBack() {
        video.pause();
      },
    });
  }
}
