<?php

include ('includes/header.html');

if(isset($errores) && !empty($errores)){
    echo '<h1> Error! </h1> <p>'
    . 'Ocurrieron los siguientes errores: <br/>';
    foreach ($errores as $msg) {
        echo " - $msg<br/>\n";
    }
    echo '</p><p>Por favor, intente nuevamente</p>';    
}

?>

<h1>Ingreso</h1>
<form action="login.php" method="POST">
    <table>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" size="20" maxlength="60"/></td>
        </tr>
        <tr>
            <td>Contraseña:</td>
            <td><input type="password" name="pass" size="20" maxlength="20"/></td>
        </tr>
    </table>    
    <p><input type="submit" name="submit" value="Ingresar!"> </p>
</form>
<p>¿no tienes cuenta? <a href="registro.php">registrate</a>, es gratis :)</p>

<?php include ('includes/footer.html');