<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Relojes del mundo</title>
        <link rel="stylesheet" href="css/estilo.css">

        <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="contenedor">
            
            <!-- DIV con la hora de Sevilla -->
            <div class="sevilla">
                <h1>Hora de la ciudad de Sevilla</h1>
                <div id="hora" class="cont-hora"></div>
            </div>

            <!-- DIV que contine el campo de texto y boton y el DIV con la hora de la ciudad -->
            <div class="formulario">
                <h1>Hora de la ciudad de <span id="nomCiudad"></span></h1>

                <div class="botones">
                    <p id="eti">Escribe la ciudad</p>
                    <input type="text" name="ciudad" id="ciudad" onkeyup="buscaSugerencia(this.value)" >
                    <input type="button"  id="boton"  value="Seleccionar"/>
                </div>
                <p class="sugerencia">Sugerencia: <span id="textoBuscar"></span></p>


                <div id="horaCiudad" class="cont-hora hora"></div>
            </div>
        </div>
    </body>

</html>

