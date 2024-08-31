AOS.init();
// ハンバーガーメニュー
(function($) {
    var $nav   = $('#navArea');
    var $btn   = $('.toggle_btn');
    var $mask  = $('#mask');
    var open   = 'open'; // class
    // menu open close
    $btn.on( 'click', function() {
      if ( ! $nav.hasClass( open ) ) {
        $nav.addClass( open );
      } else {
        $nav.removeClass( open );
      }
    });
    // mask close
    $mask.on('click', function() {
      $nav.removeClass( open );
    });
  } )(jQuery);

// skillのアニメーション
document.addEventListener('DOMContentLoaded', function() {
  const cards = document.querySelectorAll('.card');
  let animationStarted = false;

  function showCard(card) {
      card.classList.add('show');
  }

  function checkCards() {
      cards.forEach((card) => {
          const cardTop = card.getBoundingClientRect().top;
          const cardBottom = card.getBoundingClientRect().bottom;
          const windowHeight = window.innerHeight;

          if (cardTop < windowHeight && cardBottom > 0 && !card.classList.contains('show')) {
              showCard(card);
          }
      });
  }
  function startAnimation() {
    if (!animationStarted) {
        animationStarted = true;
        window.addEventListener('scroll', checkCards);
        checkCards(); // 初期チェック
    }
}

// スクロールが始まったらアニメーションを開始
window.addEventListener('scroll', startAnimation, { once: true });
});