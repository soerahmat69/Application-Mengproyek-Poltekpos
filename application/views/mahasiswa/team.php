<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Bergabung Team Proyek</h1>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#input_barang">
        Rekrut Team
    </button>

    <button type="button" class="float-right btn btn-primary mb-4" data-toggle="modal" data-target="#acc">
        Accept Team
    </button>



    <!-- Modal -->
    <div class="modal fade" id="acc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Accept Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="<?= base_url('mahasiswa/team/terima'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="acc py-2 text-size-1" class="font-weight-bold">Yang ingin mengrekrut</label>
                            <table class=" my-3 table">
                                <thead>

                                    <tr>

                                        <th scope="col">Nim</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($team as $acc) : ?>
                                        <tr>

                                            <td><?= $acc['nim_mhs']; ?>
                                                <input autocomplete="off" type="hidden" class="form-control" id="id_team" value="<?= $acc['id_team']; ?>" name="id_team">
                                                <input autocomplete="off" type="hidden" class="form-control" id="nim_acc" value="<?= $acc['nim_mhs']; ?>" name="nim_acc">
                                            </td>
                                            <td><?= $acc['nama_mhs']; ?>
                                                <input autocomplete="off" type="hidden" class="form-control" id="nama_acc" value="<?= $acc['nama_mhs']; ?>" name="nama_acc">
                                                <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $nim; ?>" name="partnert">
                                            </td>
                                            <td class=""> <input id="check" name="check" value="1" type="checkbox" aria-label="Checkbox for following text input"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="modal fade" id="input_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hasil Rekrut</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('mahasiswa/team/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="judul_proyek" class="font-weight-bold">Nim</label>


                            <table class=" my-3 table">
                                <thead>

                                    <tr>

                                        <th scope="col">Nim</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Partnert</th>
                                        <th scope="col">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($recent as $rec) : ?>
                                        <tr>

                                            <td><?= $rec['nim_mhs']; ?>
                                                <input autocomplete="off" type="hidden" class="form-control" id="nim_acc" value="<?= $rec['nim_mhs']; ?>" name="nim_acc">
                                            </td>
                                            <td><?= $rec['nama_mhs']; ?>
                                                <input autocomplete="off" type="hidden" class="form-control" id="nama_acc" value="<?= $rec['nama_mhs']; ?>" name="nama_acc">
                                                <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $nim; ?>" name="partnert">
                                            </td>
                                            <td><?= $rec['partnert'] ?></td>
                                            <td class=""> <input id="check" name="check" value="<?= $rec['id_team']; ?>" type="checkbox" aria-label="Checkbox for following text input"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Rekrut</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($user as $a) :

            ?>

                <tr>
                    <td class="align-middle text-center" width="20px"><?= $no++ ?></td>
                    <td class="align-middle text-center"><?= $a['nim']; ?></td>
                    <td class="align-middle text-center"><?= $a['nama']; ?></td>


                    <td width="140px">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rekrut<?= $a['nim']; ?>">
                            Pilih
                        </button>




                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="rekrut<?= $a['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Mengrekrut</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="<?= base_url('mahasiswa/team/rekrut') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Pilihan anda sudah yakin?</label>
                                            <input autocomplete="off" type="hidden" class="form-control" id="partnert" value="<?= $a['nim']; ?>" name="partnert">
                                            <input autocomplete="off" type="hidden" class="form-control" id="nama" value="<?= $nama ?>" name="nama">
                                            <input autocomplete="off" type="hidden" class="form-control" id="nim" value="<?= $nim; ?>" name="nim">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>

                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>