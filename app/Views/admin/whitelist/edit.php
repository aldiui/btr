<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit
                            <?= $title;?></div>
                        <a href="<?= base_url();?>admin/whitelist" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7%">#</th>
                                        <th>Name</th>
                                        <th>Method</th>
                                        <th>Network</th>
                                        <th>Wallet Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($wallet as $row) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['method_name'] ?></td>
                                        <td><?= $row['network'] ?></td>
                                        <td><?= $row['wallet_address'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if($user['is_plan'] != 1):?>
                        <form action="" method="post" autocomplete="off">
                            <?= csrf_field();?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="is_plan"><strong>Status Plan</strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($user['is_plan'] == 1) ? "active" : "";?>"
                                                name="is_plan" id="is_plan1" autocomplete="off" value="1"
                                                <?= ($user['is_plan'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="is_plan1">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>