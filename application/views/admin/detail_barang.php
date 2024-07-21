  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Detail Produk</h1>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card card-solid">
              <div class="card-body">
                  <div class="row">
                      <div class="col-12 col-sm-6">
                          <div class="col-12">
                              <img src="<?= base_url('assets/gambar/' . $detail_barang->gambar) ?>" class="product-image" alt="Gambar Produk">
                          </div>
                      </div>
                      <div class="col-12 col-sm-6">
                          <h3 class="my-3"><?php echo $detail_barang->nama_barang; ?></h3>
                          <hr>
                          <p><?php echo $detail_barang->keterangan; ?></p>
                          <hr>
                          <h6>Stok : <?php echo $detail_barang->stok; ?></h6>
                          <div class="bg-gray py-2 px-3 mt-4">
                              <h2 class="mb-0">Rp <?php echo $detail_barang->harga; ?></h2>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer">
                  <a href="<?php echo site_url('adminpanel/data_barang'); ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i> Kembali</a>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->