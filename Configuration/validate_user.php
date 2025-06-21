<?php

function valid_sesion($variable)
{
    if (empty($variable)) {
        header("Location: ../Configuration/Logout.php");
    }

}
?>