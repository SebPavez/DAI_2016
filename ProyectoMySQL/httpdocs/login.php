<?php #login.php - script de inicio de sesión

//revisar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    //requerir scripts necesarios
    require ('includes/login_functions.inc.php');
    require ('../conexionMySQL.php');
    
    
    //revisar el login
    list($check, $data) = revisar_login($conexion, $_POST['email'], $_POST['pass']);
    
    if($check){
        //setear session
        session_start();
        $_SESSION['nick'] = $data['NICKNAME'];
        $_SESSION['nombre'] = $data['NOMBRE'];
        
        //redirigir
        redirigir_usuario('paginaIngreso.php');        
    }else{
        //se agregan datos recibidos por revisar_login
        $errores = $data;
    }
    
    oci_close($dbc);    
    
}
//Crear la página 
    include ('includes/login_page.inc.php');

