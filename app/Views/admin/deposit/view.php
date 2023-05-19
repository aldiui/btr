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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>TRX</th>
                                        <th>User</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($deposit as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['no_transaction'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['method'] ?></td>
                                        <td><?= $row['amount'] ?> BUSD</td>
                                        <td>
                                            <?= dated($row['created_at']);?>
                                        </td>
                                        <td>
                                            <span
                                                class="badge light <?= ($row['is_active'] == 1) ? "badge-success" : (($row['is_active'] == 2) ? "badge-danger" : "badge-warning"); ?>">
                                                <?= ($row['is_active'] == 1) ? "Success" : (($row['is_active'] == 2) ? "Rejected" : "Pending"); ?>
                                            </span>

                                        </td>
                                        <td width="15%">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="<?= base_url();?>admin/deposit/edit/<?= $row['id'];?>"
                                                    class="btn btn-info"><i class="flaticon-381-focus"></i></a>
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