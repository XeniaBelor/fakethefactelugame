javascript: (function(e, s) {
  e.src = s;
  e.onload = function() {
      jQuery.noConflict();
      console.log('jQuery injected');
  };
  document.head.appendChild(e);
})(document.createElement('script'), 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')

$(document).ready(function() {
    $("#username").keyup(validate);
  });
  
  function validate() {
    var username = $("#username").val();
    var specialchar = "/[!\'^£$%&*()}{@#~?><>,|=_+¬-]/";
    if(specialchar.test(str) == username) {
         $("#validate-status2").text("Username available");        
      }
      else {
          $("#validate-status2").text("You can not add specia character like /[!\'^£$%&*()}{@#~?><>,|=_+¬-]/");  
      }
} 