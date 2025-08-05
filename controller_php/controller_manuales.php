<?php
session_start();
include("../Layout/mensajes.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if ($_GET['ref'] == 'ManualAdmin') {

        $archivo = 'Manual de Administrador.pdf';
        if (!preg_match('/^.{10,}$/', $archivo)) {
            $_SESSION['mensaje'] = 'Nombre inválido del manual a descargar.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../moduloManuales.php");
            exit();
        }
        $mi_pdf = fopen("../reportes/$archivo", "r");
        if (!$mi_pdf) {
            $_SESSION['mensaje'] = 'No se pudo abrir el archivp para la lectura. Verifique que exista';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../moduloManuales.php");

            exit();
        }

        header('Content-type: application/pdf');


        fpassthru($mi_pdf);
        fclose($archivo);
        
    } else if ($_GET['ref'] == 'ManualUser') {
        $archivo = 'Manual de Usuario.pdf';
        if (!preg_match('/^.{10,}$/', $archivo)) {
            $_SESSION['mensaje'] = 'Nombre inválido del manual a descargar.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../moduloManuales.php");
            exit();
        }
        $mi_pdf = fopen("../reportes/$archivo", "r");
        if (!$mi_pdf) {
            $_SESSION['mensaje'] = 'No se pudo abrir el archivp para la lectura. Verifique que exista';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../moduloManuales.php");

            exit();
        }

        header('Content-type: application/pdf');

        fpassthru($mi_pdf);
        fclose($archivo);
    }
}
