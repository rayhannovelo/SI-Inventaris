            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <?php foreach ($permintaan as $key => $value) { ?>
                                <form class="m-t" role="form" action="<?php echo site_url('daftar_permintaan/proses_permintaan_form/'.$value['id_permintaan']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data permintaan akan diproses. Apakah Anda yakin?');">
                                <input type="hidden" name="id_pengguna" value="<?php echo $value['id_pengguna']; ?>">
                                <input type="hidden" name="perihal" value="Permintaan Barang">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pilih Toko :</label>
                                            <select name="id_pengguna" class="form-control" disabled="">
                                                <?php foreach ($daftar_toko as $key => $value1) { ?>
                                                    <option value="<?php echo $value1['id_pengguna']; ?>" <?php echo $value['id_pengguna'] == $value1['id_pengguna'] ? 'selected' : ''; ?>><?php echo $value1['nama_pengguna']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pilih Perihal :</label>
                                            <select name="perihal" class="form-control" disabled="">
                                                <option value="Permintaan Barang">permintaan Barang</option>
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
                                                <td width="150px">Harga</td>
                                                <td>Kuantitas permintaan</td>
                                                <td>Kuantitas Disetujui</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach($barang_permintaan as $key1 => $value1) { 
                                                    if($value['id_kategori'] == $value1['id_kategori']) {
                                            ?>
                                            <tr>
                                                <td><?php echo $key+1; ?></td>
                                                <td><?php echo $value1['nama_barang']; ?></td>
                                                <td><?php echo $value1['merk']; ?></td>
                                                <td><?php echo $value1['satuan']; ?></td>
                                                <td><?php echo 'Rp. '.number_format($value1['harga'], 2, ',', '.'); ?></td>
                                                <td><?php echo $value1['kuantitas']; ?></td>
                                                <td>
                                                    <input type="hidden" name="masa_barang[]" value="<?php echo $value1['masa_barang'] ?>">
                                                    <input type="hidden" name="id_barang[]" value="<?php echo $value1['id_barang'] ?>">
                                                    <input type="number" class="form-control" name="kuantitas_toko[]" value="<?php echo $value1['kuantitas']; ?>">
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