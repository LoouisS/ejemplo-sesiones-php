<!DOCTYPE html>
<html>
<?php include 'template/header.php'; ?>
<body>
    <h2>Login</h2>
    <form method="POST" action="index.php?c=controller_name">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
<?php include 'template/header.php'; ?>
