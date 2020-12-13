//VALIDACIÓN DEL NOMBRE
nombre = document.getElementById("nombre");
nombre.addEventListener('keyup', convertir_nombre);
nombre.addEventListener('keyup', comprobar_nombre);

function convertir_nombre() {
      var palabra = nombre.value;
      var mayuscula = palabra.substring(0,1).toUpperCase();
      if (palabra.length > 0){
        var minuscula = palabra.substring(1).toLowerCase();
      }
      nombre.value = mayuscula.concat(minuscula);
    }

function comprobar_nombre(){
  if (nombre.value.match("^[a-zA-ZÀ-ÿ\s]{1,40}$")) {
    error_nombre.innerHTML = "";
  }else{
    error_nombre.innerHTML = "El nombre no es correcto, no puede contener números";
  }
}
//VALIDACION DE LOS APELLIDOS
apellidos = document.getElementById("apellidos");
apellidos.addEventListener('keyup', comprobar_apellidos);

function comprobar_apellidos(){
  if (apellidos.value.match("^[a-zA-ZÀ-ÿ\s]{1,40}$")) {
    error_apellidos.innerHTML = "";
  }else{
    error_apellidos.innerHTML = "Los apellidos no son correctos, no puede contener números";
  }
}

//VALIDACIÓN DEL TELEFONO
telefono = document.getElementById("telefono");
telefono.addEventListener('keyup', comprobar_telefono);

function comprobar_telefono(){
  if (telefono.value.match("^([0-9]{9})")) {
    error_telefono.innerHTML = "";
  }else{
    error_telefono.innerHTML = "Solo se permite un maximo de 9 números";
  }
}

//VALIDACIÓN EMAIL
email = document.getElementById("email");
email.addEventListener('keyup', comprobar_email);

function comprobar_email(){
  if (email.value.match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$")) {
    error_email.innerHTML ="";

  }else{
    error_email.innerHTML = "El email introducido no es valido";
  }
}

//VALIDACIÓN DE CAPTCHAR INTRODUCIDO
captcha = document.getElementById("captcha");
captcha_respuesta = document.getElementById("captcha_respuesta");
captcha_respuesta.addEventListener('keyup', comprobar_captchar);

function comprobar_captchar(){
  if (captcha.value == captcha_respuesta.value) {
    error_captchar.innerHTML ="";

  }else{
    error_captchar.innerHTML = "El captchar no coincide";
  }
}
