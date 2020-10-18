import './index.html';

export default (container = document) => {
  let headerContent = container.querySelector('.header-content');
  if (!headerContent) return;
  
  let burgerMenu = container.querySelector('.menu'),
     crossMenu = container.querySelector('.cross'),
     links = container.querySelector('.links');
   
  if (!burgerMenu) return;

  burgerMenu.addEventListener('click', function () {
    burgerMenu.classList.add('active');
    crossMenu.classList.add('active');
    links.classList.add('active');
  });

  crossMenu.addEventListener('click', function () {
    crossMenu.classList.remove('active');
    burgerMenu.classList.remove('active');
    links.classList.remove('active');
  });
};