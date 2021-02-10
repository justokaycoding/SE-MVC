(function($) {

  $(document).on("click","label[for='signIn']",function(e) {
    $('#formSignUp input').removeAttr("required");
    $('#formSignIn input').prop('required',true);
  });

  $(document).on("click","label[for='signUp']",function(e) {
    $('#formSignIn input').removeAttr("required");
    $('#formSignUp input').prop('required',true);
  });

})(jQuery)
