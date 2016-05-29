<?php
/**
 * Created by PhpStorm.
 * User: gorydev
 * Date: 28/04/2016
 * Time: 09:44 PM
 */
if(isset($_POST['tec']) and isset($_POST['mem']) and isset($_POST['sim'])
    and isset($_POST['back']) and isset($_POST['fall']) and isset($_POST['observ']) and isset($_POST['stat'])){
        

    $norden = $_POST['orden'];
    $tecnico = $_POST['tec'];
    $memoria = $_POST['mem'];
    $chip = $_POST['sim'];
    $tapa = $_POST['back'];
    $falla = $_POST['fall'];
    $observacion = $_POST['observ'];
    $status = $_POST['stat'];
    $fecha = $_POST['fecha'];
    $total = $_POST['total'];
    $abono = $_POST['abono'];
    $restante = $_POST['restante'];
    
    require dirname(__FILE__).'/db/connect.php';
    $statement = $conexion->prepare('UPDATE ordenes SET id_tec = :tecnico, memoria = :memoria, 
                                    chip = :chip, tapa = :tapa, falla = :falla, 
                                    observaciones = :observacion, status = :status,
                                    fecha = :fecha, costo = :total, abono = :abono, resta = :restante WHERE n_orden = :orden');
    $statement->execute(array(
        ':tecnico' => $tecnico,
        ':memoria' => $memoria,
        ':chip' => $chip,
        ':tapa' => $tapa,
        ':falla' => $falla,
        ':observacion' => $observacion,
        ':status' => $status,
        ':fecha' => $fecha,
        ':total' => $total,
        ':abono' => $abono,
        ':restante' => $restante,
        ':orden' => $norden
    ));

}

?>