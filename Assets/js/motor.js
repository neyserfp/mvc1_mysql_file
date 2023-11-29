function deshabilitarControl1(control1)
{
    control1.classList.remove("boton1");
    control1.classList.add("boton1Inhabilitado");
    control1.disable = true;
}

function habilitarControl1(control1)
{
    control1.classList.remove("boton1Inhabilitado");
    control1.classList.add("boton1");
    control1.disable = false;
}

/* INICIO - ajaxPost1 - Devuelve el resultado a un DIV (POST) */
function ajaxPost1(form1, controlador1, div1)
{

  // 1.- Creación del objeto XMLHttpRequest (Ajax1)
  const Ajax1 = new XMLHttpRequest();

  // 2.- Enlace del formulario a un objeto FormData (FormData1)
  const FormData1 = new FormData( form1 );
  
  // 5.-Éxito en el envío
  Ajax1.addEventListener("load", function(event) {
    document.getElementById(div1.id).innerHTML = this.responseText;
  });
  
  // 5.-Error en el envío
  Ajax1.addEventListener("error", function( event ) {
    alert( 'Error: no se ha enviado la informacion' );
  } );
  
  // 3.-Configuración del envío del formulario a través del FormData
  Ajax1.open("POST", controlador1);
  
  // 4.-Envío del formulario a través del FormData
  Ajax1.send( FormData1 );
  
}
/* FIN - ajaxPost1 - Devuelve el resultado a un DIV (POST) */

/* INICIO - ajaxPost2 - Devuelve el resultado a una Alert (POST) */
function ajaxPost2(form1, controlador1, div1)
{

  // 1.- Creación del objeto XMLHttpRequest (Ajax1)
  const Ajax1 = new XMLHttpRequest();

  // 2.- Enlace del formulario a un objeto FormData (FormData1)
  const FormData1 = new FormData( form1 );
  
  // 5.-Éxito en el envío
  Ajax1.addEventListener("load", function(event) {
    alert(this.responseText);
  });
  
  // 5.-Error en el envío
  Ajax1.addEventListener("error", function( event ) {
    alert( 'Error: no se ha enviado la informacion' );
  } );
  
  // 3.-Configuración del envío del formulario a través del FormData
  Ajax1.open("POST", controlador1);
  
  // 4.-Envío del formulario a través del FormData
  Ajax1.send( FormData1 );
  
}
/* FIN - ajaxPost2 - Devuelve el resultado a una Alert (POST) */

/* INICIO - ajaxGet1 - Devuelve el resultado a un DIV (GET) */
function ajaxGet1(controlador1, div1) {
 
  let ajax1 = new XMLHttpRequest();
  ajax1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
    {
      document.getElementById(div1.id).innerHTML = this.responseText;
    }
  };
  ajax1.open("GET", controlador1, true);
  ajax1.send();

}
/* FIN - ajaxGet1 - Devuelve el resultado a un DIV (GET) */

function seleccionarDatos1(form1, boton1, controlador1, div1)
{    
    deshabilitarControl1(boton1);
    ajaxPost1(form1,controlador1,div1);
    habilitarControl1(boton1);
    form1.reset();
}

function seleccionarDatos2(form1, boton1, controlador1, div1)
{
  deshabilitarControl1(boton1);
  ajaxGet1(controlador1, div1);
  habilitarControl1(boton1);
  form1.reset();
}

function seleccionarDatos3(form1, boton1, controlador1, div1)
{
  deshabilitarControl1(boton1);
  ajaxGet1(controlador1+'?valor=' + campo1.value, div1);
  //ajaxGet1('Controllers/Buscador1Controller.php?valor=' + campo1.value, divResultado1.id);
  habilitarControl1(boton1);
  form1.reset();
}

function insertarDatos1(form1, boton1, controlador1, div1)
{      
  deshabilitarControl1(boton1);
  // Opcion 1: El mensaje se muestra en un div (ajaxPost1)
  ajaxPost1(form1,controlador1,div1);
  // Opcion 2: El mensaje se muestra en una alert (ajaxPost2)
  // ajaxPost2(form1,controlador1,div1);
  habilitarControl1(boton1);
  form1.reset();
}

window.addEventListener('load', function(){

  let boton1;
  let boton2;
  let controlador1;
  let controlador2;
  let div1;
  let div2;

  /* INICIO  - Enter tras escribir en el campo buscar */
  /*
  const botonConsulta1 = document.getElementById('botonConsulta1');
  if(botonConsulta1)
  {
    botonConsulta1.addEventListener('keydown', (e) => {
      if(e.key === 'Enter')
      {
        buscar1(botonConsulta1);
      }
    });     
  }
  */
  /* FIN  - Enter tras escribir en el campo buscar */

  /* ---------------------------------- INICIO - (submit) Seleccionar 1 */
  // Paso 1: Obtener referencias:
  const formConsulta1 = document.getElementById("formConsulta1");
  // Paso 2 - Asociación del elemento al evento (submit) y llamada a la función
  if(formConsulta1)
  {
    // Referencia de los elementos
    boton1 = document.getElementById("botonConsulta1");
    controlador1 = "Controllers/Consulta1Controller.php";
    div1 = document.getElementById("contenedor2");
    // Evento y llamada a la función
    formConsulta1.addEventListener("submit", function(event){
      event.preventDefault();
      seleccionarDatos1(formConsulta1,boton1,controlador1,div1);
    });
  }
  /* ---------------------------------- FIN - (submit) Seleccionar 1 */

  /* ---------------------------------- INICIO - (click) Seleccionar 2 */
  // Paso 1 - Referencia del elemento que tiene asociado el evento
  const botonConsulta2 = document.getElementById("botonConsulta2");
  // Paso 2 - Asociación del elemento al evento y llamada a la función
  if(botonConsulta2)
  {
    // Referencia de los elementos
    controlador2 = "Controllers/Consulta2Controller.php";
    div2 = document.getElementById("contenedor2");
    // Evento y llamada a la función
    botonConsulta2.addEventListener("click", function(event){
      event.preventDefault();
      seleccionarDatos2(formConsulta1,botonConsulta2,controlador2,div2);
    });
  }
  /* ---------------------------------- FIN - (click) Seleccionar 2 */

  /* ---------------------------------- INICIO - (submit) Insertar 1 */
  // Paso 1: Obtener referencias:
  const formInsercion1 = document.getElementById("formInsercion1");
  // Paso 2 - Asociación del elemento al evento (submit) y llamada a la función
  if(formInsercion1)
  {
    // Referencia de los elementos
    boton1 = document.getElementById("botonInsercion1");
    controlador1 = "Controllers/Insercion1Controller.php";
    div1 = document.getElementById("contenedor2");
    // Evento y llamada a la función
    formInsercion1.addEventListener("submit", function(event){
      event.preventDefault();
      insertarDatos1(formInsercion1,boton1,controlador1,div1);
    });
  }
  /* ---------------------------------- FIN - (submit) Insertar 1 */

  /* ---------------------------------- INICIO - (submit) Insertar 2 */
  // Paso 1: Obtener referencias:
  const formInsercion2 = document.getElementById("formInsercion2");
  // Paso 2 - Asociación del elemento al evento (submit) y llamada a la función
  if(formInsercion2)
  {
    // Referencia de los elementos
    boton1 = document.getElementById("botonInsercion2");
    controlador1 = "Controllers/InsercionConsulta1Controller.php";
    div1 = document.getElementById("contenedor2");
    // Evento y llamada a la función
    formInsercion2.addEventListener("submit", function(event){
      event.preventDefault();
      insertarDatos1(formInsercion2,boton1,controlador1,div1);
    });
  }
  /* ---------------------------------- FIN - (submit) Insertar 2 */

    /* ---------------------------------- INICIO - (submit) Insertar 3 */
  // Paso 1: Obtener referencias:
  const formInsercion3 = document.getElementById("formInsercion3");
  // Paso 2 - Asociación del elemento al evento (submit) y llamada a la función
  if(formInsercion3)
  {
    // Referencia de los elementos
    boton1 = document.getElementById("botonInsercion3");
    controlador1 = "Controllers/InsercionDeclaracionesPreparadas1Controller.php";
    div1 = document.getElementById("contenedor2");
    // Evento y llamada a la función
    formInsercion3.addEventListener("submit", function(event){
      event.preventDefault();
      insertarDatos1(formInsercion3,boton1,controlador1,div1);
    });
  }
  /* ---------------------------------- FIN - (submit) Insertar 3 */

  /* ---------------------------------- INICIO - (submit) Insertar y subir archivos 1 */
  // Paso 1: Obtener referencias:
  const formSubidaArchivos1 = document.getElementById("formSubidaArchivos1");
  // Paso 2 - Asociación del elemento al evento (submit) y llamada a la función
  if(formSubidaArchivos1)
  {
    // Referencia de los elementos
    boton1 = document.getElementById("botonInsercion1");
    controlador1 = "Controllers/InsercionConSubidaDeArchivos1Controller.php";
    div1 = document.getElementById("contenedor2");
    // Evento y llamada a la función
    formSubidaArchivos1.addEventListener("submit", function(event){
      event.preventDefault();
      insertarDatos1(formSubidaArchivos1,boton1,controlador1,div1);
    });
  }
  /* ---------------------------------- FIN - (submit) Insertar y subir archivos 1  */

});