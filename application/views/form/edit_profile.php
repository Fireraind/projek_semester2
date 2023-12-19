<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>



            <?= $this->session->flashdata('message'); ?>


        </div>

        <div class="card" style="width: 800px;">
            <div class=" card-body">
                <div class="ps-4">

                    <div class="row">
                        <div class="col-lg-8"></div>
                        <?php echo form_open_multipart('setting/edit'); ?>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-group  row">Email address</label>
                            <div class="col-5">
                                <input type="text" class="form-control mt-2 ms-2" id="email" readonly name="email" value="<?= $user['email'] ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-group  row">Name</label>
                            <div class="col-5">
                                <input type="text" class="form-control mt-2 ms-2" id="name" name="name" placeholder="Name" value="<?= $user['name'] ?>">
                                <?= form_error('name', '<small class="text-danger ps-3">', '</small>') ?>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-group  row">Addres</label>
                            <div class="col-5">
                                <input type="text" class="form-control mt-2 ms-2" id="name" name="addres" value="<?= $user['addres']; ?>" placeholder="addres">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-group  row">Phone Number</label>
                            <div class="col-5">
                                <input type="text" class="form-control mt-2 ms-2" id="phone" name="phone" value="<?= $user['phone']; ?>" placeholder="phone number">
                                <?= form_error('phone', '<small class="text-danger ps-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label for="formFileSm" class="form-group row">Picture</label>
                            <div class="row">
                                <div class="col- ms-2">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" style="height: 120px;" class="col-3 mt-2 img-thumnail">
                                </div>
                            </div>
                            <div class="col-5">
                                <input class="form-control form-control-sm mt-2 ms-2" id="image" name="image" type="file">
                            </div>
                            <div class="row">
                                <div class="col-3 pt-2 ms-2">
                                    <button class="btn btn-dark " type="submit">Edit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>