<?php
class PemesananView extends View {
    function index($result) {
?>
    <div class="container-fluid app-container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="pmd-card app-index-card">
					<div class="pmd-card-title">
                        <div class="pull-left">
                            <h2 style="margin-top:7px;">Pemesanan</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="admin.php?component=Pemesanan&action=add">Entri</a>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="pmd-card-body" style="padding-top:30px;">
						<div class="pmd-table-card">
							<table cellspacing="0" cellpadding="0" class="table table-sm pmd-table table-striped table-hover table-bordered table-selected table-header-sticked" id="table-propeller">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Nomor Hp</th>
                                        <th>Tanggal Main</th>
                                        <th>Jam</th>
                                        <th>Durasi</th>
                                        <th>Bangku</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
        $no = 1;
        if (count($result) > 0) {
            foreach ($result as $data) {
?>
                                    <tr>
                                        <td data-title="#"><?php echo $no; ?></td>
                                        <td data-title="">
                                            <a href="admin.php?component=Pemesanan&action=edit&id=<?php echo $data->id; ?>"><i class="material-icons md-dark pmd-xs">mode_edit</i></a>
                                            <a href="javascript:hapus(<?php echo $data->id; ?>, '<?php echo addslashes($data->nama); ?>')"><i class="material-icons md-dark pmd-xs">delete_forever</i></a>
                                        </td>
                                        <td data-title="Nama"><?php echo $data->nama; ?></td>
                                        <td data-title="Nomor Hp"><?php echo $data->nomor_hp; ?></td>
                                        <td data-title="Tanggal Main"><?php echo $data->tanggal_main; ?></td>
                                        <td data-title="Jam"><?php echo $data->jam; ?></td>
                                        <td data-title="Durasi"><?php echo $data->durasi; ?></td>
                                        <td data-title="Bangku"><?php echo $data->bangku; ?></td>
                                    </tr>
<?php
                $no++;
            }
        } else {
?>
                                    <tr>
                                        <td colspan="10">Tidak ada</td>
                                    </tr>
<?php
        }
?>
                                </tbody>
							</table>
						</div>
                    </div>
				</div>
			</div>
		</div>
    </div>
    <script>
        function hapus(id, nama) {
            if (confirm("Hapus " + nama + "?")) {
                window.open('admin.php?component=Pemesanan&action=delete&id=' + id, '_self');
            }
        }
    </script>
<?php
    }

    function entry($result) {
?>
    <div class="container-fluid app-container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<form action="admin.php?component=Pemesanan&action=save" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
					<div class="pmd-card app-entry-card">
						<div class="pmd-card-title">
                            <div class="pull-left">
                                <h2 style="margin-top:7px;">Pemesanan</h2>
                            </div>
                            <div style="clear:both;"></div>
						</div>
                        <div class="pmd-card-body">
							<div class="group-fields clearfix row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="nama" class="control-label">
                                            Nama
										</label>
                                        <input class="form-control" id="nama" name="nama" maxlength="50" value="<?php echo $result->nama; ?>" required autofocus>
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
							<div class="group-fields clearfix row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="nomor_hp" class="control-label">
                                            Nomor Hp
										</label>
                                        <input class="form-control" id="nomor_hp" name="nomor_hp" maxlength="50" value="<?php echo $result->nomor_hp; ?>" required>
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
							<div class="group-fields clearfix row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="tanggal_main" class="control-label">
                                            Tanggal Main
										</label>
                                        <input class="form-control" id="tanggal_main" name="tanggal_main" maxlength="50" value="<?php echo date("d-m-Y", strtotime($result->tanggal_main)); ?>" required>
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
							<div class="group-fields clearfix row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="jam" class="control-label">
                                            Jam
										</label>
                                        <input type="time" class="form-control" id="jam" name="jam" maxlength="10" value="<?php echo $result->jam; ?>" required>
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
							<div class="group-fields clearfix row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="durasi" class="control-label">
                                            Durasi
                                        </label>
                                        <select class="form-control" id="durasi" name="durasi">
<?php
        $options = array(
            '1 jam' => '1 jam',
            '2 jam' => '2 jam',
            '3 jam' => '3 jam',
            '4 jam' => '4 jam',
            '5 jam' => '5 jam'
        );
        foreach ($options as $value=>$text) {
?>
                                            <option value="<?php echo $value; ?>" <?php echo ($value == $result->durasi) ? 'selected' : ''; ?>><?php echo $text; ?></option>
<?php
        }
?>
                                        </select>
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
                            </div>
                            <div class="group-fields clearfix row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="bangku" class="control-label">
                                            Bangku
                                        </label>
                                        <select class="form-control" id="bangku" name="bangku">
<?php
        $options = array(
            'No.1' => 'No.1',
            'No.2' => 'No.2',
            'No.3' => 'No.3',
            'No.4' => 'No.4',
            'No.5' => 'No.5',
            'No.6' => 'No.6',
            'No.7' => 'No.7',
            'No.8' => 'No.8',
            'No.9' => 'No.9',
            'No.10' => 'No.10',
            'No.11' => 'No.11',
            'No.12' => 'No.12',
            'No.13' => 'No.13',
            'No.14' => 'No.14',
            'No.15' => 'No.15',
            'No.16' => 'No.16',
            'No.17' => 'No.17',
            'No.18' => 'No.18',
            'No.19' => 'No.19',
            'No.20' => 'No.20'
        );
        foreach ($options as $value=>$text) {
?>
                                            <option value="<?php echo $value; ?>" <?php echo ($value == $result->bangku) ? 'selected' : ''; ?>><?php echo $text; ?></option>
<?php
        }
?>
                                        </select>
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
                        </div>
                        </div>
						<div class="pmd-card-actions">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a class="btn btn-default" href="admin.php?component=Pemesanan">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
    <script>
        function documentReady() {
            $('#tanggal_main').datetimepicker({
                viewMode: 'days',
                format: 'DD-MM-YYYY'
            });

            $("#durasi").select2();
            $("#bangku").select2();
        }
    </script>
<?php
    }
}
?>