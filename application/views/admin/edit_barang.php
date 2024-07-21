<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Barang</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Barang</h3>
                        </div>

                        <form action="<?php echo site_url('adminpanel/update_barang/' . $detail_barang->id); ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= set_value('nama_barang', $detail_barang->nama_barang) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control" id="harga" value="<?= set_value('harga', $detail_barang->harga) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" name="stok" class="form-control" id="stok" value="<?= set_value('stok', $detail_barang->stok) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= set_value('keterangan', $detail_barang->keterangan) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" id="gambar">
                                    <?php if (!empty($detail_barang->gambar)): ?>
                                        <img src="<?= base_url('assets/gambar/' . $detail_barang->gambar) ?>" alt="Gambar Saat Ini" width="100">
                                        <input type="hidden" name="existing_gambar" value="<?= $detail_barang->gambar ?>">
                                    <?php endif; ?>
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="<?php echo site_url('adminpanel/dashboard'); ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                                <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>