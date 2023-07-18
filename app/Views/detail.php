<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="text-right">
                <a href="<?= base_url("laporan/excel/").$tanggal['mulai']."/".$tanggal['sampai']."/".$karyawan->id?>" class="btn btn-info btn-sm text-white" target="_blank"><i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i> To Excel</a>
            </div>
            <table class="ml-4">
                <tr>
                    <th>Nama</th>
                    <th>: <?= $karyawan->nama?></th>
                </tr>
                <tr>
                    <th>Gender</th>
                    <th>: <?= $karyawan->gender?></th>
                </tr>
                <tr>
                    <th>Hp</th>
                    <th>: <?= $karyawan->hp?></th>
                </tr>
            </table>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Datang</th>
                                <th>Pulang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) : ?>
                                <tr>
                                    <td><?= $key+1?></td>
                                    <td><?= $value['tanggal']?></td>
                                    <td><?= isset($value['data']->datang) ? $value['data']->datang : "" ?></td>
                                    <td><?= isset($value['data']->pulang) ? $value['data']->pulang : "" ?></td>
                                    <td><?= isset($value['data']->keterangan) ? $value['data']->keterangan : "" ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="h2">Are you sure?</h2>
                <p>The data will be deleted and lost forever</p>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>