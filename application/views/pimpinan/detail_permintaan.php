            <?php // print_r($barang_permintaan); ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <?php foreach ($permintaan as $key => $value) { ?>
                                <form class="m-t" role="form" action="<?php echo site_url('daftar_permintaan/edit_permintaan_form/'.$value['id_permintaan']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data permintaan akan ditambah. Apakah Anda yakin?');">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Toko :</label>
                                            <select name="id_pengguna" class="form-control" disabled>
                                                <?php foreach ($daftar_toko as $key => $value1) { ?>
                                                    <option value="<?php echo $value1['id_pengguna']; ?>" <?php echo $value['id_pengguna'] == $value1['id_pengguna'] ? 'selected' : ''; ?>><?php echo $value1['nama_pengguna']; ?></option>
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
                                                foreach($barang_permintaan as $key => $value1) { 
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
                                                    <input type="number" class="form-control" value="<?php echo $value1['kuantitas']; ?>" readonly>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <hr>
                                <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>