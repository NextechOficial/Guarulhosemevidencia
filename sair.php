<?php
session_start();
session_destroy();

// Redireciona para a página de login ou página inicial
header("Location:app/view/loginteste1.php"); // Altere para a página desejada
exit;
?>