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
    e.preventDefault();
    let title = $(this).closest('.buttonWrap').siblings('.productTitle').text();
    $(this).siblings('.added').addClass('clicked');
    var $this = $(this);
    let ajaxnum;

    setTimeout(() => {
      $(this).siblings('.added').removeClass('clicked');
    }, 2000);

    if (title != '') {
      $.ajax({
        url: 'ajax_calls.php',
        dataType: 'text',
        type: 'POST',
        data: {
          title: title
        },
        success: function(response) {
          let num = parseInt($("span.cartCount").text());
          console.log(response);

          switch (response) {
            case 'true':
              ajaxnum = $this.closest('.buttonWrap').siblings('.productTitle').attr("data-quantity");
              console.log(num);
              ajaxnum = ajaxnum - 1;
              $this.closest('.buttonWrap').siblings('.productTitle').attr('data-quantity', ajaxnum);
              break;
            case 'false':
              if (!$this.closest('article').hasClass('soldOut')) {
                $this.closest('article').addClass('soldOut');
              }
              break;
          }
          if (ajaxnum >= 0) {
            $("span.cartCount").text(num + 1);
          }
        },
        error: function() {
          console.log('There was some error performing the AJAX call!');
        }
      });
    }

  });

  $(document).on("click", ".amount .fa-minus", function(e) {
    let total = $(this).siblings('span.total').text();
    if (parseInt(total) > 1) {
      $(this).siblings('span.total').text(total - 1);
      let product_remove = $(this).closest('td').siblings('.product_name').text();

      if (product_remove != '') {
        $.ajax({
          url: '../ajax_calls.php',
          type: 'post',
          data: {
            product_remove: product_remove,
            num: total
          },
          success: function(response) {
            let num = parseInt($("span.cartCount").text());
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
    let $this = $(this);

    let product_add = $(this).closest('td').siblings('.product_name').text();

    if (product_add != '') {
      $.ajax({
        url: '../ajax_calls.php',
        type: 'post',
        data: {
          product_add: product_add,
          num: total
        },
        success: function(response) {
          console.log(response)
          if (response == 'true') {
            let num = parseInt($("span.cartCount").text());
            $("span.cartCount").text(num + 1);
            $this.siblings('span.total').text(parseInt(total) + 1);
          } else {

          }
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
          product_total_remove: product_total_remove,
          num: total_remove
        },
        success: function(response) {
          location.reload();
        },
        error: function() {
          console.log('There was some error performing the AJAX call!');
        }
      });
    }
  });

  $(document).on("keyup", "input.seach", function(e) {
    if ($(this).val() && $(this).val() != '') {
      var textBits = $(this).val().indexOf(' ') >= 0 ? $(this).val().split(' ') : [$(this).val()];
      $('a.productTitle').each(function() {
        for (var i = 0; i < textBits.length; i++) {
          if ($(this).text().toLowerCase().indexOf(textBits[i].toLowerCase()) == -1) {
            $(this).closest('article').hide();
          } else {
            $(this).closest('article').show();
          }
        }
      });
    } else if ($(this).val() == '') {
      $('article').show();
    }
  });

  function reload() {
    clearTimeout(timerId);
    timerId = setTimeout(timerExpired, 2000);
  }

  function timerExpired() {
    location.reload();
  }


})(jQuery)
