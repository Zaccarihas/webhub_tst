<?php

    require_once 'config.php';
    require 'dbconnect.php';

    if (!isset($_POST['username'], $_POST['password'])) {
        exit ('Please fill both the username and password fields!');
    }
    
    if($stm = $conn->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        $stm->bind_param('s', $_POST['username']);
        $stm->execute();
        $stm->store_result();
    
        if($stm->num_rows > 0) {
            $stm->bind_result($id, $password);
            $stm->fetch();
            if (password_verify($_POST['password'], $password)) {
                session_regenerate_id();
                $_SESSION['loggedin']=True;
                $_SESSION['name']= $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: ../index.php');
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Incorrect usernamen";
        }
    
        $stm->close();
    }
