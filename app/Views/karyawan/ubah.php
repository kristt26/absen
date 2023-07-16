<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="col-12">

    <div class="card">
        <div class="card-header">
            <h5>Ubah Karyawan</h5>
            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
        </div>
        <div class="card-block">
            <form class="form-material" action="<?= base_url('karyawan/update/'.$data->id)?>" method="post">
                <div class="form-group form-default">
                    <input type="text" name="nama" class="form-control" required="" value="<?= $data->nama ?>">
                    <span class="form-bar"></span>
                    <label class="float-label">Nama Karyawan</label>
                </div>
                <div class="form-group form-default">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" name="tempat_lahir" class="form-control" required="" value="<?= $data->tempat_lahir ?>">
                            <span class="form-bar"></span>
                            <label class="float-label ml-3">Tempat Lahir</label>
                        </div>
                        <div class="col-2">
                            <input type="date" name="tanggal_lahir" class="form-control" required="" value="<?= $data->tanggal_lahir ?>">
                            <span class="form-bar"></span>
                            <label class="float-label ml-3">Tanggal Lahir</label>
    
                        </div>

                    </div>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="hp" class="form-control" required="" value="<?= $data->hp ?>">
                    <span class="form-bar"></span>
                    <label class="float-label">Handphone</label>
                </div>
                
                <div class="form-group form-default">
                    <textarea class="form-control" required="" name="alamat"><?= $data->alamat ?></textarea>
                    <span class="form-bar"></span>
                    <label class="float-label">Text area Input</label>
                </div>
                <div class="form-group form-default text-right">
                    <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>