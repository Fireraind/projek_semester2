<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="h3 mb-4 text-gray-800">
                <?= $judul; ?>
            </h1>


            <div class="card" style="width: 800px;">
                <div class=" card-body">
                    <?php echo $this->session->flashdata('message'); ?>
                    <fieldset>
                        <?php if ($error = $this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                        <?php endif; ?>
                        <?php if ($message = $this->session->flashdata('message')) : ?>
                            <div class="alert alert-success" role="alert"><?= $message ?></div>
                        <?php endif; ?>

                    </fieldset>

                    <div class="ps-4">
                        <div class="ps-4">

                            <div class="row">
                                <div class="col-lg-8"></div>

                                <?php echo form_open_multipart('setting/changepw'); ?>

                            </div>
                        </div>
                        <div class="row ">

                            <div>

                            </div>
                            <div class="form-floating mb-3 mb-md-0">

                                <div class="col-9 mt-3">
                                    <div class="col-9   ">
                                        <input type="hidden" class="form-control mt-2 ms-2" id="email" readonly name="email" value="<?= $user['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 ">
                                <div class="col-9">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="current_password" name="current_password" type="password" placeholder="current_password" />
                                        <label for="current_password">Current Password</label>
                                        <?= form_error('current_password', '<small class="text-danger ps-3">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-9">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="new_password1" name="new_password1" type="password" placeholder="Confirm password" />
                                        <label for="new_password1">New Password</label>
                                        <?= form_error('new_password1', '<small class="text-danger ps-3">', '</small>') ?>

                                    </div>
                                </div>
                                <div class="row mt-3"></div>
                                <div class="col-9">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="new_password2" name="new_password2" type="password" placeholder="Confirm password" />
                                        <label for="new_password2">Confirm Password</label>
                                        <?= form_error('new_password2', '<small class="text-danger ps-3">', '</small>') ?>

                                        <div class="mt-3">
                                            <button class="btn btn-dark" class="submit">Change Password</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?= form_error('name', '<small class="text-danger ps-3">', '</small>') ?>

                        </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>