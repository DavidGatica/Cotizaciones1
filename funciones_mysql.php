<?php

function conectar() {

    $link = mysql_connect("localhost", "artefmct_nevin", "931101");

    mysql_set_charset('utf8');

    mysql_select_db("artefmct_Cotizaciones", $link) OR DIE("Error: No es posible establecer la conexión");

    return $link;
}

function query($sql, $con) {

    $result = mysql_query($sql, $con);

    return $result;
}

?>
