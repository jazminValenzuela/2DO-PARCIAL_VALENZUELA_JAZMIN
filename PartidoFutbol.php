<?php

class PartidoFutbol extends Partido{
    //atributos
    private $categoriaEdad;
     /**
     * Implementar el método coeficientePartido() en la clase 
     * Partido el cual retorna el valor obtenido por el 
     * coeficiente base, multiplicado por la cantidad de goles 
     * y la cantidad de jugadores. Redefinir dicho método según 
     * corresponda.
     */
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $categoriaEdad){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
    }


    // public function getCategoriaEdad() {
    // 	return $this->categoriaEdad;
    // }

    // /**
    // * @param $categoriaEdad
    // */
    // public function setCategoriaEdad($categoriaEdad) {
    // 	$this->categoriaEdad = $categoriaEdad;
    // }


    public function coeficientePartido(){
        $coef = parent::coeficientePartido();
        $categoria = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        if($categoria == "Menores"){
            $coef = 0.13 * ($coef/0.5);
        }
        elseif($categoria == "Juveniles"){
            $coef = 0.19 * ($coef/0.5);
        }
        elseif($categoria == "Mayores"){
            $coef = 0.27 * ($coef/0.5);

        }
        return $coef;
    }

    public function __toString(){
        $cadena = parent::__toStrig();
        return $cadena;
    }
  
}