<?php
class HomeModel extends Model {
    function login() {
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

        if ($username != '' && $password != '') {
            //Query database
            $sql = "SELECT *
                    FROM pelanggan
                    WHERE username=:username AND password=:password";
            $params = array(
                ':username' => $username,
                ':password' => $password
            );
            try {
                $sth = $this->connection->prepare($sql);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute($params);
                $obj = $sth->fetch();
                $sth->closeCursor();
                
                //Buat sesi user
                if ($obj) {
                    $_SESSION['user'] = new stdClass();
                    $_SESSION['user']->userName = $username;
                    $_SESSION['user']->nama = 'Administrator';
                    $_SESSION['user']->levelAkses = 'Administrator';
            
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $ex) {
                echo $ex->getMessage();
                exit();
            }
        } else {
            return false;
        }
    }

    function logout() {
        //Hilangkan sesi user
        unset($_SESSION['user']);
    }
}
?>