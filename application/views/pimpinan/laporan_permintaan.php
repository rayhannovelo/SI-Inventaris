            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                <table id="laporan_permintaan" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Toko</td>
                                            <td>Tanggal Permintaan</td>
                                            <td>Status Permintaan</td>
                                            <!-- <td>Aksi</td> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_permintaan as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_pengguna']; ?></td>
                                            <td><?php echo $value['tanggal_permintaan']; ?></td>
                                            <td><?php echo $value['status_permintaan']; ?></td>
                                            <!--
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('daftar_permintaan/detail_permintaan/'.$value['id_permintaan'])?>'" type="button"><i class="fa fa-eye"></i> Detail</button>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_permintaan/proses_permintaan/'.$value['id_permintaan'])?>'" type="button" <?php echo $value['status_permintaan'] != 'Belum Dikonfirmasi' ? 'disabled' : ''; ?>><i class="fa fa-edit"></i> Proses permintaan</button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data permintaan akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_permintaan/hapus_permintaan/'.$value['id_permintaan'])?>'" type="button" <?php echo $value['status_permintaan'] != 'Belum Dikonfirmasi' ? 'disabled' : ''; ?>><i class="fa fa-trash"></i> Hapus</button>
                                                </div>
                                            </td>
                                            -->
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