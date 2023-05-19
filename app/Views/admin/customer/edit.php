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
                        <a href="<?= base_url();?>admin/customer" class="btn btn-secondary ms-auto">Back</a>
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
                                                    data-default-file="<?= base_url('assets/images/user/').$customer['image'];?>">
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
                                            name="name" id="name" value="<?= $customer['name'];?>">
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
                                            name="username" id="username" value="<?= $customer['username'];?>">
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
                                            name="email" id="email" value="<?= $customer['email'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['email']) ? validation_show_error('email') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="main_wallet"><strong>Main Wallet</strong></label>
                                        <input type="number"
                                            class="form-control <?= !empty($error['main_wallet']) ? 'is-invalid' : ''; ?>"
                                            name="main_wallet" id="main_wallet" value="<?= $customer['main_wallet'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['main_wallet']) ? validation_show_error('main_wallet') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="dividen_wallet"><strong>Dividen Wallet</strong></label>
                                        <input type="number"
                                            class="form-control <?= !empty($error['dividen_wallet']) ? 'is-invalid' : ''; ?>"
                                            name="dividen_wallet" id="dividen_wallet"
                                            value="<?= $customer['dividen_wallet'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['dividen_wallet']) ? validation_show_error('dividen_wallet') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="place_of_birth"><strong>Place of Birth</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['place_of_birth']) ? 'is-invalid' : ''; ?>"
                                            name="place_of_birth" id="place_of_birth"
                                            value="<?= $customer['place_of_birth'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['place_of_birth']) ? validation_show_error('place_of_birth') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="date_of_birth"><strong>Date of Birth</strong></label>
                                        <input type="date"
                                            class="form-control <?= !empty($error['date_of_birth']) ? 'is-invalid' : ''; ?>"
                                            name="date_of_birth" id="date_of_birth"
                                            value="<?= $customer['date_of_birth'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['date_of_birth']) ? validation_show_error('date_of_birth') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="gender"><strong>Gender</strong></label>
                                        <select
                                            class="form-control  <?= !empty($error['gender']) ? 'is-invalid' : ''; ?>"
                                            name="gender" id="gender">
                                            <option value="">-- Select Gender --</option>
                                            <?php foreach($gender as $row):?>
                                            <option value="<?= $row;?>"
                                                <?= ( $customer['gender'] == $row) ? "selected" : "";?>>
                                                <?= $row;?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['gender']) ? validation_show_error('gender') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="country"><strong>Country</strong></label>
                                        <select
                                            class="form-control  <?= !empty($error['country']) ? 'is-invalid' : ''; ?>"
                                            name="country" id="country">
                                            <option value="">-- Select Country --</option>
                                            <?php foreach($countries as $row):?>
                                            <option value="<?= $row['id'];?>"
                                                <?= ( $customer['country_id'] == $row['id']) ? "selected" : "";?>>
                                                <?= $row['name'];?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['country']) ? validation_show_error('country') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="address"><strong>Address</strong></label>
                                        <textarea
                                            class="form-control <?= !empty($error['address']) ? 'is-invalid' : ''; ?>"
                                            name="address" id="address"><?= $customer['address'];?></textarea>
                                        <small class="invalid-feedback">
                                            <?= !empty($error['address']) ? validation_show_error('address') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="created_at"><strong>Created at</strong></label>
                                        <input type="text" class="form-control" name="text" id="created_at"
                                            value="<?= dated($customer['created_at']);?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="is_active"><strong>Status</strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($customer['is_active'] == 1) ? "active" : "";?>"
                                                name="is_active" id="is_active1" autocomplete="off" value="1"
                                                <?= ($customer['is_active'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="is_active1">Active</label>
                                            <input type="radio"
                                                class="btn-check <?= ($customer['is_active'] == 0) ? "active" : "";?>"
                                                name="is_active" id="is_active2" autocomplete="off" value="0"
                                                <?= ($customer['is_active'] == 0) ? "checked" : "";?>>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Change Password</div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url();?>admin/customer/changepassword" method="post" autocomplete="off"
                            class="needs-validation">
                            <?= csrf_field();?>
                            <input type="hidden" name="id" value="<?= $customer['id'];?>">
                            <div class=" row">
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