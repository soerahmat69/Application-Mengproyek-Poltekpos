<div class="container p-3">

    <div class="col m-4">
        <h1 class="d-flex justify-content-center font-weight-bold">Manage Proposal</h1>
    </div>

    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#proposal">
        Pengajuan Proposal
    </button>


    <div class="modal fade" id="proposal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Buat Pengajuan Proposal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('koor/proyek/proposaldate'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input autocomplete="off" type="hidden" class="form-control" id="nim" value="<?= $nim ?>" name="nim">

                            <label for="" class="font-weight-bold">Isikan Tanggal Mulai Pengajuan :</label>
                            <input autocomplete="off" type="date" class="form-control" id="mulai" value="" name="mulai">
                        </div>
                        <div class="form-group"><label for="" class="font-weight-bold">Isikan Tanggal Akhir Pengajuan :</label>
                            <input autocomplete="off" type="date" class="form-control" id="akhir" value="" name="akhir">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <table id="table_barang" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Ketua</th>
                <th>Nama Partnert</th>
                <th>Nama Dosen Pembimbing</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($proyek as $a) :
            ?>
                <tr>
                    <td class="align-middle text-center"><?= $a['nama_mhs'] ?></td>
                    <td class="align-middle text-center"><?= $a['nama_partnert'] ?></td>
                    <td class="align-middle text-center"><?= $a['nama'] ?></td>
                    <td class="align-middle text-center">Proyek <?= $a['proyek'] ?></td>
                    <td class="align-middle text-center"><?php
                                                            if (isset($a['accept_proyek'])) {
                                                                $x = "badge badge-success";
                                                                $c = "Diterima ";
                                                            } else {
                                                                $x = "badge badge-danger";
                                                                $c = "Belum Diterima ";
                                                            }
                                                            ?><span class="<?= $x ?>"><?= $c ?></span></td>


                    <td width="140px">

                        <a href="<?= base_url(); ?>koor/proyek/detail?id_proyek=<?= $a['id_proyek']; ?>&detail=" class="btn btn-primary">
                            Lanjut...
                        </a>
                    </td>
                    <!-- Modal -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>