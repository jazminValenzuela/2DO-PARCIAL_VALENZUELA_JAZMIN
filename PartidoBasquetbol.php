<?php

class PartidoBasquetbol extends Partido{
    //atributos
    private $cantInfracciones;


    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantInfracciones) {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
    	$this->cantInfracciones = $cantInfracciones;
    }

    public function getCantInfracciones() {
    	return $this->cantInfracciones;
    }

        /**
     * Implementar el método coeficientePartido() en la clase 
     * Partido el cual retorna el valor obtenido por el 
     * coeficiente base, multiplicado por la cantidad de goles 
     * y la cantidad de jugadores. Redefinir dicho método según 
     * corresponda. si se trata de un partido de basquetbol  se 
     * almacena la cantidad de infracciones de manera tal que al 
     * coeficiente base se debe restar un coeficiente de 
     * penalización, cuyo valor por defecto es: 0.75, * (por) 
     * la cantidad de infracciones. Es decir:
     * coef  = coeficiente_base_partido  - 
     * (coef_penalización*cant_infracciones);


     */
    public function coeficientePartido(){
        $coef = parent::coeficientePartido();
        $coef = $coef - (0.75 * $this->getCantInfracciones());
    }

    public function __toString(){
        $cadena = parent::__toString();
        $cadena.="Cantidad de Infracciones: ". $this->getCantInfracciones();
        return $cadena;
    }
}