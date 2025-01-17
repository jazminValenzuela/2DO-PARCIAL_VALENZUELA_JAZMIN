<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquetbol.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$colPartidos = [];
$importe = 100000;
$objTorneo = new Torneo($colPartidos , $importe);

$objPartidoBasquet1 = new PartidoBasquetbol("11", "2024-05-05", $objE7, 80, $objE8, 120, 7);
$objPartidoBasquet2 = new PartidoBasquetbol("12", "2024-05-06", $objE9, 81, $objE10, 110, 8);
$objPartidoBasquet3 = new PartidoBasquetbol("13", "2024-05-07", $objE11, 115, $objE12, 85, 9);

$objPartidoFutbol1  = new PartidoFutbol("14", "2024-05-07", $objE1,3,$objE2, 2 );
$objPartidoFutbol2  = new PartidoFutbol("15", "2024-05-08", $objE3,0,$objE4, 1 );
$objPartidoFutbol3  = new PartidoFutbol("16", "2024-05-09", $objE5,2,$objE6, 3 );
 
$colPartidos[0] = $objPartidoBasquet1;
$colPartidos[1] = $objPartidoFutbol1;
$colPartidos[2] = $objPartidoBasquet2;
$colPartidos[3] = $objPartidoBasquet3;
$colPartidos[4] = $objPartidoFutbol2;
$colPartidos[5] = $objPartidoFutbol3;

$objTorneo = new Torneo ($colPartidos, $importe);

echo $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
echo $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'Basquetbol');
echo $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');


?>