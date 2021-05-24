/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/update.js ***!
  \********************************/
$(function () {
  $('#update').on('click', function () {
    var id = $('#program_id').val();
    var clock = $('#clock').val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/program/' + id + '/twitter/timeline',
      type: 'GET',
      data: {},
      dataType: 'json'
    }).done(function (data) {
      console.debug(data);
      $('#tweet').find('.tweet-visible').remove();

      for (var i = 0; i < data.result.length; i++) {
        var html = '<div class="tweet-visible"><div class="card mb-2"><div class="card-body"><div class="media"><img src="https://placehold.jp/70x70.png class="rounded-circle mr-4"><div class="media-body"><div class="media-body"><p class="mt-3 mb-0">${data.result[i].text}</p></div></div><div><div></div>';
        $('tweet').append(html);
      }
    }).fail(function (data) {});
  });
});
/******/ })()
;