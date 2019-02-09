            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_perbaikan/tambah_perbaikan')?>'"><i class="fa fa-plus"></i> Tambah Perbaikan</button>
                    </div>
                    <div class="col-lg-8">
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
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Tanggal Perbaikan</td>
                                            <td>Status Perbaikan</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_perbaikan as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['tanggal_perbaikan']; ?></td>
                                            <td><?php echo $value['status_perbaikan']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('daftar_perbaikan/detail_perbaikan/'.$value['id_perbaikan'])?>'" type="button"><i class="fa fa-eye"></i> Detail</button>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_perbaikan/edit_perbaikan/'.$value['id_perbaikan'])?>'" type="button" <?php echo $value['status_perbaikan'] != 'Belum Dilaksanakan' ? 'disabled' : ''; ?>><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data perbaikan akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_perbaikan/hapus_perbaikan/'.$value['id_perbaikan'])?>'" type="button"><i class="fa fa-trash"></i> Hapus</button>
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