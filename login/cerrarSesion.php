<?php
    session_start();
    session_destroy();
    echo $_SESSION["dni"];
?>
    <script>
        location.href = "http://localhost/proyecto-inmobiliaria/";
    </script>