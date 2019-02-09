            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <?php foreach ($barang as $key => $value) { ?>
                                <form class="m-t" role="form" action="<?php echo site_url('daftar_barang/edit_barang_form/'.$value['id_barang']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data barang akan diperbarui. Apakah Anda yakin?');">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategori Barang :</label>
                                                <select name="id_kategori" class="form-control">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <?php foreach ($kategori_barang as $key => $value1) { ?>
                                                        <option value="<?php echo $value1['id_kategori']; ?>" <?php echo $value['id_kategori'] == $value1['id_kategori'] ? 'selected' : ''; ?>><?php echo $value1['nama_kategori']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Barang :</label>
                                                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo $value['nama_barang']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Merk Barang :</label>
                                                <input type="text" name="merk" class="form-control" placeholder="Merk Barang" value="<?php echo $value['merk']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Harga Satuan :</label>
                                                <input type="number" name="harga" class="form-control" placeholder="Ditulis tanpa titik" value="<?php echo $value['harga']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Masa Barang (Tahun) :</label>
                                                <input type="number" name="masa_barang" class="form-control" placeholder="Dalam Tahun" value="<?php echo $value['masa_barang']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Satuan Barang :</label>
                                                <select name="satuan" class="form-control">
                                                    <option value="Buah" <?php echo $value['satuan'] == 'Buah' ? 'selected' : ''; ?>>Buah</option>
                                                    <option value="Set" <?php echo $value['satuan'] == 'Set' ? 'selected' : ''; ?>>Set</option>
                                                    <option value="Kg" <?php echo $value['satuan'] == 'Kg' ? 'selected' : ''; ?>>Kg (Kilogram)</option>
                                                    <option value="M" <?php echo $value['satuan'] == 'M' ? 'selected' : ''; ?>>M (Meter)</option>
                                                    <option value="Btg" <?php echo $value['satuan'] == 'Btg' ? 'selected' : ''; ?>> Btg (Batang)</option>
                                                    <option value="Unit" <?php echo $value['satuan'] == 'Unit' ? 'selected' : ''; ?>>Unit</option>
                                                    <option value="Pcs" <?php echo $value['satuan'] == 'Pcs' ? 'selected' : ''; ?>>Pcs (Pieces)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary block full-width m-b">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>