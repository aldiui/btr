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
                        <a href="<?= base_url();?>deposit" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="row align-items-center">
                                <div class="col-lg-5 mb-3">
                                    <label for="amount"><strong>Amount</strong></label>
                                </div>
                                <div class="col-lg-7 mb-3">
                                    <div class="input-group">
                                        <input type="number"
                                            class="form-control <?= !empty($error['amount']) ? 'is-invalid' : ''; ?>"
                                            name="amount" id="amount" value="<?= old('amount');?>">
                                        <span class="input-group-text">BUSD</span>
                                    </div>
                                    <small class="small text-danger">
                                        <?= !empty($error['amount']) ? validation_show_error('amount') : ''; ?>
                                    </small>
                                </div>
                                <div class="col-lg-5 mb-3">
                                    <label for="method"><strong>Method</strong></label>
                                </div>
                                <div class="col-lg-7 mb-3">
                                    <select class="form-control  <?= !empty($error['method']) ? 'is-invalid' : ''; ?>"
                                        name="method" id="method">
                                        <option value="">-- Select Method --</option>
                                        <?php foreach($method as $row):?>
                                        <option value="<?= $row['id'];?>"
                                            <?= (old("method") == $row['id']) ? "selected" : "";?>>
                                            <?= $row['name'];?> - <?= $row['network'];?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="invalid-feedback">
                                        <?= !empty($error['method']) ? validation_show_error('method') : ''; ?>
                                    </small>
                                </div>
                                <div class="col-12 my-3">
                                    <div class="text-center">
                                        <strong>Wallet Address</strong>
                                        <div id="wallet_address"></div>
                                        <div>
                                            <img src="" alt="" id="image_wallet">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <label for="image" class="mb-1"><strong>Upload Payment Proof</strong></label>
                                        <input class="dropify" name="image" id="input-file-now" type="file"
                                            data-height="350">
                                        <small class="text-danger">
                                            <?= !empty($error['image']) ? validation_show_error('image') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1" for="hash"><strong>Hash ID</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['hash']) ? 'is-invalid' : ''; ?>"
                                            name="hash" id="hash" value="<?= old('hash');?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['hash']) ? validation_show_error('hash') : ''; ?>
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
<script>
const selectElement = document.getElementById("method");
selectElement.addEventListener("change", function() {
    <?php foreach($method as $row):?>
    if (selectElement.value == "<?= $row['id'];?>") {
        document.getElementById('image_wallet').src =
            "<?= base_url("assets/images/method/").$row['wallet_image'];?>";
        document.getElementById('wallet_address').innerText = "<?= $row['wallet_address'];?>";
    }
    <?php endforeach;?>
    else {
        document.getElementById('image_wallet').src = "";
        document.getElementById('wallet_address').innerText = "";
    }
});
</script>
<?= $this->endSection('content'); ?>