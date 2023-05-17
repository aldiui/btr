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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="from_email"><strong>From Email</strong></label>
                                        <input type="email"
                                            class="form-control <?= !empty($error['from_email']) ? 'is-invalid' : ''; ?>"
                                            name="from_email" id="from_email" value="<?= $email['from_email'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['from_email']) ? validation_show_error('from_email') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="from_name"><strong>From Name</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['from_name']) ? 'is-invalid' : ''; ?>"
                                            name="from_name" id="from_name" value="<?= $email['from_name'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['from_name']) ? validation_show_error('from_name') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="recipients"><strong>Recipients</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['recipients']) ? 'is-invalid' : ''; ?>"
                                            name="recipients" id="recipients" value="<?= $email['recipients'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['recipients']) ? validation_show_error('recipients') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="user_agent"><strong>User Agent</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['user_agent']) ? 'is-invalid' : ''; ?>"
                                            name="user_agent" id="user_agent" value="<?= $email['user_agent'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['user_agent']) ? validation_show_error('user_agent') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="protocol"><strong>Protocol</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['protocol']) ? 'is-invalid' : ''; ?>"
                                            name="protocol" id="protocol" value="<?= $email['protocol'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['protocol']) ? validation_show_error('protocol') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="mail_path"><strong>Mail Path</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['mail_path']) ? 'is-invalid' : ''; ?>"
                                            name="mail_path" id="mail_path" value="<?= $email['mail_path'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['mail_path']) ? validation_show_error('mail_path') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="smtp_host"><strong>Smtp Host</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['smtp_host']) ? 'is-invalid' : ''; ?>"
                                            name="smtp_host" id="smtp_host" value="<?= $email['smtp_host'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['smtp_host']) ? validation_show_error('smtp_host') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="smtp_user"><strong>Smtp User</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['smtp_user']) ? 'is-invalid' : ''; ?>"
                                            name="smtp_user" id="smtp_user" value="<?= $email['smtp_user'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['smtp_user']) ? validation_show_error('smtp_user') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="smtp_pass"><strong>Smtp Pass</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['smtp_pass']) ? 'is-invalid' : ''; ?>"
                                            name="smtp_pass" id="smtp_pass" value="<?= $email['smtp_pass'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['smtp_pass']) ? validation_show_error('smtp_pass') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="smtp_port"><strong>Smtp Port</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['smtp_port']) ? 'is-invalid' : ''; ?>"
                                            name="smtp_port" id="smtp_port" value="<?= $email['smtp_port'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['smtp_port']) ? validation_show_error('smtp_port') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="smtp_timeout"><strong>Smtp Timeout</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['smtp_timeout']) ? 'is-invalid' : ''; ?>"
                                            name="smtp_timeout" id="smtp_timeout" value="<?= $email['smtp_timeout'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['smtp_timeout']) ? validation_show_error('smtp_timeout') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="smtp_keep_alive"><strong>Smtp Keep Alive
                                            </strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($email['smtp_keep_alive'] == 1) ? "active" : "";?>"
                                                name="smtp_keep_alive" id="smtp_keep_alive1" autocomplete="off"
                                                value="1" <?= ($email['smtp_keep_alive'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="smtp_keep_alive1">Active</label>
                                            <input type="radio"
                                                class="btn-check <?= ($email['smtp_keep_alive'] == 0) ? "active" : "";?>"
                                                name="smtp_keep_alive" id="smtp_keep_alive2" autocomplete="off"
                                                value="0" <?= ($email['smtp_keep_alive'] == 0) ? "checked" : "";?>>
                                            <label class="btn btn-outline-danger"
                                                for="smtp_keep_alive2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="smtp_crypto"><strong>Smtp Crypto</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['smtp_crypto']) ? 'is-invalid' : ''; ?>"
                                            name="smtp_crypto" id="smtp_crypto" value="<?= $email['smtp_crypto'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['smtp_crypto']) ? validation_show_error('smtp_crypto') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="word_wrap"><strong>Word Warp
                                            </strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($email['word_wrap'] == 1) ? "active" : "";?>"
                                                name="word_wrap" id="word_wrap1" autocomplete="off" value="1"
                                                <?= ($email['word_wrap'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="word_wrap1">Active</label>
                                            <input type="radio"
                                                class="btn-check <?= ($email['word_wrap'] == 0) ? "active" : "";?>"
                                                name="word_wrap" id="word_wrap2" autocomplete="off" value="0"
                                                <?= ($email['word_wrap'] == 0) ? "checked" : "";?>>
                                            <label class="btn btn-outline-danger" for="word_wrap2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="wrap_chars"><strong>Wrap Chars</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['wrap_chars']) ? 'is-invalid' : ''; ?>"
                                            name="wrap_chars" id="wrap_chars" value="<?= $email['wrap_chars'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['wrap_chars']) ? validation_show_error('mail_type') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="mail_type"><strong>Mail Type</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['mail_type']) ? 'is-invalid' : ''; ?>"
                                            name="mail_type" id="mail_type" value="<?= $email['mail_type'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['mail_type']) ? validation_show_error('mail_type') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="charset"><strong>Charset</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['charset']) ? 'is-invalid' : ''; ?>"
                                            name="charset" id="charset" value="<?= $email['charset'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['charset']) ? validation_show_error('charset') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="validate"><strong>Validate
                                            </strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($email['validate'] == 1) ? "active" : "";?>"
                                                name="validate" id="validate1" autocomplete="off" value="1"
                                                <?= ($email['validate'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="validate1">Active</label>
                                            <input type="radio"
                                                class="btn-check <?= ($email['validate'] == 0) ? "active" : "";?>"
                                                name="validate" id="validate2" autocomplete="off" value="0"
                                                <?= ($email['validate'] == 0) ? "checked" : "";?>>
                                            <label class="btn btn-outline-danger" for="validate2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="priority"><strong>Priority</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['priority']) ? 'is-invalid' : ''; ?>"
                                            name="priority" id="priority" value="<?= $email['priority'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['priority']) ? validation_show_error('priority') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="crlf"><strong>Crlf</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['crlf']) ? 'is-invalid' : ''; ?>"
                                            name="crlf" id="crlf" value="<?= $email['crlf'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['crlf']) ? validation_show_error('crlf') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="newline"><strong>New Line</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['newline']) ? 'is-invalid' : ''; ?>"
                                            name="newline" id="newline" value="<?= $email['newline'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['newline']) ? validation_show_error('newline') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="bcc_batch_mode"><strong>Bcc Batch Mode
                                            </strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($email['bcc_batch_mode'] == 1) ? "active" : "";?>"
                                                name="bcc_batch_mode" id="bcc_batch_mode1" autocomplete="off" value="1"
                                                <?= ($email['bcc_batch_mode'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="bcc_batch_mode1">Active</label>
                                            <input type="radio"
                                                class="btn-check <?= ($email['bcc_batch_mode'] == 0) ? "active" : "";?>"
                                                name="bcc_batch_mode" id="bcc_batch_mode2" autocomplete="off" value="0"
                                                <?= ($email['bcc_batch_mode'] == 0) ? "checked" : "";?>>
                                            <label class="btn btn-outline-danger" for="bcc_batch_mode2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1" for="bcc_batch_size"><strong>Bcc Batch Size</strong></label>
                                        <input type="text"
                                            class="form-control <?= !empty($error['bcc_batch_size']) ? 'is-invalid' : ''; ?>"
                                            name="bcc_batch_size" id="bcc_batch_size"
                                            value="<?= $email['bcc_batch_size'];?>">
                                        <small class="invalid-feedback">
                                            <?= !empty($error['bcc_batch_size']) ? validation_show_error('bcc_batch_size') : ''; ?>
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="mb-1 d-block" for="dsn"><strong>Dsn
                                            </strong></label>
                                        <div class="btn-group w-100" role="group"
                                            aria-label="Basic radio toggle button group">
                                            <input type="radio"
                                                class="btn-check <?= ($email['dsn'] == 1) ? "active" : "";?>" name="dsn"
                                                id="dsn1" autocomplete="off" value="1"
                                                <?= ($email['dsn'] == 1) ? "checked" : "";?>>
                                            <label class="btn btn-outline-success" for="dsn1">Active</label>
                                            <input type="radio"
                                                class="btn-check <?= ($email['dsn'] == 0) ? "active" : "";?>" name="dsn"
                                                id="dsn2" autocomplete="off" value="0"
                                                <?= ($email['dsn'] == 0) ? "checked" : "";?>>
                                            <label class="btn btn-outline-danger" for="dsn2">Inactive</label>
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