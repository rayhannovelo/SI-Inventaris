            <?php // print_r($barang_inventaris); ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
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
                                <?php } ?>
                                <?php foreach ($kategori_barang as $key => $value) { ?>
                                    <h2><strong><center><?php echo $value['nama_kategori'] ?></center></strong></h2>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" align="center">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>Nama Barang</td>
                                                <td>Merk</td>
                                                <td>Satuan</td>
                                                <td>Harga</td>
                                                <td>Satuan</td>
                                                <td>Kuantitas Toko</td>
                                                <td>Kuantitas Pengawas</td>
                                                <td>Status Baik</td>
                                                <td>Status Rusak</td>
                                                <td>Keterangan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach($barang_inventaris as $key => $value1) { 
                                                    if($value['id_kategori'] == $value1['id_kategori']) {
                                            ?>
                                            <tr>
                                                <td><?php echo $key+1; ?></td>
                                                <td><?php echo $value1['nama_barang']; ?></td>
                                                <td><?php echo $value1['merk']; ?></td>
                                                <td><?php echo $value1['satuan']; ?></td>
                                                <td><?php echo 'Rp. '.number_format($value1['harga'], 2, ',', '.'); ?></td>
                                                <td><?php echo $value1['satuan']; ?></td>
                                                <td>
                                                    <input type="number" class="form-control" value="<?php echo $value1['kuantitas_toko']; ?>" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" value="<?php echo $value1['kuantitas_pengawas']; ?>" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"value="<?php echo $value1['status_baik']; ?>" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" value="<?php echo $value1['status_rusak']; ?>" readonly>
                                                </td>
                                                <td><?php echo $value1['keterangan'] == '' ? '-' : $value1['keterangan']; ?></td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <hr>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>