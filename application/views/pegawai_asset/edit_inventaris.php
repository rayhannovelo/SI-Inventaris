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
                                <form class="m-t" role="form" action="<?php echo site_url('daftar_inventaris/edit_inventaris_form/'.$value['id_inventaris']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data inventaris akan ditambah. Apakah Anda yakin?');">
                                <input type="hidden" value="<?php echo $value['kode_inventaris'] ?>" name="kode_inventaris">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pilih Perihal :</label>
                                            <select name="perihal" class="form-control">
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
                                            <select name="id_pengguna" class="form-control">
                                                <?php foreach ($daftar_toko as $key => $value1) { ?>
                                                    <option value="<?php echo $value1['id_pengguna']; ?>" <?php echo $value['id_pengguna'] == $value1['id_pengguna'] ? 'selected' : ''; ?>><?php echo $value1['nama_pengguna']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Asal Toko : (Diisi Jika Mutasi Barang)</label>
                                            <select name="asal_toko" class="form-control">
                                                <option value="">-- Pilih Asal Toko --</option>
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
                                                <td>Nama Barang</td>
                                                <td>Merk</td>
                                                <td>Satuan</td>
                                                <td>Harga</td>
                                                <td>Satuan</td>
                                                <td>Kuantitas</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $found = false;
                                                foreach($daftar_barang as $key => $value1) { 
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
                                                    <input type="hidden" name="masa_barang[]" value="<?php echo $value1['masa_barang'] ?>">
                                                    <input type="hidden" name="id_barang[]" value="<?php echo $value1['id_barang'] ?>">
                                                    <input type="hidden" name="id_kategori[]" value="<?php echo $value1['id_kategori'] ?>">
                                                    <?php 
                                                        foreach ($barang_inventaris as $key => $value2) { 
                                                            if($value1['id_barang'] == $value2['id_barang']) {
                                                    ?>
                                                        <input type="number" name="kuantitas_toko[]" class="form-control" placeholder="Kuantitas Barang" value="<?php echo $value2['kuantitas_toko']; ?>">
                                                    <?php 
                                                        $found = true; }} 
                                                        if($found != true) {
                                                    ?>
                                                        <input type="number" name="kuantitas_toko[]" class="form-control" placeholder="Kuantitas Barang">
                                                    <?php }else { $found = false; } ?>
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