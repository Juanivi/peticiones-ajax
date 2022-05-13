<?php

include('logica.php');

//si se ha enviado la ciuad
if(filter_input(INPUT_POST, 'ciudad')){
    
    //almacena la ciudad en la variable
    $ciudad = filter_input(INPUT_POST, 'ciudad');
    
    //si la variable ciudad está vacia
    if (empty($ciudad)) {
        echo "Sin ciudad";
    } 
    else {
        //pasa a minuscula 
        $cadena = strtolower($ciudad);

        //compruba si la ciudad existe en el array de ciudades
        if (!isset($ciudades[$cadena])) {
            echo "<p id='error'>La ciudad no esta en la lista</p>";;
        } 
        else {
            //guarda en ciudad el valor(key) del elemento del array
            $ciudad = $ciudades[$cadena];

            //especifica la zona horaria 
            date_default_timezone_set("Europe/$ciudad");

            //muestra la hora
            echo date("H:i:s");
        }
    }
}
?>
