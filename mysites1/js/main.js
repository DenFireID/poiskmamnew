$(function() {
  $('[data-report-id]').click(function() {
      $('#mainAvatar').attr('src', $(this).attr('src'));
      $('.report').hide();
      $('#' + $(this).attr('data-report-id')).show();
  });
});

$('.carousel').carousel({
  interval: 5000,
})

$('#subscribe').submit(function(e){
    e.preventDefault();
    $.ajax({
      url: "subscribe.php",
      type: "POST",
      data: $('#subscribe').serialize(),
      success: function(response) {
        alert("Ваше сообщение отправлено")
        //обработка успешной отправки
      },
      error: function(response) {
        alert("Произошла ошибка, повторите попытку позже")
        //обработка ошибок при отправке
     }
    });
});
