<?php
   
    session_start();

    // Check that the user as confirmed the password
    if($_POST['password'] == $_POST['confirmation']){  
                
        try {

            include($_SESSION['secure_folder'].'/controllers/database_connect.php');

            // Check if the username is already in use
            $qry = "SELECT username FROM users";
            $stm = $db->prepare($qry);
            $stm->execute();
            $res = $stm->fetchall(PDO::FETCH_COLUMN);
            $pos = array_search($_POST['username'], $res);

            if ($pos == null) {

                // Prepare statement
                $qry  = "INSERT INTO users (firstName, lastName, userName, password, email, active) ";
                $qry .= "VALUES (:firstName, :lastName, :userName, :password, :email, 0)";
                $stm = $db->prepare($qry);
                $stm->bindValue(':firstName', $_POST['firstname'], PDO::PARAM_STR);
                $stm->bindValue(':lastName', $_POST['lastname'], PDO::PARAM_STR);
                $stm->bindValue(':userName', $_POST['username'], PDO::PARAM_STR);
                $stm->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT), PDO::PARAM_STR);
                $stm->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

                $stm->execute();

            } else {

                echo "Username already in use";
            }
        
            $db = null;

            header('Location: http://'.$_SESSION['site_url']);

        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
    } else {
        echo "Password confirmation does not match!";
    }
    

