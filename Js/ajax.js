(function($) {

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

  $(document).on("change", ".product_quantity input", function(e) {
    let title = $(this).parent().siblings('.product_name').text();
    console.log(title);
    setTimeout(
      function(){
       console.log("test");
     }, 1000);


  });



})(jQuery)
