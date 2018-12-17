<?php 

include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/conexion/conexion.php'; 
include_once $_SERVER["DOCUMENT_ROOT"].'/intranet/php/index/Salas.php'; 

$conexion = conectar();

$consultaSala = "SELECT t1.days  	AS Dia,
                        t1.moth  	AS Mes,
                        t1.yeart 	AS A,
                        t1.space 	AS Sala,
                        t2.cince 	AS Hora_Inicio,
                        t2.until 	AS Hora_Final,
                        t2.user  	AS Usuario,
                        t2.isreserved 	AS Reservado
                    FROM availability t1 INNER JOIN reservation t2 ON t1.availability_id = t2.availability_id
                    WHERE t2.isreserved = 'Y'";

$resultado = mysql_query($consultaSala, $conexion);

$list = array();



while ($mostrarSala = mysql_fetch_array($resultado)) {
    
    $inst = new Salas();
    $inst->setDia($mostrarSala["Dia"]);
    $inst->setMes($mostrarSala["Mes"]);
    $inst->setA($mostrarSala["A"]);
    $inst->setSalas($mostrarSala["Sala"]);
    $inst->setHoraInicio($mostrarSala["Hora_Inicio"]);
    $inst->setHoraFinal($mostrarSala["Hora_Final"]);
    $inst->setUsuario($mostrarSala["Usuario"]);
    $inst->setReservado($mostrarSala["Reservado"]);

    array_push($list, $inst);
    
}

echo json_encode($list);

?>