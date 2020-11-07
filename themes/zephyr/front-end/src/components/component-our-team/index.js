import './index.html';
import gsap from 'gsap';

export default (container = document) => {
  let ourTeam = container.querySelector('.component-our-team');
  if (!ourTeam) return;
  const animatedCircles = ourTeam.querySelectorAll('.animated-circle');
  const speed = 5; //percent per sec
  for (let animatedCircle of animatedCircles) {
    
    function animateNextStep() {
      const
        currentLocation = {xPercent: gsap.getProperty(animatedCircle, 'xPercent'), yPercent: gsap.getProperty(animatedCircle, 'yPercent')},
        nextLocation = {
          xPercent: gsap.utils.random(-25, 25),
          yPercent: gsap.utils.random(-25, 25),
        },
        duration = Math.hypot(currentLocation.xPercent - nextLocation.xPercent, currentLocation.yPercent - nextLocation.yPercent) / speed;
      gsap.to(animatedCircle, {...nextLocation, duration, ease: 'power1.inOut', onComplete: animateNextStep});
    }
    
    animateNextStep();
    gsap.fromTo(animatedCircle,{scale:.8},
      {scale:1.2,duration:20,repeat:-1,yoyo:true,ease:'power1.inOut'})
  }
  
};