import './index.html';

export default (container = document) => {
  console.log('22');
  const title = document.querySelectorAll('.guide-list .title');
  title.addEventListener('click', (e) => {
    console.log('ee');
    if (podcastBody.style.height) {
      podcastBody.style.height = null;
      podcastBody.classList.remove('active');
      title.querySelector('.arrow').classList.remove('active');
      card.classList.remove('active');
    }
    else {
      podcastBody.classList.add('active');
      podcastBody.style.height = podcastBody.scrollHeight + 'px';
      title.querySelector('.arrow').classList.add('active');
      card.classList.add('active');
    }
  });

};