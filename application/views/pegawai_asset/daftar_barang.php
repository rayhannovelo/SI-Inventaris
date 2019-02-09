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
                                <h5><?php echo $title1 ?></h5>
                            </div>
                            <div class="ibox-content">
                                <form class="m-t" role="form" action="<?php echo site_url('daftar_barang/tambah_barang_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data barang akan ditambah. Apakah Anda yakin?');">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategori Barang :</label>
                                                <select name="id_kategori" class="form-control">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <?php foreach ($kategori_barang as $key => $value) { ?>
                                                        <option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Barang :</label>
                                                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Merk Barang :</label>
                                                <input type="text" name="merk" class="form-control" placeholder="Merk Barang">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Harga Satuan :</label>
                                                <input type="number" name="harga" class="form-control" placeholder="Ditulis tanpa titik" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Masa Barang (Tahun) :</label>
                                                <input type="number" name="masa_barang" class="form-control" placeholder="Dalam Tahun" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Satuan Barang :</label>
                                                <select name="satuan" class="form-control">
                                                    <option value="Buah">Buah</option>
                                                    <option value="Set">Set</option>
                                                    <option value="Kg">Kg (Kilogram)</option>
                                                    <option value="M">M (Meter)</option>
                                                    <option value="Btg">Btg (Batang)</option>
                                                    <option value="Unit">Unit</option>
                                                    <option value="Pcs">Pcs (Pieces)</option>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Barang</td>
                                            <td>Kategori</td>
                                            <td>Merk</td>
                                            <td>Harga</td>
                                            <td>Masa Barang (Tahun)</td>
                                            <td>Satuan</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_barang as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_barang']; ?></td>
                                            <td><?php echo $value['nama_kategori']; ?></td>
                                            <td><?php echo $value['merk']; ?></td>
                                            <td><?php echo 'Rp. '.number_format($value['harga'], 2, ',', '.'); ?></td>
                                            <td><?php echo $value['masa_barang'] == 0 ? '-' : $value['masa_barang']; ?></td>
                                            <td><?php echo $value['satuan']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_barang/edit_barang/'.$value['id_barang'])?>'" type="button"><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data barang akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_barang/hapus_barang/'.$value['id_barang'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>