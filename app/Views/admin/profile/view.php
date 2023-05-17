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
                                                    data-default-file="<?= base_url('assets/images/user/').$account['image'];?>">
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
                                            name="name" id="name" value="<?= $account['name'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['name']) ? validation_show_error('name') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="username"><strong>Username</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['username']) ? 'is-invalid' : ''; ?>"
                                            name="username" id="username" value="<?= $account['username'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['username']) ? validation_show_error('username') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="email"><strong>Email</strong></label>
                                        <input type="email"
                                            class="form-control <?= !empty($error['email']) ? 'is-invalid' : ''; ?>"
                                            name="email" id="email" value="<?= $account['email'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['email']) ? validation_show_error('email') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="created_at"><strong>Created at</strong></label>
                                        <input type="text" class="form-control" name="text" id="created_at"
                                            value="<?= dated($account['created_at']);?>" readonly>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Change Password</div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url();?>admin/profile/changepassword" method="post" autocomplete="off"
                            class="needs-validation">
                            <?= csrf_field();?>
                            <div class=" row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="old"><strong>Old Password</strong></label>
                                        <input type="password"
                                            class="form-control  <?= !empty($error['old']) ? 'is-invalid' : ''; ?>"
                                            name="old" id="old">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['old']) ? validation_show_error('old') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="password"><strong>New Password</strong></label>
                                        <input type="password"
                                            class="form-control  <?= !empty($error['password']) ? 'is-invalid' : ''; ?>"
                                            name="password" id="password">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['password']) ? validation_show_error('password') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="confirm"><strong>Confirm Password</strong></label>
                                        <input type="password"
                                            class="form-control  <?= !empty($error['confirm']) ? 'is-invalid' : ''; ?>"
                                            name="confirm" id="confirm">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['confirm']) ? validation_show_error('confirm') : ''; ?>
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