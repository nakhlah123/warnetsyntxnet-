<?php
class PelangganView extends View {
    function index($result) {
        ?>
    <div class="container-fluid app-container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="pmd-card app-index-card">
					<div class="pmd-card-title">
                        <div class="pull-left">
                            <h2 style="margin-top:7px;">Pelanggan</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="admin.php?component=Pelanggan&action=add">Entri</a>
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
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Level Akses</th>
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
                                            <a href="admin.php?component=Pelanggan&action=edit&id=<?php echo $data->id; ?>"><i class="material-icons md-dark pmd-xs">mode_edit</i></a>
                                            <a href="javascript:hapus(<?php echo $data->id; ?>, '<?php echo addslashes($data->username); ?>')"><i class="material-icons md-dark pmd-xs">delete_forever</i></a>
                                        </td>
                                        <td data-title="Username"><?php echo $data->username; ?></td>
                                        <td data-title="Name"><?php echo $data->name; ?></td>
                                        <td data-title="Level Akses"><?php echo $data->level_akses; ?></td>
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
        function hapus(id, username) {
            if (confirm("Hapus " + username)) {
                window.open('admin.php?component=Pelanggan&action=delete&id=' + id, '_self');
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
				<form action="admin.php?component=Pelanggan&action=save" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
					<div class="pmd-card app-entry-card">
						<div class="pmd-card-title">
                            <div class="pull-left">
                                <h2 style="margin-top:7px;">Pelanggan</h2>
                            </div>
                            <div style="clear:both;"></div>
						</div>
                        <div class="pmd-card-body">
							<div class="group-fields clearfix row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="username" class="control-label">
                                            Username
										</label>
                                        <input class="form-control" id="username" name="username" maxlength="50" value="<?php echo $result->username; ?>" required autofocus>
                                        <span class="pmd-textfield-focused"></span>
									</div>
                                </div>
							</div>
							<div class="group-fields clearfix row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="password" class="control-label">
                                            Password
										</label>
                                        <input class="form-control" id="password" name="password" maxlength="50" value="<?php echo $result->password; ?>" required>
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
							<div class="group-fields clearfix row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="name" class="control-label">
                                            Name
										</label>
                                        <input class="form-control" id="name" name="name" maxlength="50" value="<?php echo $result->name; ?>">
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
							<div class="group-fields clearfix row">
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<div class="form-group form-group-sm">
										<label for="level_akses" class="control-label">
                                            Level Akses
										</label>
                                        <input class="form-control" id="level_akses" name="level_akses" maxlength="50" value="<?php echo $result->level_akses; ?>">
                                        <span class="pmd-textfield-focused"></span>
									</div>
								</div>
							</div>
						<div class="pmd-card-actions">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a class="btn btn-default" href="admin.php?component=Pelanggan">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
<?php
    }
}
?>