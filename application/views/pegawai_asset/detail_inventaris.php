            <?php // echo substr('INV021/PSB/K001/001/T003/27072018', 16, 3);// print_r($barang_inventaris); ?>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Perihal :</label>
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
                                            <label>Toko :</label>
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
                                <?php } $no = 1; ?>
                                <?php foreach ($kategori_barang as $key1 => $value) { ?>
                                    <h2><strong><center><?php echo $value['nama_kategori'] ?></center></strong></h2>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" align="center">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td width="290px">Kode Barang</td>
                                                <td>Nama Barang</td>
                                                <td>Merk</td>
                                                <td>Satuan</td>
                                                <td width="140px">Harga</td>
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
                                                $found = false;
                                                foreach($barang_inventaris as $key => $value1) { 
                                                    if($value['id_kategori'] == $value1['id_kategori']) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
            <td>
                <ul style="text-align: left">
                <?php 
                    //echo '<li>'.$value1['kode_barang'].'</li>'; 

                    $kode_barang = str_replace('/', '-', $value1['kode_barang']);

                    if($this->session->userdata('level') == 1) {
                        if($value1['masa_barang'] < 5) { 
                        echo '<li>'.'<a href="'.site_url('daftar_inventaris/print_kode/'.$kode_barang).'">'.$value1['kode_barang'].'</a>'.'</li>'; 
                        }else {
                            $x = substr($value1['kode_barang'], 16, 3);
                            for($i = 0; $i < $value1['kuantitas_toko']; $i++) {
                                $nomor = str_pad($x, 3, "0", STR_PAD_LEFT);
                                $string = substr_replace($value1['kode_barang'], $nomor, 16, 3);
                                $kode_barang = str_replace('/', '-', $string);
                                echo '<li>'.'<a href="'.site_url('daftar_inventaris/print_kode/'.$kode_barang).'">'.$string.'</a>'.'</li>';
                                $x++;
                            }
                        } 
                    }else {
                        if($value1['masa_barang'] < 5) { 
                        echo '<li>'.$value1['kode_barang'].'</li>'; 
                        }else {
                            $x = substr($value1['kode_barang'], 16, 3);
                            for($i = 0; $i < $value1['kuantitas_toko']; $i++) {
                                $nomor = str_pad($x, 3, "0", STR_PAD_LEFT);
                                $string = substr_replace($value1['kode_barang'], $nomor, 16, 3);
                                $kode_barang = str_replace('/', '-', $string);
                                echo '<li>'.$string.'</li>';
                                $x++;
                            }
                        } 
                    }
                    
                    
                ?>
                </ul>
            </td>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>