<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-user"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">All Customer</p>
                                <h3 class="text-white"><?= $allcustomer;?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-success">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-dollar-sign"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Sale Success</p>
                                <h3 class="text-white"><?= $alltransaction;?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-secondary ">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-wallet"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Customer Success</p>
                                <h3 class="text-white"><?= $allcontribute;?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Privatesale Contribution for the last 7 days</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart_1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Transaction Privatesale Contribution</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>TRX</th>
                                        <th>User</th>
                                        <th>Privatesale Contribute</th>
                                        <th>Amount</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaction as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['no_transaction'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['plan'] ?></td>
                                        <td>$ <?= $row['amount'] ?> USD</td>
                                        <td><?= dated($row['created_at']) ?></td>
                                        <td>
                                            <span
                                                class="badge light <?= ($row['active'] == 1) ? "badge-success" : (($row['active'] == 2) ? "badge-danger" : (($row['active'] == 4) ? "badge-info" : "badge-warning")); ?>">
                                                <?= ($row['active'] == 1) ? "Success" : (($row['active'] == 2) ? "Rejected" : (($row['active'] == 4) ? "Completed" : "Pending")); ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User Regsitrasion</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>Image</th>
                                        <th>Username</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($customer as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img src="<?= base_url()?>assets/images/user/<?= $row['image'];?>"
                                                width="50" alt="" /></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= dated($row['created_at']) ?></td>
                                        <td>
                                            <span
                                                class="badge  light <?= ($row['is_active'] == 1) ? "badge-success" : "badge-danger";?>">
                                                <?= ($row['is_active'] == 1) ? "Active" : "Inactive";?>
                                            </span>
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