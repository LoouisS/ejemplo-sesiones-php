<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>
<body>
<div class="box">
    <span class="borderLine"></span>
    <form action="index.php?controller=login&action=cerrarSesion" method="post">
        <h2 style="color: white; text-align: center">Hola, Subadministrador.</h2>
        <?php 
        // Mostramos los minijuegos que gestiona

        foreach ($minijuegos as $minijuego) {
            echo '<h2>Gestionas el minijuego: ' . $minijuego['nombre'] . '</h2>';
        }
        ?>
        
        <input type="submit" value="Log Out" class="logout-button" style="margin: 0 auto;">
    </form>
</div>

<?php include 'template/footer.php'; ?>
