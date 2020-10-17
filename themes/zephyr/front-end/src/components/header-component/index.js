import './index.html';

export default (container = document) => {
  let headerContent = container.querySelector('.header-content');
  if (headerContent) return ;
  let burgerMenu = document.getElementsByClassName('menu'),
     crossMenu = document.getElementsByClassName('cross'),
     links = document.getElementsByClassName('links');
   
  if (!burgerMenu) return;
  console.log(burgerMenu);
  console.log(crossMenu);
  console.log(links);

  // burgerMenu.addEventListener('click', function () {
  //   burgerMenu.classList.add('active');
  //   crossMenu.classList.add('active');
  //   links.classList.add('active');
  // });

  // crossMenu.addEventListener('click', function () {
  //   crossMenu.classList.remove('active');
  //   burgerMenu.classList.add('active');
  //   links.classList.remove('active');
  // });
};