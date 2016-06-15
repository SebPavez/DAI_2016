<?php
include('includes/header.html');
require ('../conexionOracle.php');
session_start();
if(empty($_SESSION['nick'])|| $_SESSION['nick']==''){
    require ('includes/login_functions.inc.php');    
    revisar_login($dbc);
}else{
    echo "<h2>Listado de proyectos disponibles</h2><br>";
    $query = oci_parse($dbc, "SELECT * FROM proyectos");
    if(oci_execute($query)){
        echo "<table border='1'>\n";
        while ($row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>\n";
            foreach ($row as $item) {
                echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";                
            }
            echo "</tr>\n";            
        }
        echo "</table>\n";
    }else{
        echo "<p>no hay proyectos por asignar</p>";
    }
}
include('includes/footer.html');