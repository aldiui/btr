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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>TRX</th>
                                        <th>Privatesale Contribute</th>
                                        <th>Amount</th>
                                        <th>Time Staking</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaction as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['no_transaction'] ?></td>
                                        <td><?= $row['plan'] ?></td>
                                        <td><?= $row['amount'] ?> BUSD</td>
                                        <td>
                                            <?php if ($row['is_active'] == 4): ?>
                                            <span class="badge light badge-info">
                                                Completed
                                            </span>
                                            <?php else: ?>
                                            <?php if ($row['date'] != null): ?>
                                            <?php $take = days($row['created_at'], $row['day']); ?>
                                            <?= $take['date']; ?> (<?= $take['day']; ?> Days)
                                            <?php else: ?>
                                            <span class="badge light badge-warning">
                                                Pending
                                            </span>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="badge light <?= ($row['is_active'] == 1) ? "badge-success" : (($row['is_active'] == 2) ? "badge-danger" : (($row['is_active'] == 4) ? "badge-info" : "badge-warning")); ?>">
                                                <?= ($row['is_active'] == 1) ? "Success" : (($row['is_active'] == 2) ? "Rejected" : (($row['is_active'] == 4) ? "Completed" : "Pending")); ?>
                                            </span>
                                        </td>
                                        <td width="15%">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="<?= base_url();?>transaction/detail/<?= $row['id_trx'];?>"
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