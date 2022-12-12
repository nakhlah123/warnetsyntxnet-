<?php
class Model {
    public $connection;

    public function __construct() {
        global $config;

        try {
            $this->connection = new PDO("mysql:host=".$config['db_host'].";port=".$config['db_port'].";dbname=".$config['db_name'], $config['db_user'], $config['db_password'], array());
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'Connection failed: '.$ex->getMessage();
            exit();
        }
    }
}

class View {
    public function show($error) {
?>
    <div class="container-fluid app-container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
                <div class="pmd-card app-index-card">
                    <div class="pmd-card-body" style="padding-top:30px;">
                        <p>Terjadi kesalahan</p>
                        <ul>
<?php
        foreach ($error as $e) {
?>
                            <li><?php echo $e; ?></li>
<?php
        }
?>
                        </ul>
                        <a class="btn btn-danger" href="javascript:history.back()">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
}

class Controller {
    
}
?>