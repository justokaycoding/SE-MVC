(function($) {
  var timerId;


  $(document).on("click", "label[for='signIn']", function(e) {
    $('#formSignUp input').removeAttr("required");
    $('#formSignIn input').prop('required', true);
  });

  $(document).on("click", "label[for='signUp']", function(e) {
    $('#formSignIn input').removeAttr("required");
    $('#formSignUp input').prop('required', true);
  });

  $(document).on("click", "article .button.add", function(e) {
    let title = $(this).siblings('.productTitle').text();
    $(this).siblings('.added').addClass('clicked');

    setTimeout(() => {
      $(this).siblings('.added').removeClass('clicked');
    }, 2000);

    if (title != '') {
      $.ajax({
        url: 'ajax_calls.php',
        type: 'post',
        data: {
          title: title
        },
        success: function(response) {
          let num = parseInt( $("span.cartCount").text() );
           $("span.cartCount").text(num + 1);
        },
        error: function() {
          console.log('There was some error performing the AJAX call!');
        }
      });
    }

  });

  $(document).on("click", ".amount .fa-minus", function(e) {
    let total = $(this).siblings('span.total').text();
    if(parseInt(total) > 1){
      $(this).siblings('span.total').text( total - 1 );
      reload();
    }
  });

  $(document).on("click", ".amount .fa-plus", function(e) {
    let total = $(this).siblings('span.total').text();
    $(this).siblings('span.total').text( parseInt(total) + 1 );
    console.log(total);

    reload();
  });

  $(document).on("click", ".product_image .fa-times", function(e) {
    $(this).closest('tr').detach();
  });

  function reload(){
    clearTimeout(timerId);
    timerId = setTimeout(timerExpired, 2000);
  }

  function timerExpired() {
    location.reload();
  }

})(jQuery)
