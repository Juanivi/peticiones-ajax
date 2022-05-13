<?php

include('sugerencia.php');

//array con las ciudades
$ciudades = array('amsterdan' => 'Amsterdam', 'andorra' => 'Andorra', 'atenas' => 'Athens', 'belgrado' => 'Belgrade',
                  'berlin' => 'Berlin', 'bruselas' => 'Brussels', 'copenage' => 'Copenhagen', 'dublin' => 'Dublin', 
                  'gibraltar' => 'Gibraltar', 'helsinki' => 'Helsinki', 'estambul' => 'Istanbul', 'kaliningrad' => 'Kaliningrad',
                  'kiev' => 'Kiev', 'kirov' => 'Kirov', 'lisboa' => 'Lisbon', 'londres' => 'London', 'luxemburgo' => 'Luxembourg',
                  'madrid' => 'Madrid', 'malta' => 'Malta', 'monaco' => 'Monaco', 'moscu' => 'Moscow', 'oslo' => 'Oslo',
                  'paris' => 'Paris', 'praga' => 'Prague', 'riga' => 'Riga', 'roma' => 'Rome', 'sarajevo' => 'Sarajevo',
                  'saratov' => 'Saratov', 'estocolmo' => 'stockholm', 'tirana' => 'Tirane', 'vaticano' => 'Vatican',
                  'viena' => 'Vienna', 'volgrado' => 'Volgograd', 'varsovia' => 'Warsaw', 'zurich' => 'Zurich');
                  

//Si se ha pasado por get la solicitud
if(filter_input(INPUT_GET, 'q')){
    
    //asigna a la variable $ciudad la ciudad recibida por la url en la petición ajax
    $ciudad = filter_input(INPUT_GET, 'q');
    
    //llama a la función que muestra las sugerencias
    Sugerencia::muestraSugerencias($ciudades, $ciudad);
}

?>

