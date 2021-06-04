$(function () {
  $('#update').on('click', function () {

    var id = $('#program_id').val();
    var clock = document.getElementById('clock').innerText;

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/program/' + id + '/twitter/timeline',
      type: 'GET',
      data: {

        'id': id,
        'clock': clock, 

      },
      dataType: 'json',
    })
      .done(function (data) {
        console.log(data);
        $('#tweet').find('.tweet-visible').remove();

        for (var i = 0; i < data.statuses.length; i++) {
          var tweetClone = $('#tweetlist').clone(true).removeAttr('style').addClass('tweet-visible');
          tweetClone.find('#text').first().append(data.statuses[i].text);
          

          $('#tweet').append(tweetClone);
        }
      })

      .fail(function (data) {

      })
  });
});