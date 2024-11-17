//アコーディオンメニュー
$('.menu-btn').click(function () {
  $(this).toggleClass('is-open');
  $(this).siblings('.menu').toggleClass('is-open');
});

const fileSelect = document.getElementById("fileSelect");
const fileElem = document.getElementById("fileElem");

fileSelect.addEventListener("click", (e) => {
  if (fileElem) {
    fileElem.click();
  }
}, false);
