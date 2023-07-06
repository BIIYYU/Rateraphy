<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    
    </section><!-- End Breadcrumbs -->

  <!-- ======= Event List Section ======= -->
  <section id="event-list" class="event-list">
    <!-- <div class="container">

      <div class="row">
        <?php
        foreach ($menu as $m) {
          $id_menu = $m['id_menu'];
        ?>
          <div class="col-md-3 d-flex align-items-stretch">
          <a href="<?php base_url() ?>katalog/detail/<?= $m['id_menu'] ?>">
            <div class="card">
              <div class="card-img">
                <?php
                $getGambar = $this->db->query("SELECT * FROM gambar_menu WHERE id_menu = $id_menu LIMIT 1");
                foreach ($getGambar->result_array() as $gambarm) {
                  $gambar = $gambarm['gambar'];
                }
                ?>
                <img style="object-fit: cover;height:400px;width:100%" src="<?php echo base_url('assets/dataresto/menu/' . $gambar) ?>" />
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= $m['nama_menu'] ?></h5>
                <p class="fst-italic text-center"><?= $m['detail_menu'] ?></p>
                <p class="card-text text-center">Rp.<?= $m['harga'] ?></p>
              </div>
            </div>
              </a>
          </div>
        <?php
        }
        ?>
      </div>

    </div> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><b>LIST MENU</b></h2>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="table-primary align-middle text-center" rowspan="1" colspan="1">No</th>
                                <th class="table-primary align-middle text-center" rowspan="1" colspan="1">Menu</th>
                                <th class="table-primary align-middle text-center" rowspan="1" colspan="1">Keterangan</th>
                                <th class="table-primary align-middle text-center" rowspan="1" colspan="1">Harga</th>
                                <th class="table-primary align-middle text-center" rowspan="1" colspan="1">Foto Menu</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php if (isset($menu)) {
                                $no_menu = 1; ?>
                                <?php foreach ($menu as $menu_row) { 
                                    $id_menu = $menu_row['id_menu']; ?>
                                    <div class="col-md-3 d-flex align-items-stretch">
                                        <tr>
                                            <td class="card-title">
                                                <a href="<?php base_url() ?>katalog/detail/<?= $menu_row['id_menu'] ?>"><?= $no_menu++ ;?></a>
                                            </td>
                                            <td class="card-title">
                                                <a href="<?php base_url() ?>katalog/detail/<?= $menu_row['id_menu'] ?>"><?= $menu_row['nama_menu'] ?></a>
                                            </td>
                                            <td class="fst-italic text-center">
                                                <a href="<?php base_url() ?>katalog/detail/<?= $menu_row['id_menu'] ?>"><?= $menu_row['detail_menu'] ?></a>
                                            </td>
                                            <td class="fst-italic text-center">
                                                <a href="<?php base_url() ?>katalog/detail/<?= $menu_row['id_menu'] ?>">Rp. <?= $menu_row['harga'] ?></a>
                                            </td>
                                            <td>
                                                <?php
                                                    $getGambar = $this->db->query("SELECT * FROM gambar_menu WHERE id_menu = $id_menu LIMIT 1");
                                                    foreach ($getGambar->result_array() as $gambarm) {
                                                        $gambar = $gambarm['gambar'];
                                                    }
                                                ?>                                                        
                                                <a href="<?php echo base_url('assets/dataresto/menu/' . $gambar) ?>" class="glightbox" title="<?= $menu_row['detail_menu'] ?>">
                                                    <img style="object-fit: cover;height:400px;width:100%" src="<?php echo base_url('assets/dataresto/menu/' . $gambar) ?>" />
                                                </a>
                                            </td>
                                        </tr>
                                    </div>
                            <?php }
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="table-primary align-middle text-left" rowspan="1" colspan="5"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section><!-- End Event List Section -->

</main><!-- End #main -->