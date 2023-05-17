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
                        <a href="<?= base_url();?>wallet" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off">
                            <?= csrf_field();?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="name"><strong>Name</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['name']) ? 'is-invalid' : ''; ?>"
                                            name="name" id="name" value="<?= old('name');?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['name']) ? validation_show_error('name') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="method"><strong>Method</strong></label>
                                        <select
                                            class="form-control  <?= !empty($error['method']) ? 'is-invalid' : ''; ?>"
                                            name="method" id="method">
                                            <option value="">-- Select Method --</option>
                                            <?php foreach($method as $row):?>
                                            <option value="<?= $row['id'];?>"
                                                <?= (old("method") == $row['id']) ? "selected" : "";?>>
                                                <?= $row['name'];?> - <?= $row['network'];?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['method']) ? validation_show_error('method') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-1" for="wallet_address"><strong>Wallet Address</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['wallet_address']) ? 'is-invalid' : ''; ?>"
                                            name="wallet_address" id="wallet_address"
                                            value="<?= old('wallet_address');?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['wallet_address']) ? validation_show_error('wallet_address') : ''; ?>
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