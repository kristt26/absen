<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
    <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-block bg-c-green">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-white"><?= $karyawan?></h4>
                        <h6 class="text-white m-b-0">Total Karyawan</h6>
                    </div>
                    <div class="col-4 text-right text-white">
                        <i class="fa fa-users f-28"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-12">
        <div class="card">
            <div class="card-block bg-c-purple">
                <div class="row align-items-center ">
                    <div class="col-8">
                        <h4 class="text-white"><?= $absen?></h4>
                        <h6 class="text-white m-b-0">Kehadiran hari ini</h6>
                    </div>
                    <div class="col-4 text-right text-white">
                        <i class="fa fa-paper-plane f-28"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <div class="col-md-8">
</div>
<div class="col-md-4">
    <div class="card" style="height: 200px;">
        <p style="font-size: large;">Sistem Informasi Absensi</p>
    </div>
</div> -->
<?= $this->endSection() ?>