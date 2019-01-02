<?php

session_start();

include $_SERVER["DOCUMENT_ROOT"] . '/intranet/conexion/conexion.php';
include $_SERVER["DOCUMENT_ROOT"] . '/intranet/php/estadosLogin.php';

$conexion = conectar();

$_SESSION['ID_Organizacion'] = $_POST['txtOrg'];
$ID_Rol = $_POST['txtPerfil'];

$sql = "   SELECT r.ID_Rol,r.Nombre
            FROM         org_usuario_rol oru
            RIGHT   JOIN rol               r  ON (oru.ID_Rol  =  r.ID_Rol)
            RIGHT   JOIN usuario           u  ON (oru.Cedula           =  u.Cedula)
            RIGHT   JOIN organizacion      o  ON (oru.ID_Organizacion  =  o.ID_Organizacion)
            WHERE oru.Estatus='A'
            AND     u.Estatus='A'
            AND     r.Estatus='A'
            AND     o.Estatus='A'
            AND     o.ID_Organizacion='$_SESSION[ID_Organizacion]'
            AND     r.ID_Rol ='$ID_Rol'
            AND     u.Cedula='$_SESSION[Cedula]' ";



$rs = mysqli_query($conexion, $sql);


if ($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {

    //Asignamos el Rol a una variable de Sesión, para usarla en el Contexto.
    $_SESSION['ID_Rol'] = $row['ID_Rol'];

    switch ($_SESSION['ID_Rol']) {

        case TypeUsuario::ADMINISTRADOR:
            /* INGRESAR EL USUARIO COMO ADMINISTRADOR */
            echo'<script language="javascript">
                  alert("Bienvenido al Sistema");
                  location.href="../../menuAdministrador.php";
                  </script>';
            break;

        case TypeUsuario::AUTORIZADOR:
            /* INGRESAR EL USUARIO COMO AUTORIZADOR */
            echo'<script language="javascript">
                  alert("Bienvenido al Sistema");
                  location.href="../../menuAutorizador.php";
                  </script>';
            break;

        case TypeUsuario::EDITOR:
            /* INGRESAR EL USUARIO COMO EDITOR */
            echo'<script language="javascript">
                  alert("Bienvenido al Sistema");
                  location.href="../../menuEditor.php";
                  </script>';
            break;

        case TypeUsuario::PUBLICADOR:
            /* INGRESAR EL USUARIO COMO PUBLICADOR */
            @session_start();
            echo'<script language="javascript">
                  alert("Bienvenido al Sistema");
                  location.href="../../menuPublicador.php";
             </script>';
            break;

        default: //LECTOR
            // Usuario incorrecto o no existe
            echo'<script language="javascript">
                      alert("Error: Usuario o contraseña incorrectos");
                      location.href=../../login.php";
               </script>';
            break;
    }
} else {

    echo'<script language="javascript">
          alert("Error: Los roles prporciondos son incorrectos");
          location.href="../../login.php";
        </script>';
}
?>
