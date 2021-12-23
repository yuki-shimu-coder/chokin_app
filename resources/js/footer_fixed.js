$(function () {
  //フッターを最下部に固定
  let $footer = $('#l-footer');
  if (window.innerHeight > $footer.offset().top + $footer.outerHeight()) {
    $footer.attr({ 'style': 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) + 'px;' });
  }
})