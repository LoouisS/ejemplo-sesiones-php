<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>
<head>
    <link rel="stylesheet" href="../../css/style.css">
</head>
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
            <select name="password" required="required">
                <option value="">Select minigame</option>
                <option value="password1">Minigame 1</option>
                <option value="password2">Minigame 2</option>
                <option value="password3">Minigame 3</option>
            </select>
        </div>
        <input type="submit" value="Crear Administrador">
    </form>
    </div>
    </div>
<?php include 'template/header.php'; ?>
