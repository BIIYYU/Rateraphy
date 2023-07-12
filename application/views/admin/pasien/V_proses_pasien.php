<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>C_pasien">Data Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Proses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Proses Pasien</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url() ?>C_pasien/proses_tambah_invoice" method="post" enctype="multipart/form-data">
                        <?php
                        // if(isset())
                        foreach ($pasien as $dt_pasien) { ?>
                            <input type="hidden" value="<?= $dt_pasien['id_pasien'] ?>" name="id_pasien">
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Nama pasien</label>
                                <input value="<?= $dt_pasien['nama_pasien'] ?>" type="text" required class="form-control" name="nama_pasien" readonly>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class="form-control-label">Umur</label>
                                <input type="text" name="umur" class="form-control" value="<?= $dt_pasien['umur']; ?>" placeholder="Umur" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">NIK</label>
                                <input value="<?= $dt_pasien['nik'] ?>" type="number" min="0" required class="form-control" name="nik" placeholder="NIK" readonly>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                                <input type="text" value="<?= $dt_pasien['alamat'] ?>" class="form-control" name="alamat" readonly>
                            </div>
                        <?php }
                        ?>
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label class="form-control-label">Tanggal Teraphy</label>
                                <input type="date" name="tanggal_teraphy" class="form-control" value="" required>
                            </div>
                            <div class="col-lg-4 form-group">
                                <label class="form-control-label">Jam Teraphy</label>
                                <input type="time" name="jam_teraphy" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea-input" class=" form-control-label">Keluhan</label>
                            <select class="form-control select2" multiple name="keluhan" placeholder="Pilih">
                                <option value="Pusing">Pusing</option>
                                <option value="Mual">Mual</option>
                                <option value="Migrain">Migrain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="textarea-input" class=" form-control-label">Diagnosa FT</label>
                            <input value="" type="text"  class="form-control" name="diagnosa" placeholder="Diagnnosa" required>
                        </div>
                        <div class="form-group">
                            <label for="textarea-input" class=" form-control-label">Intervensi</label>
                            <input value="" type="text"  class="form-control" name="intervensi" placeholder="Intervensi" required>
                        </div>
                        <div class="form-group">
                            <label for="textarea-input" class=" form-control-label">Terapi Ke</label>
                            <input value="" type="number" class="form-control" name="terapi_ke" placeholder="Terapi Ke" required>
                        </div>
                         <div class="text-center mb-3">
                                <button type="submit" class="btn btn-success btn-sm">Simpan Invoice</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>