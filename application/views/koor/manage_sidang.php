<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Sidang</h1>
    </div>

    <!-- Button trigger modal -->
    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#sidang">
        Pengajuan Draft Laporan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="sidang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('koor/proyek/ajukan_sidang') ?>" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <input autocomplete="off" type="hidden" class="form-control" id="mulai" value="<?= $nim ?>" name="nim">

                            <label for="">Mulai Pengumpulan draft Laporan</label>
                            <input autocomplete="off" type="date" class="form-control" id="mulai" value="" name="mulai">

                        </div>

                        <duv class="form-group">
                            <label for="">Akhir Pengumpulan Draft Laporan </label>
                            <input autocomplete="off" type="date" class="form-control" id="akhir" value="" name="akhir">

                        </duv>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Jadwal Sidang</th>
                <th>Judul Proyek</th>
                <th>Kategori Proyek</th>
                <th>Dosen Pembimbing</th>
                <th>Dosen Penguji</th>
                <th style="width: 210px;">Pilih Dospenguji & Jadwal</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($proyek as $a) :

            ?><tr>

                    <?php if (isset($a['jadwal'])) {
                        echo '<td class="align-middle text-center">' . date('d/m/Y', strtotime($a['jadwal'])) . '</td>';
                    } else {
                        echo '<td class="align-middle text-center">kosong...</td>';
                    } ?>
                    <td class="align-middle text-center"><?= $a['judul'] ?></td>
                    <td class="align-middle text-center"><?= $a['nama'] ?></td>
                    <td class="align-middle text-center">Proyek <?= $a['proyek'] ?></td>
                    <!-- <td class="align-middle text-center">kosong...</td> -->

                    <?php if (isset($a['nim_dospeng'])) {
                        foreach ($dospeng as $dos) {
                            echo '<td class="align-middle text-center">' . $dos['nama'] . '</td>';
                        }
                    } else {
                        echo '<td class="align-middle text-center">kosong...</td>';
                    } ?>

                    <td width="140px">

                        <button data-target="#pilih<?= $a['id_proyek'] ?>" data-toggle="modal" class="btn btn-primary">
                            Dospeng
                        </button>


                        <button data-target="#jadwal<?= $a['id_proyek'] ?>" data-toggle="modal" class="btn btn-primary">
                            Jadwal
                        </button>


                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="pilih<?= $a['id_proyek'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Dosen Penguji</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('koor/proyek/ajukan_dospeng') ?>" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <input autocomplete="off" type="hidden" class="form-control" id="id_proyek" value="<?= $a['id_proyek'] ?>" name="id_proyek">

                                            <label for="">Pilih Dosen Penguji</label>
                                            <select class="  form-control" id="dospeng" name="dospeng" required>
                                                <option class="" value="">--pilih--</option>
                                                <?php foreach ($user as $us => $uss) : ?>
                                                    <option class="" value=" <?= $uss['nim'] ?>"> <?= $uss['nama'] ?></option>

                                                <?php

                                                endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Ajukan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="jadwal<?= $a['id_proyek'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajukan Sidang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('koor/proyek/jadwal_sidang') ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input autocomplete="off" type="hidden" class="form-control" id="id" value="<?= $a['id_proyek'] ?>" name="id">
                                            <label for="">Mulai Ajukan Sidang</label>
                                            <input autocomplete="off" type="date" class="form-control" id="jadwal" value="<?= $a['jadwal'] ?>" name="jadwal">

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Ajukan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </tr>
            <?php
            endforeach; ?>
        </tbody>

    </table>
</div>