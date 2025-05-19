<?php

function addUser(PDO $pdo, string $nom, string $prenom, string $email, string $password) {
    $sql = "INSERT INTO `users` (`nom`, `prenom`, `email`, `password`, `role`) VALUES (:nom, :prenom, :email, :password, :role);";
    $query = $pdo->prepare($sql);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $role = 'conducteur';
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    
    return $query->execute();
}

function verifyUserLoginPassword(PDO $pdo, string $email, string $password) {
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}

function verifyUserRole(PDO $pdo, string $email, string $password, string $role) {
    $query = $pdo->prepare("SELECT * FROM users WHERE role = :role");
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    $query->execute();
    $root = $query->fetch();

    if ($root && password_verify($password, $root['password'])) {
        return $root;
    } else {
        return false;
    }
}



?>