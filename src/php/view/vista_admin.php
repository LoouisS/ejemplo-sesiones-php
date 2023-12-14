<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>
<body>
<div class="box">
    <span class="borderLine"></span>
    <form method="post" action="index.php?controller=login&action=altaSubAdmin">
        <h2>Alta administrador</h2>
        <div class="inputBox">
        <input type="text" name="correo" required="required">
        <span>Correo</span>
        <i></i>
        </div>
        <div class="inputBox">
        <input type="password" name="password" required="required">
        <span>Password</span>
        <i></i>
        </div>
        <div class="inputBox">
        <?php
            // Crea un select option con los minijuegos que no tienen subadministrador
            echo '<select name="minijuego">';
            foreach ($_SESSION['minijuegos'] as $minijuego) {
                echo '<option value="' . $minijuego['idMinijuego'] . '">' . $minijuego['nombre'] . '</option>';
            }
        ?>
        </div>
        <input type="submit" value="Alta">
    </form>
    </div>
    </div>
    <?php include 'template/footer.php'; ?>
