<?php 
    $v = '?v='.time();
    require_once("sp/sp_regiones.php");
    require_once("sp/sp_candidatos.php");
    $regiones   = getRegiones();
    $candidatos = getCandidatos();
?>
<!doctype html>
<html lang="es">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DESIS</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css<?php echo $v ?>" type="text/css">

</head>