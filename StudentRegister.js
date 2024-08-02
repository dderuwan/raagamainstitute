// $(function () {
//     var code = "+19876543210"; // Assigning value from model.
//     $('#mobile').val(code);
//     $('#mobile').intlTelInput({
//         autoHideDialCode: true,
//         autoPlaceholder: "ON",
//         dropdownContainer: document.body,
//         formatOnDisplay: true,
//        // hiddenInput: "full_number",
//         initialCountry: "us",
//       //  nationalMode: true,
//         placeholderNumberType: "MOBILE",
//         preferredCountries: ['us','gb','in'],
//         separateDialCode: true
//     });
//     $('#btn-submit').on('click', function () {
//         var code = $("#mobile").intlTelInput("getSelectedCountryData").dialCode;
//         var phoneNumber = $('#mobile').val();
//       //  $('#mobile').val(code+phoneNumber);
//         //  alert('Country Code : ' + code + '\nPhone Number : ' + phoneNumber );
//         document.getElementById("code").innerHTML = code;
//         document.getElementById("mobile-number").innerHTML = phoneNumber;
//     });
// });




var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
    }
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);


