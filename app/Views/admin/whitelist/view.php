<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Manage <?= $title;?></div>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#basicModal"><i class="flaticon-381-file me-2"></i>Import Excel</button>
                            <!-- Modal -->
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Import Excel <?= $title;?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="image" class="form-label"><strong>File</strong></label>
                                                    <input class="dropify" name="file" id="input-file-now" type="file">
                                                    <small class="text-danger">
                                                        <?= !empty($error['file']) ? validation_show_error('file') : ''; ?>
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>User</th>
                                        <th>Wallet Address</th>
                                        <th>Status Plan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($whitelist as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['wallet_account'] ?></td>
                                        <td>
                                            <span
                                                class="badge  light <?= ($row['is_plan'] == 1) ? "badge-success" : "badge-danger";?>">
                                                <?= ($row['is_plan'] == 1) ? "Active" : "Inactive";?>
                                            </span>
                                        </td>
                                        <td width="15%">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="<?= base_url();?>admin/whitelist/edit/<?= $row['id'];?>"
                                                    class="btn btn-warning"><i class="flaticon-381-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>