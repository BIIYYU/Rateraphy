<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
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
                    <h3 class="mb-0">Riwayat Transaksi</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message_edit_invoice'); ?>
                    <?= $this->session->flashdata('message_invoice'); ?>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>NIK</th>
                                    <th>Tanggal Teraphy</th>
                                    <th>No HP</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($invoice as $dt_invoice) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $dt_invoice['nama_pasien'] ?></td>
                                        <td><?= $dt_invoice['umur'] ?></td>
                                        <td><?= $dt_invoice['nik'] ?></td>
                                        <td><?= $dt_invoice['tanggal_teraphy'] ?></td>
                                        <td><?= $dt_invoice['no_hp'] ?></td>
                                        <td><?= $dt_invoice['keluhan'] ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>C_invoice/proses/<?= $dt_invoice['id_invoice'] ?>" class="btn btn-sm btn-success">Lihat Detail</a>
                                            <a href="<?= base_url() ?>C_invoice/transaksi_selesai/<?= $dt_invoice['id_invoice'] ?>" class="btn btn-sm btn-info" onclick="return confirm('Komplit Data ?')">Transaksi Selesai</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal
<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Bukti Pembayaran<span id="nomor_invoice_title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <img id="buktipembayaran" name="buktipembayaran" src="<?php echo base_url('assets/dataresto/invoice/' . $mk['bukti_pembayaran']) ?>" width="40%" />
            </div>
            
        </div>
    </div>
</div>

<script>
    function detail(id) {
        $.ajax({
            type: 'POST',
            url: `<?= base_url() ?>pembayaran/get_invoice_by_id/${id}`,
            dataType: 'json',
            success: (hasil) => {
              
                $('#buktipembayaran').attr("src", response.buktipembayaran);
                $('#viewModal').modal("show");
            }
        });
    }
</script> --> 