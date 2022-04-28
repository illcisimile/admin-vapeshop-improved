$(document).ready(function () {
  $("#login-form")
    .unbind("submit")
    .bind("submit", function () {
      let form = $(this);

      let username = $("#username").val();
      let password = $("#password").val();

      if (username && password) {
        $.ajax({
          url: form.attr("action"),
          type: form.attr("method"),
          data: form.serialize(),
          dataType: "json",
          success: function (response) {
            if (response.success) {
              $(".message")
                .html('<div class="alert alert-success" role="alert">' + response.message + "</div>")
                .show()
                .delay(500)
                .fadeOut("fast");

              setTimeout("location.href = 'index.php'", 1000);
            } else {
              console.log("Error");
            }
          },
        });
      }
      return false;
    });
});
