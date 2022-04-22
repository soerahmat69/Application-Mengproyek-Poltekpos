<div class="container p-3">
    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Profil Data User</h1>
    </div>

    <?php foreach ($user as $u) : ?>
        <form action="/user/edit" method="post">

            <div class="form-group">
                <label for="nama" class="font-weight-bold">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" value="<?= $u['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="no_tel" class="font-weight-bold">No telepon</label>
                <input type="number" class="form-control" name="no_tel" id="password" aria-describedby="no_tel" value="<?= $u['no_tel']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat" class="font-weight-bold">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= $u['alamat']; ?></textarea>
            </div>
            <div class="row">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary px-4">Ubah data</button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#ganti_password">
                        Ganti Password
                    </button>
                </div>
            </div>
        </form>
    <?php endforeach; ?>

    <!-- Modal -->
    <div class="modal fade" id="ganti_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/user/password" method="post">
                    <div class="modal-body">
                        <?= csrf_field(); ?>
                        <div class="form-group mb-1">
                            <label for="password_lama" class="font-weight-bold">Password Lama</label>
                            <input type="password" class="form-control" name="password_lama" id="password_lama" aria-describedby="password_lama" required>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="password_lama1" onclick="password1()">
                            <label class="form-check-label" for="password_lama1">
                                Show Password
                            </label>
                        </div>
                        <div class="form-group mb-1">
                            <label for="password_baru" class="font-weight-bold">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" id="password_baru" aria-describedby="password_baru" required>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="password_baru1" onclick="password2()">
                            <label class="form-check-label" for="password_baru1">
                                Show Password
                            </label>
                        </div>
                        <div class="form-group mb-1">
                            <label for="konfirm_password" class="font-weight-bold">Konfirm Password</label>
                            <input type="password" class="form-control" name="konfirm_password" id="konfirm_password" aria-describedby="konfirm_password" required>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="konfirm_password1" onclick="password3()">
                            <label class="form-check-label" for="konfirm_password1">
                                Show Password
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>