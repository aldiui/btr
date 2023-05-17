<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add <?= $title;?></div>
                        <a href="<?= base_url();?>admin/method" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field();?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="image" class="form-label"><strong>Image</strong></label>
                                                <input class="dropify" name="image" id="input-file-now" type="file"
                                                    data-height="350">
                                                <small class="text-danger">
                                                    <?= !empty($error['image']) ? validation_show_error('image') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <label class="mb-1" for="network"><strong>Network</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['network']) ? 'is-invalid' : ''; ?>"
                                            name="network" id="network" value="<?= old('network');?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['network']) ? validation_show_error('network') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="wallet_image" class="form-label"><strong>Wallet
                                                        Image</strong></label>
                                                <input class="dropify" name="wallet_image" id="input-file-now"
                                                    type="file" data-height="350">
                                                <small class=" text-danger">
                                                    <?= !empty($k['wallet_image']) ? validation_show_error('wallet_image') : ''; ?>
                                                </small>
                                            </div>
                                        </div>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="is_active"><strong>Status</strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check active" name="is_active"
                                                id="is_active1" autocomplete="off" value="1" checked>
                                            <label class="btn btn-outline-success" for="is_active1">Active</label>
                                            <input type="radio" class="btn-check" name="is_active" id="is_active2"
                                                autocomplete="off" value="0">
                                            <label class="btn btn-outline-danger" for="is_active2">Inactive</label>
                                        </div>
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