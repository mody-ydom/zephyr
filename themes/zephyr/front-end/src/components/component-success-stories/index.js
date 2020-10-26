import './index.html';
import Masonry from 'masonry-layout'

export default (container = document) => {
  
    const grids = container.querySelectorAll('.grid');
    if (!grids) return;
  for (let gridElement of grids) {
    const  masonry = new Masonry(gridElement,{
      itemSelector: '.grid-item',
      columnWidth: '.grid-sizer',
      columnNumber:2,
      gutter:0,
      horizontalOrder: true,
      percentPosition: true,
      resize: false
    });
    setTimeout( masonry.layout,500)
    window.addEventListener('container-fixed',()=>{
      setTimeout(()=>masonry.layout(),500);
    });
  
  }
  
};