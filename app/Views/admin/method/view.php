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
                        <a href="<?= base_url();?>admin/method/create" class="btn btn-primary ms-auto">+ Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Network</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($method as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img src="<?= base_url()?>assets/images/method/<?= $row['image'];?>"
                                                width="50" alt="" /></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td>
                                            <span
                                                class="badge  light <?= ($row['is_active'] == 1) ? "badge-success" : "badge-danger";?>">
                                                <?= ($row['is_active'] == 1) ? "Active" : "Inactive";?>
                                            </span>
                                        </td>
                                        <td width="15%">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="<?= base_url();?>admin/method/edit/<?= $row['id'];?>"
                                                    class="btn btn-warning"><i class="flaticon-381-edit"></i></a>
                                                <a href="<?= base_url();?>admin/method/delete/<?= $row['id'];?>"
                                                    class="btn btn-danger deleted"><i
                                                        class="flaticon-133-trash"></i></a>
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