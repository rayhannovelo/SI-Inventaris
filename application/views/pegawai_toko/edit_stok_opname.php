            <?php // print_r($barang_inventaris); ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <?php foreach ($inventaris as $key => $value) { ?>
                                <form class="m-t" role="form" action="<?php echo site_url('inventaris/stok_opname_form/'.$value['id_inventaris']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Stok opname akan diperbarui. Apakah Anda yakin?');">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pilih Perihal :</label>
                                            <select name="perihal" class="form-control" disabled>
                                                <option value="Persediaan Stok Barang" <?php echo $value['perihal'] == 'Persediaan Stok Barang' ? 'selected' : ''; ?>>Persediaan Stok Barang</option>
                                                <option value="Permintaan Barang" <?php echo $value['perihal'] == 'Permintaan Barang' ? 'selected' : ''; ?>>Permintaan Barang</option>
                                                <option value="Perbaikan Barang" <?php echo $value['perihal'] == 'Perbaikan Barang' ? 'selected' : ''; ?>>Perbaikan Barang</option>
                                                <option value="Mutasi Barang" <?php echo $value['perihal'] == 'Mutasi Barang' ? 'selected' : ''; ?>>Mutasi Barang</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pilih Toko :</label>
                                            <select name="id_pengguna" class="form-control" disabled>
                                                <?php foreach ($daftar_toko as $key => $value1) { ?>
                                                    <option value="<?php echo $value1['id_pengguna']; ?>" <?php echo $value['id_pengguna'] == $value1['id_pengguna'] ? 'selected' : ''; ?>><?php echo $value1['nama_pengguna']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Asal Toko : (Diisi Jika Mutasi Barang)</label>
                                            <select name="asal_toko" class="form-control" disabled>
                                                <option value="">-</option>
                                                <?php foreach ($daftar_toko as $key => $value1) { ?>
                                                    <option value="<?php echo $value1['id_pengguna']; ?>" <?php echo $value['asal_toko'] == $value1['id_pengguna'] ? 'selected' : ''; ?>><?php echo $value1['nama_pengguna']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php foreach ($kategori_barang as $key => $value) { ?>
                                    <h2><strong><center><?php echo $value['nama_kategori'] ?></center></strong></h2>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" align="center">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Kode Barang</td>
                                                <td>Nama Barang</td>
                                                <td>Merk</td>
                                                <td>Satuan</td>
                                                <td width="150px">Harga</td>
                                                <td>Kuantitas Toko</td>
                                                <td>Kuantitas Pengawas</td>
                                                <td>Status Baik</td>
                                                <td>Status Rusak</td>
                                                <td>Keterangan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach($barang_inventaris as $key1 => $value1) { 
                                                    if($value['id_kategori'] == $value1['id_kategori']) {
                                            ?>
                                            <tr>
                                                <td><?php echo $key+1; ?></td>
                                                <td><?php echo $value1['kode_barang']; ?></td>
                                                <td><?php echo $value1['nama_barang']; ?></td>
                                                <td><?php echo $value1['merk']; ?></td>
                                                <td><?php echo $value1['satuan']; ?></td>
                                                <td><?php echo 'Rp. '.number_format($value1['harga'], 2, ',', '.'); ?></td>
                                                <td>
                                                    <input type="hidden" name="id_barang[]" value="<?php echo $value1['id_barang'] ?>">
                                                    <input type="hidden" name="kuantitas_awal[]" value="<?php echo $value1['kuantitas_awal'] ?>">
                                                    <input type="hidden" name="kode_barang[]" value="<?php echo $value1['kode_barang'] ?>">
                                                    <input type="number" class="form-control" name="kuantitas_toko[]" value="<?php echo $value1['kuantitas_toko']; ?>" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" name="kuantitas_pengawas[]" value="<?php echo $value1['kuantitas_pengawas']; ?>" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="status_baik[]" value="<?php echo $value1['status_baik']; ?>" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="status_rusak[]" value="<?php echo $value1['status_rusak']; ?>" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="keterangan[]" value="<?php echo $value1['keterangan']; ?>" class="form-control">
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <hr>
                                <?php } ?>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary block full-width m-b">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>