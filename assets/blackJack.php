<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <title>BLACK JACK</title>
</head>
<body>
    <header class="titulo">BLACK JACK</header>

    <h2 id='baraja'> BARAJAS </h2>
    <div >
        <?php
            require('funciones.php');

            $tipo=array('C','D','H','S');
        
            $especial=array('A','J','Q','K');
            
            
            $arraybarajas=crearBaraja($tipo, $especial);
            //metodo que desordena un array         
            shuffle($arraybarajas);

            foreach($arraybarajas as $clave=>$valor){
                echo "<img id='cartas' src='imagenes/".$valor.".PNG'/>";
                
            }

            echo "<h3 id='jugadores'> JUGADORES </h3>";
            
            echo "<br>";
            $repartir=repartirCarta($arraybarajas);


            $jugadores=crearJugadores();
         

            $jugadorJugada=jugadorCarta($jugadores,$repartir);

            $compu=computadora($repartir);

            $arrayTotal=array_merge($jugadorJugada, $compu);

            foreach($arrayTotal as $clave=>$valor){
                echo "<h3>$clave</h3>";
                foreach($valor as $indice=>$carta)
                    echo "<img id='cartas' src='imagenes/".$carta.".PNG'/>";
                    
                echo "<br>";
            }

            foreach($arrayTotal as $clave=>$valor){
                echo "$clave tiene: ";
                foreach($valor as $indice=>$carta){
                    $numero+=evaluarCarta($carta);
                    
                }
                echo $numero;
                $numero=0;
              echo "<br>";
            }


            crearFichero($jugadores);
        ?>
    </div>
    
</body>
</html>