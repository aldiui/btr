<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit <?= $title;?></div>
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
                                                    data-height="350"
                                                    data-default-file="<?= base_url('assets/images/plan/').$plan['image'];?>">
                                                <small class=" text-danger">
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
                                            name="name" id="name" value="<?= $plan['name'];?>">
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
                                            name="description" id="description"><?= $plan['description'];?></textarea>
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
                                            name="period_month" id="period_month" value="<?= $plan['period_month'];?>">
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
                                            name="period_day" id="period_day" value="<?= $plan['period_day'];?>">
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
                                            name="min_amount" id="min_amount" value="<?= $plan['min_amount'];?>">
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
                                            name="max_amount" id="max_amount" value="<?= $plan['max_amount'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['max_amount']) ? validation_show_error('max_amount') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="estimation"><strong>Estimation</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['estimation']) ? 'is-invalid' : ''; ?>"
                                            name="estimation" id="estimation" value="<?= $plan['estimation'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['estimation']) ? validation_show_error('estimation') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="return"><strong>Return (%)</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['return']) ? 'is-invalid' : ''; ?>"
                                            name="return" id="return" value="<?= $plan['return'];?>">
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
                                            <input type="radio"
                                                class="btn-check <?= ($plan['is_active'] == 1) ? "active" : "";?>"
                                                name="is_active" id="is_active1" autocomplete="off" value="1"
                                                <?= ($plan['is_active'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="is_active1">Active</label>
                                            <input type="radio"
                                                class="btn-check <?= ($plan['is_active'] == 0) ? "active" : "";?>"
                                                name="is_active" id="is_active2" autocomplete="off" value="0"
                                                <?= ($plan['is_active'] == 0) ? "checked" : "";?>>
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