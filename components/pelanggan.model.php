<?php
class PelangganModel extends Model {
    function get($id) {
        //Query database
        $sql = "SELECT *
                FROM pelanggan
                WHERE id=:id";
        $params = array(
            ':id' => $id
        );
        $result = null;
        try {
            $sth = $this->connection->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute($params);
            $result = $sth->fetch();
            $sth->closeCursor();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }
        if (!$result) {
            $result = new stdClass();
            $result->id = 0;
            $result->username = '';
            $result->password = '';
            $result->name = '';
            $result->level_akses = '';
        }
        return $result;
    }

    function getAll() {
        //TODO: implementasi paging
        //TODO: implementasi filter

        //Query database
        $sql = "SELECT *
                FROM pelanggan
                ORDER BY username";
        $params = array();
        $result = array();
        try {
            $sth = $this->connection->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute($params);
            while (($obj = $sth->fetch()) == true) {
                $result[] = $obj;
            }
            $sth->closeCursor();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }
        return $result;
    }

    function save($id) {
        $username = trim($_REQUEST['username']) ? $_REQUEST['username'] : '';
        $password = trim($_REQUEST['password']) ? $_REQUEST['password'] : '';
        $name = trim($_REQUEST['name']) ? $_REQUEST['name'] : '';
        $level_akses = trim($_REQUEST['level_akses']) ? $_REQUEST['level_akses'] : '';
        

        $error = array();
        
        if (count($error) == 0) {
            if ($id == 0) {
                $sql = "INSERT INTO pelanggan (
                            username, password, name, level_akses
                        ) VALUES (
                            :username, :password, :name, :level_akses
                        )";
                $params = array(
                    ':username' => $username,
                    ':password' => $password,
                    ':name' => $name,
                    ':level_akses' => $level_akses
                );
            } else {
                //Foto di-update terpisah bergantung ada tidaknya file baru
                $sql = "UPDATE pelanggan
                        SET username=:username, password=:password, name=:name, level_akses=:level_akses
                        WHERE id='".$id."'";
                $params = array(
                    ':username' => $username,
                    ':password' => $password,
                    ':name' => $name,
                    ':level_akses' => $level_akses
                );
            }
            try {
                $sth = $this->connection->prepare($sql);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute($params);
                $sth->closeCursor();

                $id = $this->connection->lastInsertId();
                
            } catch (PDOException $ex) {
                echo $ex->getMessage();
                exit();
            }
        }
        
        return $error;
    }

    function delete($id) {
        //Query database
        $sql = "DELETE
                FROM pelanggan
                WHERE id=:id";
        $params = array(
            ':id' => $id
        );
        $rowCount = 0;
        try {
            $sth = $this->connection->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute($params);
            $rowCount = $sth->rowCount();
            $sth->closeCursor();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }
        return $rowCount;
    }
}
?>