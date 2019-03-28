javascript: (function(e, s) {
  e.src = s;
  e.onload = function() {
      jQuery.noConflict();
      console.log('jQuery injected');
  };
  document.head.appendChild(e);
})(document.createElement('script'), 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')

$(document).ready(function() {
    $("#password2").keyup(validate);
  });
  
  function validate() {
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();
      if(password1 == password2) {
         $("#validate-status").text("Passwords match!");        
      }
      else {
          $("#validate-status").text("Invalid.Password do not match!");  
      }
} 