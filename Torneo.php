<?php

class Torneo{
    //atributos
    private $colPartidos;
    private $importePremio;

    //constructor
    

    function __construct($colPartidos, $importePremio) {
    	$this->colPartidos = [];
    	$this->importePremio = $importePremio;
    
    }

    public function getColPartidos() {
    	return $this->colPartidos;
    }

    public function getImportePremio() {
    	return $this->importePremio;
    }

    /**
    * @param $colPartidos
    */
    public function setColPartidos($colPartidos) {
    	$this->colPartidos = $colPartidos;
    }

    /**
    * @param $importePremio
    */
    public function setImportePremio($importePremio) {
    	$this->importePremio = $importePremio;
    }


    /**
     *Implementar el método ingresarPartido($OBJEquipo1, 
     *$OBJEquipo2, $fecha, $tipoPartido) en la  clase Torneo 
     *el cual recibe por parámetro 2 equipos, la fecha en la 
     *que se realizará el partido y si se trata de un partido 
     *de futbol o basquetbol . El método debe crear y retornar 
     *la instancia de la clase Partido que corresponda y 
     *almacenarla en la colección de partidos del Torneo. Se 
     *debe chequear que los 2 equipos tengan la misma categoría 
     *e igual cantidad de jugadores, caso contrario no podrá ser 
     *registrado ese partido en el torneo.  
     */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $categoriaE1 = $OBJEquipo1->getObjCategoria();
        $categoriaE2 = $OBJEquipo2->getObjCategoria();
        $cantJugadoresE1 = $OBJEquipo1->getCantJugadores();
        $cantJugadoresE2 = $OBJEquipo2->getCantJugadores();
        $objPartido = null;
        if(($categoriaE1->getDescripcion() == $categoriaE2->getDescripcion()) && $cantJugadoresE1 == $cantJugadoresE2){
            $colPartidosCopia = $this->getColPartidos();
            $i = count($colPartidosCopia)-1;
            $id = $colPartidosCopia[$i]->getIdpartido()+1;
            $cantGolesE1 = 0;
            $cantGolesE2 = 0;
            if($tipoPartido == "Futbol"){
                $objPartido = new PartidoFutbol($id, date("Y-m-d"), $OBJEquipo1, $cantGolesE1, $OBJEquipo2, $cantGolesE2, 0.5);
                $colPartidosCopia[] = $objPartido;
            }
            if($tipoPartido=="Basquetbol"){
                $infracciones = 0;
                $objPartido = new PartidoBasquetbol($id, date("Y-m-d"), $OBJEquipo1, $cantGolesE1, $OBJEquipo2, $cantGolesE2, 0.75, $infracciones);
                $colPartidosCopia[] = $objPartido;
            }
            $this->setColPartidos($colPartidosCopia);
        } 
        return $objPartido;
    }


    /**
     * Implementar el método darGanadores($deporte) en la clase 
     * Torneo que recibe por parámetro si se trata de un partido 
     * de fútbol o de básquetbol y en  base  al parámetro busca 
     * entre esos partidos los equipos ganadores ( equipo con 
     * mayor cantidad de goles). El método retorna una colección 
     * con los objetos de los equipos encontrados.
     */
    public function darGanadores($deporte){
        $arregloPartidosCopia = $this->getColPartidos();
        $colPartidosGanados = [];
        foreach($arregloPartidosCopia as $unPartido){
            if($deporte == "Futbol"){
                if($arregloPartidosCopia instanceof PartidoFutbol){
                    $colPartidosGanados[]= $arregloPartidosCopia->darEquipoGanador();
                }
            }elseif ($deporte == "Basquetbol"){
                if($arregloPartidosCopia instanceof PartidoBasquetbol){
                    $colPartidosGanados[] = $arregloPartidosCopia->darEquipoGanador();
                }
            }
        }
        $colPartidosGanados = $this->retornarCadena($colPartidosGanados);
        return $colPartidosGanados;
    }

    /**
     * Implementar el método calcularPremioPartido($OBJPartido) 
     * que debe retornar un arreglo asociativo donde una de sus 
     * claves es ‘equipoGanador’  y contiene la referencia al 
     * equipo ganador; y la otra clave es ‘premioPartido’ que 
     * contiene el valor obtenido del coeficiente del Partido 
     * por el importe configurado para el torneo. (premioPartido 
     * = Coef_partido * ImportePremio)
     */
    public function calcularPremioPartido($OBJPartido){
        $equipo = $OBJPartido->darEquipoGanador();
        $coef_partido = $OBJPartido->coeficientePartido();
        $premio =($coef_partido* $this->getImportePremio());
        $arregloAsociativo = ['equipoGanador' => $equipo, 'premioPartido'=> $premio];
        return $arregloAsociativo;
    }
    
    public function retornarCadena($arreglo){
        $cadena = "";
        foreach($arreglo as $unElementoCol){
            $cadena = $cadena." ". $unElementoCol. "\n";
        }
        return $cadena;
    }

    public function __toString(){
        $cadena = "\nColeccion de Partidos: " . $this->retornarCadena($this->getColPartidos()).
                  "\nImporte premio: $" . $this->getImportePremio();
        return $cadena;
    }
}