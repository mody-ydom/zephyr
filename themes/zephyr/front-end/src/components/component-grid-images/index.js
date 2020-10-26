import './index.html';
import Masonry from 'masonry-layout'


export default (container = document) => {
  
  window.onload =  ()=>{
    const grid = document.querySelector('.grid');
    if (!grid) return;
    const  masonry = new Masonry(grid,{
      itemSelector: '.grid-item',
      columnNumber:2,
      gutter:76,
    });
  }
  
};