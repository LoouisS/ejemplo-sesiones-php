<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>
<body>
    <div class="box">
    <span class="borderLine"></span>
    <form method="post" action="index.php?controller=login&action=login">
        <h2>Inicio sesion</h2>
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
        <input type="submit" value="Login">
    </form>
    </div>
    </div>
<?php include 'template/header.php'; ?>
