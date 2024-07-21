<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Input pencarian di sebelah kiri -->
                            <div class="input-group input-group-sm mr-auto" style="width: 200px;">
                                <input type="text" name="table_search" id="tableSearch" class="form-control" placeholder="Cari Barang">
                            </div>
                            <!-- Grup tombol di sebelah kanan -->
                            <div class="btn-group ml-auto">
                                <a href="<?php echo site_url('adminpanel/tambah_barang'); ?>" class="btn btn-warning btn-sm ml-2"><i class="fas fa-plus"></i> Tambah Barang</a>
                                <button id="printTable" class="btn btn-info btn-sm ml-2"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>NAMA BARANG</th>
                                    <th>HARGA</th>
                                    <th>STOK</th>
                                    <th>GAMBAR</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <?php $no = 1;
                            foreach ($barang as $brg) : ?>
                                <tbody>
                                    <tr class="text-center">
                                        <td><?= $no++ ?></td>
                                        <td><?= $brg->nama_barang ?></td>
                                        <td><?= $brg->harga ?></td>
                                        <td><?= $brg->stok ?></span></td>
                                        <td><img src="<?= base_url('assets/gambar/' . $brg->gambar) ?>" alt="Gambar Produk" width="75px"></td>
                                        <td>
                                            <a href="<?= 'detail_barang/' . $brg->id ?>" class="btn btn-primary btn-sm mr-2"><i class="fas fa-eye"></i></a>
                                            <a href="<?= 'edit_barang/' . $brg->id ?>" class="btn btn-warning btn-sm mr-2"><i class="fas fa-pen"></i></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm hapus-barang" data-url="<?= site_url('adminpanel/hapus_barang/' . $brg->id) ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>