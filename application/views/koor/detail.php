    <div class="container border">
        <h1 style="margin-top: 80px;" class=" d-flex justify-content-center font-weight-bold">Detail Proyek</h1>
        <hr class="my-2">
        <div class="row border ">
            <div class=" mt-3 col-md-6">
                <a href="">
                    <p class=" pr-3 text-right">Memberitai</p>
                </a>
                <hr class="my-3">
                <a href="<?= base_url() ?>koor/proyek/detail?id_proyek=<?= $id_proyek ?>&detail=team">
                    <p class=" pr-3 text-right">Team Proyek</p>
                </a>
                <hr class="my-3">
                <a href="<?= base_url() ?>koor/proyek/detail?id_proyek=<?= $id_proyek ?>&detail=bimbingan">
                    <p class="pr-3 text-right">Bimbingan</p>
                </a>
                <hr class="my-3"><a href="<?= base_url() ?>koor/proyek/detail?id_proyek=<?= $id_proyek ?>&detail=sidang">
                    <p class=" pr-3 text-right">Dosen</p>
                </a>
                <hr class="my-3">
            </div>