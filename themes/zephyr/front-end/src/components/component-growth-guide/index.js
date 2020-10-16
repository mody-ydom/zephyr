import './index.html';

export default (container = document) => {
  const guideComponent = container.querySelector('.component-growth-guide');
  if (!guideComponent) return;
  const guideContainer = guideComponent.querySelector('.guide-container');
  const guideCards = Array.from(guideContainer.children);

  const prepareGuideCards = (card) => {
    const title = card.querySelector('.title');
    const icons = card.querySelector('.icons');
    const guideBody = title.nextElementSibling;
    
    console.log(card);
    title.addEventListener('click', (e) => {
      
      if (guideBody.style.height) {
        guideBody.style.height = null;
        guideBody.classList.remove('active');
        icons.classList.remove('active');
        card.classList.remove('active');
      }
      else {
        guideBody.classList.add('active');
        guideBody.style.height = guideBody.scrollHeight + 'px';
        icons.classList.add('active');
        card.classList.add('active');
      }
    });
  };
  
  guideCards.forEach(prepareGuideCards);
  
};