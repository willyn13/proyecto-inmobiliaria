 <?php
    session_start();
    include('acceso_db.php');
  $ident = mysql_real_escape_string($_GET['id']);
     $perfil = mysql_query("SELECT * FROM usuarios WHERE usuario_id='".$ident."'") or die(mysql_error());
    if(mysql_num_rows($perfil)) { // Comprobamos que exista el registro con la ID ingresada
        $row = mysql_fetch_array($perfil);
        $id = $row["usuario_id"];
        $nick = $row["usuario_nombre"];
        $email = $row["usuario_email"];
        $freg = $row["usuario_freg"];
?>
        <strong>Nick:</strong> <?=$nick?>
 
        <strong>Email:</strong> <?=$email?>
 
        <strong>Registrado el:</strong> <?=$freg?>
 
        <strong>URL del perfil:</strong> <a href="perfil.php?id=<?=$id?>">Click aquí</a>
<?php
    }else {
?>
        <p>El perfil seleccionado no existe o ha sido eliminado.</p>
<?php
    }
?>  