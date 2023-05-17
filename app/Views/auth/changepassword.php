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
                        <h4 class="text-center mb-4"><?= $title;?></h4>
                        <form action="" method="post" autocomplte="off" class="needs-validation">
                            <?= csrf_field();?>
                            <input type="hidden" name="email" value="<?= $email;?>">
                            <div class="form-group">
                                <label class="mb-1" for="password"><strong>Password</strong></label>
                                <input type="password"
                                    class="form-control  <?= !empty($error['password']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Input Password" name="password" id="password">
                                <small class="invalid-feedback">
                                    <?= !empty($error['password']) ? validation_show_error('password') : ''; ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <label class="mb-1" for="confirm"><strong>Confirm Password</strong></label>
                                <input type="password"
                                    class="form-control  <?= !empty($error['confirm']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Input Confirm Password" name="confirm" id="confirm">
                                <small class="invalid-feedback">
                                    <?= !empty($error['confirm']) ? validation_show_error('confirm') : ''; ?>
                                </small>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>