<?php
class Sugerencia{

    /** *
     * Función que muestra las sugerencias
     * @param type $ciudades
     * @param type $ciudad
     */
    public static function muestraSugerencias($ciudades, $ciudad){
        $cadena = "";
        
        //recorre el array con las ciudades
        foreach ($ciudades as $item => $valor){
            if(stristr($ciudad, substr($item, 0, strlen($ciudad)))){
                if($cadena == ""){
                    $cadena = $item;
                }
                else{
                    $cadena .= ", $item";
                }
            }
            
        }
        
        //pinta los resultado
        if($cadena == ""){
            echo "No existe sugerencias";
        }
        else{
            echo $cadena;
        }
        
        
    }
    

}// fin de la clase
?>

