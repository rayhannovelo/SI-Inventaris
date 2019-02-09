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
                                            <td width="160px">Kode Inventaris</td>
                                            <td>Nama Toko</td>
                                            <td>Asal Toko</td>
                                            <td>Tanggal Inventaris</td>
                                            <td>Perihal</td>
                                            <td>Status Opname</td>
                                             <td width="330px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($daftar_inventaris as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['kode_inventaris']; ?></td>
                                            <td><?php echo $value['nama_pengguna']; ?></td>
                                            <td><?php echo $value['asal'] == NULL ? '-' : $value['asal']; ?></td>
                                            <td><?php echo $value['tanggal_inventaris']; ?></td>
                                            <td><?php echo $value['perihal']; ?></td>
                                            <td><?php echo $value['status_opname']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('inventaris/detail_inventaris/'.$value['id_inventaris'])?>'" type="button"><i class="fa fa-eye"></i> Detail</button>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('inventaris/edit_inventaris/'.$value['id_inventaris'])?>'" type="button" <?php echo $value['status_opname'] == 'Belum Dilaksanakan' ? 'disabled' : ''; ?>><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-success dim" onclick="location.href='<?php echo site_url('inventaris/stok_opname/'.$value['id_inventaris'])?>'" type="button" <?php echo $value['status_opname'] == 'Sudah Dilaksanakan' ? 'disabled' : ''; ?>><i class="fa fa-search"></i> Stok Opname</button>
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