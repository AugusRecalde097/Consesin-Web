const toastLiveExample = document.getElementById('liveToast')
const toast = new bootstrap.Toast(toastLiveExample)

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
        var form = document.createElement("form");
        var nombrePersona_input = document.createElement("input"); 
        nombrePersona_input.value = dataPersona.nombre_persona;
        nombrePersona_input.name = 'nombre_persona';
        nombrePersona_input.id = 'nombre_persona';
    
        form.method = "POST";
        form.action = "./ver_pag_bienvenida.php";
        form.id = "bienvenido";
        form.style.display = 'nome';

        form.appendChild(nombrePersona_input);
        document.body.appendChild(form);
    
        form.submit();
      } else {
          toast.show();
      }
    },
  });
}
 

function addSintomas() {
  let form = $("#form_sintomas");
  console.log(form);
  return;
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
    url: "./db/submitForm_sintomas.php",
    type: "POST", //Tipo de método
    data: dataPersona, //Dato enviado por POST al PHP
    dataType: "JSON", //Tipo de respuesta
    success: function (data) {
      //Si todo sale bien el servidor responde.
      //Si la respues es satifactoria.
      if (data.respuesta == "success") {
        var form = document.createElement("form");
        var nombrePersona_input = document.createElement("input"); 
        nombrePersona_input.value = dataPersona.nombre_persona;
        nombrePersona_input.name = 'nombre_persona';
        nombrePersona_input.id = 'nombre_persona';
    
        form.method = "POST";
        form.action = "./ver_pag_bienvenida.php";
        form.id = "bienvenido";
        form.style.display = 'nome';

        form.appendChild(nombrePersona_input);
        document.body.appendChild(form);
    
        form.submit();
      } else {
          toast.show();
      }
    },
  });
}
 
 