<?php #login_functions.inc.php - script con funciones relacionadas con sesión
//Este documento define dos funciones relacionados con los procesos de ingreso
//y salida de sesión

/* Esta función determina una url absoluta, y redirige al usuario a esta.
 * Esta función toma un parámetro: la página donde será redirigido, el cual está
 * seteado por defecto a "index.php" */
function redirigir_usuario($pagina = 'index.php'){
    //Se define la URL
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    
    //remover slashes de la url definida
    $url= rtrim($url, '/\\');
    
    //agregar página
    $url= '/'.$page;
    
    //redirigir usuario
    header("Location: $url");
    exit();
    
}// fin de la función redirigir_usuario

/*Esta función valida los datos del formulario web (e-mail y pass)
 * Si ámbos están presentes, se genera la consulta a la DB.
 * La función requiere una conexión a BD.
 * La función retorna un arreglo de información, incluyendo:
 *  - TRUE/FALSE indicando si se logró o no.
 *  - Un arreglo con errores o resultados de la consulta */
function revisar_login($dbc, $email = '', $pass = ''){    
    $errores = array(); //inicialización de arreglo para errores
    
    //validación de correo
    if(empty($email)){
        $errores[] = "Olvidaste ingresar tu correo";        
    }
    
    //validación de pass
    if(empty($pass)){
        $errores[] = "Olvidaste ingresar tu contraseña";
    }   
    
    //Si no hay errores...
    if(empty($errores)){
        //consultar por id de usuario y nombre con los datos ingresados        
        $q = "SELECT nickname, nombre FROM usuarios WHERE email=:email AND pass = :pass";
        $consulta = oci_parse($dbc,$q);       
        oci_bind_by_name($consulta, ":email", $email);        
        oci_bind_by_name($consulta, ":pass", $pass);
        
        //correr consulta y revisar resultados        
        if(oci_execute($consulta)){
            $row = oci_fetch($q);
            return array(true, $row);
        } else {
            $errores[] = "El correo proporcionado parece no existir o su contraseña es incorrecta";
        }
        
        return array(false, $errores);
        
    }//fin de función revisar_login
    
} 