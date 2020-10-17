import './index.html';
import {gsap} from 'gsap';

export default (container = document) => {
  const articleComponent = container.querySelector('.component-article-guide');
  if (!articleComponent) return;
  const articleTitle = document.querySelectorAll('.article-container .title');
  
  
  articleTitle.forEach((title) => {
    title.addEventListener('click', (e) => {
      let nextSib = title.nextElementSibling;
      
      if (nextSib.classList.contains('active')) {
        gsap.to(nextSib, {height: 0});
        nextSib.classList.remove('active');
        title.parentElement.classList.remove('active');
      }
      else {
        gsap.to(Array.from(articleTitle).map(elem => {
          const e = elem.nextElementSibling;
          e.classList.remove('active');
          e.parentElement.classList.remove('active');
          return e;
        }), {height: 0});
        gsap.to(nextSib, {height: 'auto'});
        // setTimeout(function () {
        //   scrollbar.scrollIntoView(title, {
        //     offsetTop: 80,
        //   });
        // }, 400);
        nextSib.classList.add('active');
        title.parentElement.classList.add('active');
      }
    });
  });
};