<?= $this->extend('layout/layout_user'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add <?= $title;?></div>
                        <a href="<?= base_url();?>withdraw" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off">
                            <?= csrf_field();?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="amount" class="mb-1"><strong>Amount</strong></label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control <?= !empty($error['amount']) ? 'is-invalid' : ''; ?>"
                                                name="amount" id="amount" value="<?= old('amount');?>">
                                            <span class=" input-group-text">USD</span>
                                        </div>
                                        <small class="small text-danger">
                                            <?= !empty($error['amount']) ? validation_show_error('amount') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="wallet_user"><strong>Wallet User</strong></label>
                                        <select
                                            class="form-control  <?= !empty($error['wallet_user']) ? 'is-invalid' : ''; ?>"
                                            name="wallet_user" id="wallet_user">
                                            <option value="">-- Select Wallet User --</option>
                                            <?php foreach($wallet_user as $row):?>
                                            <option value="<?= $row;?>"
                                                <?= (old("wallet_user") == $row) ? "selected" : "";?>>
                                                <?= $row;?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['wallet_user']) ? validation_show_error('wallet_user') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="wallet"><strong>Wallet</strong></label>
                                        <select
                                            class="form-control  <?= !empty($error['wallet']) ? 'is-invalid' : ''; ?>"
                                            name="wallet" id="wallet">
                                            <option value="">-- Select Wallet --</option>
                                            <?php foreach($wallet as $row):?>
                                            <option value="<?= $row['id'];?>"
                                                <?= (old("wallet") == $row['id']) ? "selected" : "";?>>
                                                <?= $row['name'];?> - <?= $row['method_name'];?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['wallet']) ? validation_show_error('wallet') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>