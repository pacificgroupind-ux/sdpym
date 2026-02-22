document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const id = a.getAttribute('href');
    if (id.length > 1) {
      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
});

if (window.AOS) {
  const animatedSelectors = [
    '.section-title',
    '.card',
    '.gallery-img',
    '.table-responsive',
    '.hero .container',
    '.alert'
  ];

  animatedSelectors.forEach((selector, groupIndex) => {
    document.querySelectorAll(selector).forEach((el, index) => {
      if (!el.dataset.aos) {
        el.dataset.aos = groupIndex % 2 === 0 ? 'fade-up' : 'zoom-in-up';
      }
      if (!el.dataset.aosDelay) {
        el.dataset.aosDelay = String(Math.min(index * 70, 350));
      }
      if (!el.dataset.aosDuration) {
        el.dataset.aosDuration = '700';
      }
    });
  });

  AOS.init({
    once: true,
    offset: 80,
    easing: 'ease-out-cubic'
  });
}
