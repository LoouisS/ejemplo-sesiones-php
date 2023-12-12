<?php
class ModeloLogin {
    private $users = [
        'user1' => 'password1',
        'user2' => 'password2',
        'admin' => 'adminpassword'
    ];

    public function validateUser($username, $password) {
        return isset($this->users[$username]) && $this->users[$username] === $password;
    }
}