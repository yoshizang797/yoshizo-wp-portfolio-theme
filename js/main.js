document.addEventListener("DOMContentLoaded", () => {

  // ================================
  // ① marquee 無限ループ
  // ================================
  const marquee = document.getElementById("marquee");
  if (marquee && typeof gsap !== "undefined") {
    const marqueeWidth = marquee.offsetWidth;
    gsap.fromTo(
      marquee,
      { x: 0 },
      { x: -marqueeWidth / 2, duration: 40, ease: "none", repeat: -1 }
    );
  }

  // ================================
  // ② フェードインアニメーション
  // ================================
  const fadeElems = document.querySelectorAll(".fade-in");
  if (fadeElems.length > 0) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("show");
          }
        });
      },
      { threshold: 0.2 }
    );
    fadeElems.forEach((el) => observer.observe(el));
  }

  // ================================
  // ③ ハンバーガーメニュー
  // ================================
  const hamburgerMenu = document.querySelector(".hamburger-menu");
  const navi = document.getElementById("hamburger-navigation");
  const hamburgerMenuSections = document.querySelectorAll(".hamburger-menu-section");

  if (hamburgerMenu && navi) {
    // メニュークリックで開閉
    hamburgerMenu.addEventListener("click", function () {
      //console.log("ハンバーガーメニュークリックされた");
      hamburgerMenu.classList.toggle("active");
      navi.classList.toggle("active");
    });

    // メニュー内の各セクションクリックで閉じる
    hamburgerMenuSections.forEach((section) => {
      section.addEventListener("click", function () {
        hamburgerMenu.classList.remove("active");
        navi.classList.remove("active");
      });
    });
  }

//js フォールバック
// このスクリプトはページ下部か main.js に追加してください
document.querySelectorAll('.grid__item').forEach(function(item){
  item.addEventListener('mouseenter', function(){
    item.classList.add('hovered');
  });
  item.addEventListener('mouseleave', function(){
    item.classList.remove('hovered');
  });
});

});

