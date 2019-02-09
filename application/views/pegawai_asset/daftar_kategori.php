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
                                <form class="m-t" role="form" action="<?php echo site_url('daftar_kategori/tambah_kategori_form/'); ?>" method="post" enctype="multipart/form-data" onsubmit="return confirm('Data kategori akan ditambah. Apakah Anda yakin?');">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Kategori :</label>
                                                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                                            </div>
                                        </div>
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
                                            <td>Nama Kategori</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($kategori_barang as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_kategori']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_kategori/edit_kategori/'.$value['id_kategori'])?>'" type="button"><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data seluruh barang dengan kategori ini akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_kategori/hapus_kategori/'.$value['id_kategori'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
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