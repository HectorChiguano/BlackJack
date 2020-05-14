<?php

// funcion que crea los jugadores 

function crearJugadores(){
        
    for($j=0;$j<4;$j++){
             
       $jugador["jugador$j"]=array();
 
    }
    return $jugador;

}



//funcion que enlaza los jugadores con el reparto de cartas
    function jugadorCarta($arrayjugador,$arrayRepartir){
        $aux=0;
        foreach($arrayjugador as $clave=>$valor){
            
            for($j=0;$j<count($arrayRepartir);$j++){
                    $jugadorJugada[$clave]=array_slice($arrayRepartir, $aux,2);  
                }
                $aux+=2;
        }
       
        return $jugadorJugada;

    }

function computadora($repartir){

    
        for($i=0;$i<count($repartir);$i++){
                $maquina['maquina']=array_slice($repartir, 8);
        }
        //var_dump($maquina);
        return $maquina;
      
}

   
// funcion que nos crea la baraja con los 52 numeros 
    function crearBaraja($arraytipo , $arrayEpeciales){
      
        $arrayBarajas=array();

        // creamos numeros del 2 al 40
        foreach($arraytipo as $indice=>$valor){
            
            for($i=2;$i<=10;$i++){
                    
                array_push($arrayBarajas, $i.$valor);
            }
           
        }

        // con array_push introducimos las cartas especiales
        foreach($arraytipo as $indice=>$fila){
          
            foreach($arrayEpeciales as $indice=>$columna){
                
                array_push($arrayBarajas, $columna.$fila);
                
            }
          
        }

      
        return $arrayBarajas;

    }

    
    //funcion que nos devuelve una carta y elimina la pisicion del array
    function repartirCarta($arrayBaraja){
        //shuffle($arrayBaraja);
        
        for($i=0;$i<10;$i++){
            $repetir[$i]=array_shift($arrayBaraja);
        }
        return $repetir;

    }


    

    //funcion que evalua la carta 

    function evaluarCarta($aux){

        //el metodo substr <- nos extrae del valor el numero entre 0 y el tamaño de la variable -1
        $valor=substr($aux, 0, strlen($aux)-1);
        $puntos = 0;
        // 2 = 2 10 = 10 3 = 3
        //echo $aux;
        //la J Q K <- valen 10 puntos
        // la A <- vale 11
        
        if($valor == 'J' || $valor == 'Q' || $valor == 'K'){
                $puntos=10;
        }else if($valor == 'A'){
                $puntos=11;
              }else{
                $puntos=(int)$valor;
                }

        return $puntos;

    }

    function crearFichero($jugadores){

        $archivo=fopen("saldo.txt","w+");
        $nombreExiste="saldo.txt";

        $dinero=1;
        if(file_exists($nombreExiste)){

            echo "El fichero de saldo.txt no existe, por lo que se crea";

            foreach($jugadores as $clave=>$valor){
                fwrite($archivo,$clave."#".str_pad($dinero,4,"0",STR_PAD_RIGHT)."\n");
            }
            
           
        }

        fclose($archivo);
        // //escribe en el documento
        // fwrite(,);
        // // lee caracter a caracter un fichero
        // fgetc();

        // // lee un 
        // fgets();
        
        // fclose();
    }
   

?>