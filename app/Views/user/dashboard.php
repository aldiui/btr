<?= $this->extend('layout/layout_user'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?= base_url()?>assets/images/setting/<?= $setting['image'];?>" width="70" alt=""
                            class="mb-3" />
                        <h4>Hi, <?= $account['username'];?>.
                        </h4>
                        <div>
                            Welcome <?= $setting['name'];?>,
                            <?= $setting['description'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>