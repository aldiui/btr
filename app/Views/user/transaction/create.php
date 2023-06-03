<?= $this->extend('layout/layout_user'); ?>
<?= $this->section('content');?>
<?php $error = validation_errors();?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add <?= $title;?></div>
                        <a href="<?= base_url();?>plan" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Staking Plan</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    <?= $plan['name'] ;?>
                                </div>
                                <div class="col-lg-5 mb-4">
                                    <label for="amount"><strong>Time</strong></label>
                                </div>
                                <div class="col-lg-7 mb-4">
                                    <?= $plan['period_month'] ;?> Month (<?= $plan['period_day'];?> Days)
                                </div>
                                <div class="col-lg-5 mb-3">
                                    <label for="amount"><strong>Amount</strong></label>
                                </div>
                                <div class="col-lg-7 mb-3">
                                    <div class="input-group">
                                        <input type="number"
                                            class="form-control <?= !empty($error['amount']) ? 'is-invalid' : ''; ?>"
                                            name="amount" id="amount" value="<?= old('amount');?>"
                                            min=<?= $plan['min_amount'] ;?>" max="<?= $plan['max_amount'] ;?>"
                                            step="0.1">
                                        <span class="input-group-text">BUSD</span>
                                    </div>
                                    <small class="small text-danger">
                                        <?= !empty($error['amount']) ? validation_show_error('amount') : ''; ?>
                                    </small>
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