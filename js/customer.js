//const aInscrito = document.querySelector("#btnAlumnoInscrito");
//aInscrito.addEventListener("click", (event) => {
//let mostrarProgressBar = document.getElementById("mostrarProgressBar");
//mostrarProgressBar.style.display="block";
//mostrarBaucher.style.marginTop="-300px";
/*mostrarBaucher.margin:auto;
      mostrarBaucher.padding:0px;*/
//});

function metodoPago() {
  let mpdeposito = document.getElementById("depositoInfo");
  let mptransferencia = document.getElementById("transferenciaInfo");

  if (document.getElementById("deposito").checked == true) {
    mpdeposito.style.display = "block";
    mptransferencia.style.display = "none";
  }

  if (document.getElementById("transferencia").checked == true) {
    mptransferencia.style.display = "block";
    mpdeposito.style.display = "none";
  }
}

function metodoPagoExiste() {
  let mpdepositoExiste = document.getElementById("depositoInfoExiste");
  let mptransferenciaExiste = document.getElementById(
    "transferenciaInfoExiste"
  );

  if (document.getElementById("depositoExiste").checked == true) {
    mpdepositoExiste.style.display = "block";
    mptransferenciaExiste.style.display = "none";
  }

  if (document.getElementById("transferenciaExiste").checked == true) {
    mptransferenciaExiste.style.display = "block";
    mpdepositoExiste.style.display = "none";
  }
}

const selectElement = document.querySelector("#tipoAlumno");
selectElement.addEventListener("change", (event) => {
  let alumnoNuevo = document.getElementById("alumnoNuevo");
  let alumno = document.getElementById("alumno");
  let parametro = event.target.value;
  if (parametro == 1) {
    alumnoNuevo.style.display = "block";
    alumno.style.display = "none";
  } else if (parametro == 2) {
    alumno.style.display = "block";
    alumnoNuevo.style.display = "none";
  } else if (parametro == 0) {
    alumno.style.display = "none";
    alumnoNuevo.style.display = "none";
  }
});

var input = document.querySelector("#mypic");

input.onchange = function () {
  // relaciono el id con un evento de cambio
  var file = input.files[0];
  //upload(file);
  document.getElementById("mostrar-foto").style.display = "block";
  drawOnCanvas(file);
};

function drawOnCanvas(file) {
  var reader = new FileReader();
  reader.onload = function (e) {
    var dataURL = e.target.result,
      c = document.querySelector("#mostrar-foto"), // see Example 4
      ctx = c.getContext("2d"),
      img = new Image();

    img.onload = function () {
      c.width = img.width;
      c.height = img.height;
      ctx.drawImage(img, 0, 0);
    };
    img.src = dataURL;
  };

  reader.readAsDataURL(file);
}

// segundo upload de baucher
var baucher = document.querySelector("#baucher");

baucher.onchange = function () {
  // relaciono el id con un evento de cambio
  var bau = baucher.files[0];
  document.getElementById("mostrar-baucher").style.display = "block";
  //uploadBaucher(bau);
  drawOnCanvasBaucher(bau);
};

function drawOnCanvasBaucher(bau) {
  var reader = new FileReader();
  reader.onload = function (e) {
    var dataURL = e.target.result,
      c = document.querySelector("#mostrar-baucher"), // see Example 4
      ctx = c.getContext("2d"),
      img = new Image();

    img.onload = function () {
      c.width = img.width;
      c.height = img.height;
      ctx.drawImage(img, 0, 0);
    };
    img.src = dataURL;
  };

  reader.readAsDataURL(bau);
}

function validacionNuevo() {
  let telefonoNuevoAlumno = document.getElementById("telefonoNuevo").value;
  let celularNuevoAlumno = document.getElementById("celularNuevo").value;

  telefonoNuevoAlumno = telefonoNuevoAlumno.trim();
  celularNuevoAlumno = celularNuevoAlumno.trim();

  if (telefonoNuevoAlumno == celularNuevoAlumno) {
    alert(
      "El tel??fono de casa del Alumno y el celular deben de ser diferentes"
    );
    return false;
  }

  let telefonoTutor = document.getElementById("telefonoTutor").value;
  let celularTutor = document.getElementById("celularTutor").value;
  if (telefonoTutor == celularTutor) {
    alert("El tel??fono  y el celular del Tutor deben de ser diferentes");
    return false;
  }

  if (document.getElementById("deposito").checked == true) {
    let afiliacion = document.getElementById("afiliacion").value;
    if (afiliacion == "") {
      alert("Debe de agregar un n??mero de afiliaci??n");
      document.getElementById("afiliacion").focus();
      return false;
    }

    let autorizacion = document.getElementById("autorizacion").value;
    if (autorizacion == "") {
      alert("Debe de agregar un n??mero de autorizaci??n");
      document.getElementById("autorizacion").focus();
      return false;
    }
  }

  if (document.getElementById("transferencia").checked == true) {
    let clave_rastreo = document.getElementById("clave_rastreo").value;
    if (clave_rastreo == "") {
      alert("Debe de agregar un n??mero de clave_rastreo");
      document.getElementById("clave_rastreo").focus();
      return false;
    }

    let referencia = document.getElementById("referencia").value;
    if (referencia == "") {
      alert("Debe de agregar un n??mero de referencia");
      document.getElementById("referencia").focus();
      return false;
    }
  }

  return true;
}

function validacionExiste() {
  if (document.getElementById("depositoExiste").checked == true) {
    let afiliacionExiste = document.getElementById("afiliacionExiste").value;
    if (afiliacionExiste == "") {
      alert("Debe de agregar un n??mero de afiliaci??n");
      document.getElementById("afiliacionExiste").focus();
      return false;
    }

    let autorizacionExiste =
      document.getElementById("autorizacionExiste").value;
    if (autorizacionExiste == "") {
      alert("Debe de agregar un n??mero de autorizaci??n");
      document.getElementById("autorizacionExiste").focus();
      return false;
    }
  }

  if (document.getElementById("transferenciaExiste").checked == true) {
    let clave_rastreoExiste = document.getElementById(
      "clave_rastreoExiste"
    ).value;
    if (clave_rastreoExiste == "") {
      alert("Debe de agregar un n??mero de clave_rastreo");
      document.getElementById("clave_rastreoExiste").focus();
      return false;
    }

    let referenciaExiste = document.getElementById("referenciaExiste").value;
    if (referenciaExiste == "") {
      alert("Debe de agregar un n??mero de referencia");
      document.getElementById("referenciaExiste").focus();
      return false;
    }
  }
}

function cerrarVentana() {
  let mostrarBaucher = document.getElementById("mostrarBaucher");
  mostrarBaucher.style.display = "none";
  mostrarBaucher.innerHTML = "";
}

function mostrarBaucher(ruta) {
  let mostrarBaucher = document.getElementById("mostrarBaucher");

  mostrarBaucher.style.display = "block";
  mostrarBaucher.style.marginTop = "-600px";

  $("#mostrarBaucher").append(
    '<div class="container">\
          <div class="row">\
          <div class="col-md-3">\
          </div>\
          <div class="col-md-6">\
          <div class="text-right"><a href="#" onclick="cerrarVentana()"><span class="btnCerrarVentana">Cerrar[x]</span></a></div>\
            <img class="img-fluid" src="' +
      ruta +
      '">\
          </div>\
          <div class="col-md-3">\
          </div>\
            </div>\
          </div>'
  );
}

function aplicarPago(idRegistro, url) {
  let confirmar = confirm("??Confirmar el pago de este registro?");

  if (confirmar == true) {
    $.ajax({
      type: "POST",
      url: url,
      data: { idRegistro: idRegistro },
      success: function (text) {
        limpio = text.trim();
        if (limpio == "exito") {
          alert("Se modifico exitosamente");
        } else {
          alert(
            "No se pudo modificar, consulte con el administrador del sistema"
          );
        }
      },
    });
  }
}
