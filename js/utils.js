function msg_alert(msg = "", type = "danger") {
  //Si no, nos agrega un cartel de error.
  $(".container").before(
    '<div id="msg-alert" class="alert alert-' +
      type +
      ' d-flex align-items-center" role="alert" style="border: 3px solid white"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="' +
      type +
      '"></svg><div>' +
      msg +
      "</div></div>"
  );
  //Y elimina el cartel luego de 5 seg.
  setTimeout(function () {
    $("#msg-alert").remove();
  }, 5000);
}

function addUser() {
  let form = $("#form_usuario");
  //Es la comunicación del usuario al servidor.
  dataPersona = {
    nombre_persona: form.find("#nombre_persona").val(),
    apellido_persona: form.find("#apellido_persona").val(),
    fnacimiento_persona: form.find("#fnacimiento_persona").val(),
    sexo_persona: form.find("#sexo_persona").val(),
    mail_persona: form.find("#mail_persona").val(),
    pass_persona: form.find("#pass_persona").val(),
  };

  $.ajax({
    url: "./db/submitForm.php",
    type: "POST", //Tipo de método
    data: dataPersona, //Dato enviado por POST al PHP
    dataType: "JSON", //Tipo de respuesta
    success: function (data) {
      //Si todo sale bien el servidor responde.
      //Si la respues es satifactoria.
      if (data.respuesta == "success") {
        msg_alert("Se eliminó correctamente", "success");
        //Se elimina el comentario de la pantalla.
        //Para no tener que recargar toda la página.
        $("#comment-" + id).remove();
        //Si la cantidad de comentarios es mayor a cero
        if ($("#count-number").length > 0) {
          //Se actualiza el número de comentarios.
          var currentCount = parseInt($("#count-number").text());
          var newCount = currentCount - 1;
          $("#count-number").text(newCount);
        }
      } else {
        //Si no, nos agrega un cartel de error.
        $(".container").before(
          '<div id="msg-error" class="alert alert-danger d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="danger:"></svg><div>No se pudo eliminar el comentario</div></div>'
        );
        //Y elimina el cartel luego de 5 seg.
        setTimeout(function () {
          $("#msg-error").remove();
        }, 5000);
      }
    },
  });
}
