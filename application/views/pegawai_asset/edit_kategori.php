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
                                <?php foreach ($kategori_barang as $key => $value) { ?>
                                <form class="m-t" role="form" action="<?php echo site_url('daftar_kategori/edit_kategori_form/'.$value['id_kategori']); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data kategori akan diperbarui. Apakah Anda yakin?');">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Kategori :</label>
                                                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Barang" value="<?php echo $value['nama_kategori']; ?>" required>
                                            </div>
                                        </div>
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