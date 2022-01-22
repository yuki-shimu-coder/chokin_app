$(function () {
  $('.flash_message').slideToggle();
  // ５秒後にしまう
  setTimeout(() => {
    $('.flash_message').slideToggle();
  }, 5000);
});