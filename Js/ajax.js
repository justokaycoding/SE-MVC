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
        url: 'getData.php',
        type: 'post',
        data: {
          title: title
        },
        success: function(response) {
          console.log(response);
          alert(title + 'add to cart');
        },
        error: function() {
          alert('There was some error performing the AJAX call!');
        }
      });
    }

  });


})(jQuery)
