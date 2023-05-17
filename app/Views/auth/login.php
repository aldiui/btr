<?= $this->extend('layout/layout_auth'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <img src="<?= base_url()?>assets/images/setting/<?= $setting['image'];?>" width="50" alt=""
                                class="logo-abbr" />
                        </div>
                        <h4 class="text-center mb-2"><?= $setting['name'];?></h4>
                        <p class=" text-center mb-3"><?= $setting['description'];?></p>
                        <h5 class="text-center mb-4">Login your account</h5>
                        <form action="" method="post" class="needs-validation" autocomplte="off">
                            <?= csrf_field();?>
                            <div class="form-group">
                                <label class="mb-1" for="email"><strong>Username or Email</strong></label>
                                <input type="text"
                                    class="form-control <?= !empty($error['email']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Input Email" name="email" id="email">
                                <small class="invalid-feedback">
                                    <?= !empty($error['email']) ? validation_show_error('email') : ''; ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="password"><strong>Password</strong></label>
                                <input type="password"
                                    class="form-control  <?= !empty($error['password']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Input Password" name="password" id="password">
                                <small class="invalid-feedback">
                                    <?= !empty($error['password']) ? validation_show_error('password') : ''; ?>
                                </small>
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ms-1">
                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1" />
                                        <label class="form-check-label" for="basic_checkbox_1">Remember my
                                            preference</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?= base_url(); ?>forgotpassword">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Don't have an account? <a class="text-primary"
                                    href="<?= base_url(); ?>register">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>