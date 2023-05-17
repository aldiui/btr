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
                            <div class="form-group">
                                <label class="mb-1" for="email"><strong>Email</strong></label>
                                <input type="email"
                                    class="form-control <?= !empty($error['email']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Input Email" name="email" id="email" value="<?= old("email");?>">
                                <small class="invalid-feedback">
                                    <?= !empty($error['email']) ? validation_show_error('email') : ''; ?>
                                </small>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Already have an account? <a class="text-primary" href="<?= base_url(); ?>login">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>