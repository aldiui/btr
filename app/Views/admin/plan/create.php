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
                        <a href="<?= base_url();?>admin/plan" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
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
                                        <label class="mb-1" for="description"><strong>Description</strong></label>
                                        <textarea
                                            class="form-control <?= !empty($error['description']) ? 'is-invalid' : ''; ?>"
                                            name="description" id="description"><?= old('description');?></textarea>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['description']) ? validation_show_error('description') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="period_month"><strong>Period Month</strong></label>
                                        <input type="number"
                                            class="form-control <?= !empty($error['period_month']) ? 'is-invalid' : ''; ?>"
                                            name="period_month" id="period_month" value="<?= old('period_month');?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['period_month']) ? validation_show_error('period_month') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="period_day"><strong>Period Day</strong></label>
                                        <input type="number"
                                            class="form-control <?= !empty($error['period_day']) ? 'is-invalid' : ''; ?>"
                                            name="period_day" id="period_day" value="<?= old('period_day');?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['period_day']) ? validation_show_error('period_day') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="min_amount"><strong>Minimal Amount</strong></label>
                                        <input type="number"
                                            class="form-control <?= !empty($error['min_amount']) ? 'is-invalid' : ''; ?>"
                                            name="min_amount" id="min_amount" value="<?= old('min_amount');?>"
                                            step="0.1">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['min_amount']) ? validation_show_error('min_amount') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="max_amount"><strong>Maximal Amount</strong></label>
                                        <input type="number"
                                            class="form-control <?= !empty($error['max_amount']) ? 'is-invalid' : ''; ?>"
                                            name="max_amount" id="max_amount" value="<?= old('max_amount');?>"
                                            step="0.1">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['max_amount']) ? validation_show_error('max_amount') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="return"><strong>Fixed (x)</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['return']) ? 'is-invalid' : ''; ?>"
                                            name="return" id="return" value="<?= old('return');?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['return']) ? validation_show_error('return') : ''; ?>
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