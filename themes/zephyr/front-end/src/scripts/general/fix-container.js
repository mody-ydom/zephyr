export default () => {
  window.addEventListener('resize', fixContainer);
  fixContainer();
  
  function fixContainer() {
    if (window.innerWidth > 1280) {
      document.documentElement.style.fontSize = `${10}px`;
    }
    else if (window.innerWidth >= 1024) {
      document.documentElement.style.fontSize = `${10 * window.innerWidth / 1280}px`;
    }
    else {
      document.documentElement.style.fontSize = `${10}px`;
    }
    
  }
}
