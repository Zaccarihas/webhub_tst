<?php
   
    session_start();

    $conn = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name']);
    if(mysqli_connect_errno()){
        exit('Failed to connect to db: '.mysqli_connect_errno);
    }

    if (!isset($_POST['username'], $_POST['password'])) {
        exit ('Please fill both the username and password fields!');
    }

    if($stm = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
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
                header('Location: http://'.$_SESSION['site_url']);
                //header('Location: ../index.php');
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Incorrect usernamen";
        }
    
        $stm->close();
    }

