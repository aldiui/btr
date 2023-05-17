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
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field();?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="image" class="form-label"><strong>Image</strong></label>
                                                <input class="dropify" name="image" id="input-file-now" type="file"
                                                    data-default-file="<?= base_url('assets/images/setting/').$setting['image'];?>">
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
                                            name="name" id="name" value="<?= $setting['name'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['name']) ? validation_show_error('name') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="short"><strong>Short Name</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['short']) ? 'is-invalid' : ''; ?>"
                                            name="short" id="short" value="<?= $setting['short'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['short']) ? validation_show_error('short') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="description"><strong>Description</strong></label>
                                        <textarea
                                            class="form-control <?= !empty($error['description']) ? 'is-invalid' : ''; ?>"
                                            name="description"
                                            id="description"><?= $setting['description'];?></textarea>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['description']) ? validation_show_error('description') : ''; ?>
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