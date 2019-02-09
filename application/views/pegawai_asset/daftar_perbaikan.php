            <div class="wrapper wrapper-content  animated fadeInRight">
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
                                            <td>Nama Toko</td>
                                            <td>Tanggal Perbaikan</td>
                                            <td>Status Perbaikan</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_perbaikan as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_pengguna']; ?></td>
                                            <td><?php echo $value['tanggal_perbaikan']; ?></td>
                                            <td><?php echo $value['status_perbaikan']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('perbaikan/detail_perbaikan/'.$value['id_perbaikan'])?>'" type="button"><i class="fa fa-eye"></i> Detail</button>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('perbaikan/proses_perbaikan/'.$value['id_perbaikan'])?>'" type="button" <?php echo $value['status_perbaikan'] != 'Belum Dilaksanakan' ? 'disabled' : ''; ?>><i class="fa fa-edit"></i> Proses Perbaikan</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data perbaikan akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('perbaikan/hapus_perbaikan/'.$value['id_perbaikan'])?>'" type="button" <?php echo $value['status_perbaikan'] != 'Belum Dilaksanakan' ? 'disabled' : ''; ?>><i class="fa fa-trash"></i> Hapus</button>
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