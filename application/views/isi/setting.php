<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1>Setting</h1>
            <div class="ps-5">
                <ol class="breadcrumb mb-2 ">
                    <li class="breadcrumb-item active">My profile</li>
                </ol>



                <fieldset>
                    <?php if ($message = $this->session->flashdata('message')) : ?>
                        <div class="alert alert-success" role="alert"><?= $message ?></div>
                    <?php endif; ?>

                </fieldset>



                <div class="card mb-3 col-6">
                    <div class="row no-gutter">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="height: 240px; " class="img-fluid rounded-start" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['name']; ?></h5>
                                <div>
                                    <div class=""><?= $user['email']; ?></div>
                                    <div class=""><?= $user['phone']; ?></div>
                                    <div class=""><?= $user['addres']; ?></div>
                                </div>
                                <div class="mt-3">
                                    <small class="card-text">joined since</small>
                                    <p class="card-text"><small class="text-muted "><?= date('d F Y', $user['date_created']); ?></small></p>
                                </div>
                                <a href="<?= base_url('setting/edit'); ?> " class="btn text-bg-dark float-end mb-2">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ms-5">
                <ol class="breadcrumb mb-2 ">
                    <li class="breadcrumb-item active">Privacy</li>
                </ol>

                <a href="<?= base_url('setting/'); ?>changepw " class="btn text-bg-dark mt-1">Change Password</a>
            </div>
            <div class="ms-5">
                <a href="<?= base_url('auth/'); ?>logout " class="btn text-bg-dark mt-3">Logout</a>
            </div>

        </div>
    </main>