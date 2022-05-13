/** *
 * Función para mostrar las sugerencias de las ciudades
 * @param {type} cadenaTexto
 * @returns {undefined}
 */
function buscaSugerencia(cadenaTexto) {
    if (cadenaTexto.length === 0) {
        document.getElementById("textoBuscar").innerHTML = "";
        return;
    } else {
        //AJAX
        //Creamos un objeto XMLHttpRequest
        let xmlhttp = new XMLHttpRequest();
        
        //Funcion que cambia el estado
        xmlhttp.onreadystatechange = function () {
            
            //pintamos la sugerencia
            document.getElementById("textoBuscar").innerHTML = this.responseText;
        };
        //console.log(cadenaTexto);

        //Envia la solicitud a un archivo PHP en el servidor, el parámetro q se agrega a la url (logica.php? q = "+ cadenaTexto)
        xmlhttp.open("GET", "logica.php?q=" + cadenaTexto);
        xmlhttp.send();
    }
}


//variable que alamcena el id de la función setInterval
let idIntervalo;

//Al cargar la página
$(document).ready(function () {

    //Ejecuta la función setInterval: se le pasa la función hora que muestra la hora de sevilla, y los milisegundos
    setInterval(hora, 1000);


    //Al hacer clic en el botón después de escribir la ciudad
    $('#boton').on('click', function () {

        //llama a la función que pone en marcha el reloj de la ciudad escrita en el campo de texto
        funcionamientoRelojCiudad();

    });

    //Si ha pulsado la tecla enter al escribir la ciudad
    $('#ciudad').keypress(function (e) {
        
        //si se ha pulsado la tecla enter
        if (e.which === 13) {

            //llama a la función que pone en marcha el reloj de la ciudad escrita en el campo de texto
            funcionamientoRelojCiudad();
        }
    });

});



/** *
 * Función que muestra la hora de la ciudad de sevilla
 * 
 * @returns {undefined}
 */
function hora() {
    $.ajax({
        type: "post",
        url: "horaSevilla.php",
        success: function (response) {
            $("#hora").html(response);
        }
    });
}



/** *
 * Función que muestra la hora de una ciudad concreta
 * @param {strig} ciudad nombre de la ciudad
 * @returns {undefined}
 */
function horaCiudad(ciudad) {
    let parametro = {
        "ciudad": ciudad
    };
    $.ajax({
        data: parametro,
        url: 'hora.php',
        type: 'post',

        success: function (response) {
            $("#horaCiudad").html(response);
            console.log(response);

        }
    });

}


/** *
 * Función que pone en marcha el reloj de la ciudad escrita en el campo de texto
 * Esta función primero para el setInterval, luego recoge el nombre de la ciudad y pone en el título
 * la primera letra de la ciudad en mayuscula.
 * Luego llama a la función setInterval y le pasa la ciudad y los milisegundos para actualizarse.
 * 
 * @returns {undefined}
 */
function funcionamientoRelojCiudad() {
    //para el setInterval   
    clearInterval(idIntervalo);

    //obtengo la ciudad tecleada y la convierte a minuscula
    let ciudad = $("#ciudad").val().toLowerCase();

    //comprueba si no se ha tecleado el nombre de la ciudad. 
    if (ciudad === "") {
        document.getElementById('nomCiudad').innerHTML = "";
    }
    else {     
        //pone en mayuscula la primera letra
        document.getElementById('nomCiudad').innerHTML = ciudad[0].toUpperCase() + ciudad.slice(1);
    }

    //actualizo la función cada 1 segundo
    idIntervalo = setInterval(horaCiudad, 1000, ciudad);
}

