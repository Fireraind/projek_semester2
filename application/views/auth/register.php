<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('auth/'); ?>registration">

                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Name" value="<?= set_value('name'); ?>" />
                                <label ">Name</label>
                                <?= form_error('name', '<small class="text-danger ps-3">', '</small>') ?>
                            </div>

                            <div class=" form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="text" placeholder="name@example.com" value="<?= set_value('email'); ?>" />
                                    <label for="inputEmail">Email</label>
                                    <?= form_error('email', '<small class="text-danger ps-3">', '</small>') ?>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="password1" name="password1" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Password</label>
                                        <?= form_error('password1', '<small class="text-danger ps-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="<?= base_url(); ?>">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>