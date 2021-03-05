(function($) {
  var timerId;

  $(document).on("click", "label[for='signIn']", function(e) {
    $('#formSignUp input').removeAttr("required");
    $('#formSignIn input').prop('required', true);
  });

  $(document).on("click", "span.button.edit", function(e) {
    $(this).siblings('.productLightbox').toggleClass('active');
    $('body').toggleClass('lightbox');
  });

  $(document).on("click", "span.close.button", function(e) {
    $(this).closest('.productLightbox').toggleClass('active');
    $('body').toggleClass('lightbox');
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
      let product_remove = $(this).closest('td').siblings('.product_name').text();

      if (product_remove != '') {
        $.ajax({
          url: '../ajax_calls.php',
          type: 'post',
          data: {
            product_remove: product_remove
          },
          success: function(response) {
            let num = parseInt( $("span.cartCount").text() );
             $("span.cartCount").text(num - 1);
          },
          error: function() {
            console.log('There was some error performing the AJAX call!');
          }
        });
      }
      reload();
    }
  });

  $(document).on("click", ".amount .fa-plus", function(e) {
    let total = $(this).siblings('span.total').text();
    $(this).siblings('span.total').text( parseInt(total) + 1 );

    let product_add = $(this).closest('td').siblings('.product_name').text();

    if (product_add != '') {
      $.ajax({
        url: '../ajax_calls.php',
        type: 'post',
        data: {
          product_add: product_add
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

    reload();
  });

  $(document).on("click", ".cart .product_image .fa-times", function(e) {

    let product_total_remove = $(this).closest('td').siblings('.product_name').text();
    let total_remove = $(this).closest('td').siblings('.product_quantity').find('.total').text();

    if (product_total_remove != '') {
      $.ajax({
        url: '../ajax_calls.php',
        type: 'post',
        data: {
          product_total_remove: product_total_remove
        },
        success: function(response) {
          let num = parseInt( $("span.cartCount").text() );
          if(parseInt(num) > 0){
           $("span.cartCount").text(parseInt(num) - parseInt(total_remove));
           }
          location.reload();
        },
        error: function() {
          console.log('There was some error performing the AJAX call!');
        }
      });
    }

    // $(this).closest('tr').detach();
  });

  function reload(){
    clearTimeout(timerId);
    timerId = setTimeout(timerExpired, 2000);
  }

  function timerExpired() {
    location.reload();
  }

})(jQuery)
