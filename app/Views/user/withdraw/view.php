<?= $this->extend('layout/layout_user'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Manage <?= $title;?></div>
                        <?php if($account['main_wallet'] > 0 OR $account['dividen_wallet'] > 0):?>
                        <a href="<?= base_url();?>withdraw/create" class="btn btn-primary ms-auto">+ Add</a>
                        <?php endif;?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>TRX</th>
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
                                    foreach ($withdraw as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['no_transaction'] ?></td>
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
                                                <a href="<?= base_url();?>withdraw/edit/<?= $row['id'];?>"
                                                    class="btn <?= ($row['is_active'] == 1) ? "btn-info" : "btn-warning"; ?>"><i
                                                        class="flaticon-381-edit"></i></a>
                                                <?php if($row['is_active'] != 1):?>
                                                <a href="<?= base_url();?>withdraw/delete/<?= $row['id'];?>"
                                                    class="btn btn-danger deleted"><i
                                                        class="flaticon-133-trash"></i></a>
                                                <?php endif;?>
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