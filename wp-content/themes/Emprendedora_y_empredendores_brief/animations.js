(function () {
  function revealAll(els) {
    els.forEach(function (el) { el.classList.add('eeVisible'); });
  }

  function initReveal() {
    var els = document.querySelectorAll('.eeReveal:not(.eeObserved), .eeRevealBird:not(.eeObserved)');
    if (!els.length) return;

    if (!('IntersectionObserver' in window)) {
      revealAll(els);
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('eeVisible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.01, rootMargin: '0px 0px -10% 0px' });

    els.forEach(function (el) {
      el.classList.add('eeObserved');
      io.observe(el);
    });
  }

  function initHeaderScroll() {
    var header = document.getElementById('ee-site-header');
    if (!header || header.dataset.eeScrollBound) return;
    header.dataset.eeScrollBound = 'true';

    function update() {
      header.classList.toggle('eeHeaderScrolled', window.scrollY > 40);
    }

    window.addEventListener('scroll', update, { passive: true });
    update();
  }

  function start() {
    initReveal();
    initHeaderScroll();

    // The page content is rendered by a component framework after initial
    // parse, so keep re-scanning for newly mounted .eeReveal nodes.
    var mo = new MutationObserver(function () { initReveal(); initHeaderScroll(); });
    mo.observe(document.body, { childList: true, subtree: true });

    // Safety net: if something above never mounted/observed correctly,
    // force everything visible after a few seconds so content is never
    // stuck hidden.
    setTimeout(function () {
      revealAll(document.querySelectorAll('.eeReveal:not(.eeVisible)'));
    }, 4000);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', start);
  } else {
    start();
  }
})();
