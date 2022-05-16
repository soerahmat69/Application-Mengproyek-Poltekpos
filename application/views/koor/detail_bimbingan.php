<div class="border-left px-4 mt-3 col-md-6">
    <h1 style="font-size: 30px;" class="mt-3 d-flex justify-content-center font-weight-bold">Bimbingan Proyek</h1>

    <table class=" mt-4 table-bordered table">
        <thead class="thead-light">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Kegiatan</th>
                <th class=" text-center">Nilai Ketua</th>
                <th class=" text-center">Nilai Partnert</th>
                <th class=" text-center">Pesan Dospem</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($bimbingan as $bim) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $bim['kegiatan'] ?></td>
                    <td><?= $bim['nilai_nim'] ?></td>
                    <td><?= $bim['nilai_partnert'] ?></td>
                    <td><?= $bim['pesan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>