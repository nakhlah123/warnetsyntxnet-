<?php
class PemesananModel extends Model {
    function get($id) {
        //Query database
        $sql = "SELECT *
                FROM pemesanan
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
            $result->nama = '';
            $result->nomor_hp= '';
            $result->tanggal_main = '';
            $result->jam = '';
            $result->durasi = '';
            $result->bangku = '';
        }
        return $result;
    }

    function getAll() {
        //TODO: implementasi paging
        //TODO: implementasi filter

        //Query database
        $sql = "SELECT *
                FROM pemesanan
                ORDER BY nama";
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
        $nama = trim($_REQUEST['nama']) ? $_REQUEST['nama'] : '';
        $nomor_hp = trim($_REQUEST['nomor_hp']) ? $_REQUEST['nomor_hp'] : '';
        $tanggal_main = trim($_REQUEST['tanggal_main']) ? $_REQUEST['tanggal_main'] : '0000-00-00';
        $jam = trim($_REQUEST['jam']) ? $_REQUEST['jam'] : '';
        $durasi = trim($_REQUEST['durasi']) ? $_REQUEST['durasi'] : '';
        $bangku = trim($_REQUEST['bangku']) ? $_REQUEST['bangku'] : '';

        $error = array();

        //Tanggal main berbeda format antara database Y-m-d dengan tampilan d-m-Y
        if ($tanggal_main == '' || $tanggal_main == '0000-00-00') {
            $error[] = "Tanggal Main belum diisi";
        } else {
            $tanggal_main = date("Y-m-d", strtotime($tanggal_main));
        }
        
        if (count($error) == 0) {
            if ($id == 0) {
                $sql = "INSERT INTO pemesanan (
                            nama, nomor_hp, tanggal_main, jam, durasi, bangku
                        ) VALUES (
                            :nama, :nomor_hp, :tanggal_main, :jam, :durasi, :bangku
                        )";
                $params = array(
                    ':nama' => $nama,
                    ':nomor_hp' => $nomor_hp,
                    ':tanggal_main' => $tanggal_main,
                    ':jam' => $jam,
                    ':durasi' => $durasi,
                    ':bangku' => $bangku
                );
            } else {
                $sql = "UPDATE pemesanan
                        SET nama=:nama, nomor_hp=:nomor_hp, tanggal_main=:tanggal_main, jam=:jam, durasi=:durasi, bangku=:bangku
                        WHERE id='".$id."'";
                $params = array(
                    ':nama' => $nama,
                    ':nomor_hp' => $nomor_hp,
                    ':tanggal_main' => $tanggal_main,
                    ':jam' => $jam,
                    ':durasi' => $durasi,
                    ':bangku' => $bangku
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
                FROM pemesanan
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