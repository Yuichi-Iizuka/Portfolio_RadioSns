$(function(){
  $('#like_btn').on('click',function(){
    var id = $(this).attr("product_id");
    var like_product = $(this).attr("like_product");

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: 'program.like',
      type: 'POST',
      data: {
        'id': id,
        'like_product' : like_product,
      },
    })
    .done(function(data)
    {
      if (data == 0)
      {
        $('#like_btn').attr('like_product','1');
        $('#like_btn').children().attr('class','fas fa-heart');
      }
      if (data == 1)
      {
        $('#like_btn').attr('like_product','0');
        $('#like_btn').children().attr('class','far fa-heart');
      }
    })
  });

});