<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
            <fieldset>
                <?php if ($message = $this->session->flashdata('message')) : ?>
                    <div class="alert alert-success" role="alert"><?= $message ?></div>
                <?php endif; ?>

            </fieldset>

            <table id="tableuser" class="table pt-3">
                <thead class="table-dark">
                    <tr>
                        <th>no</th>
                        <th>E-mail</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user_model as $member) : ?>
                        <tr>
                            <th> <?= $i++; ?></th>
                            <th><?= $member['email'] ?></th>
                            <th><?= $member['name'] ?></th>
                            <th><?= $member['phone'] ?></th>

                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $member['id']; ?>">
                                    Detail
                                </button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal<?= $member['id']; ?>">
                                    Update
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

            <!-- <div class="float-end">
                <?= $this->pagination->create_links(); ?>
            </div> -->

            <!-- Modal update -->
            <?php $i = 0;
            foreach ($user_model as $member) : $i++; ?>
                <div class="modal fade" id="updateModal<?= $member['id'] ?>" name="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?= base_url('datauser/'); ?>update">
                                    <div class="col-9   ">
                                        <input type="hidden" id="id" name="id" value="<?= $member['id'] ?>">
                                        <input type="text" class="form-control mt-2 ms-2" id="email" readonly name="email" value="<?= $member['email'] ?>">
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <label for="is_active">Status</label>
                                        <select class="ms-3 col-4" name="is_active" id="is_active">
                                            <option value="<?= $member['is_active'] ?>">Status <?= $member['is_active'] ?></option>
                                            <option value="0">Non Active</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- end -->
            <!-- Modal detail -->
            <?php $i = 0;
            foreach ($user_model as $member) : $i++; ?>
                <div class="modal fade" id="detailModal<?= $member['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Detail User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="ms-2 mb-3">
                                    <div class="ms-2 mb-3">
                                        <h5 for="formFileSm" class="form-group row">Image Profile</h5>
                                        <div class="row">
                                            <div class="col- ms-2 float-start">
                                                <img src="<?= base_url('assets/img/profile/') . $member['image']; ?>" class="col-4 mt-2 img-thumnail" style="width: 120px; height:120px;">
                                            </div>
                                        </div>
                                        <div class="ms-2 mb-3">
                                            <h5 for="formFileSm" class="form-group row">E-Mail</h5>
                                            <p><?= $member['email'] ?></p>
                                        </div>
                                        <div class="ms-2 mb-3">
                                            <h5 for="formFileSm" class="form-group row">Name</h5>
                                            <p><?= $member['name'] ?></p>
                                        </div>
                                        <div class="ms-2 mb-3">
                                            <h5 for="formFileSm" class="form-group row">Phone</h5>
                                            <p><?= $member['phone'] ?></p>
                                        </div>
                                        <div class="ms-2 mb-3">
                                            <h5 for="formFileSm" class="form-group row">Address</h5>
                                            <p><?= $member['addres'] ?></p>
                                        </div>
                                        <div class="float-end">
                                            <small> <?= date('d F Y', $member['date_created']); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- end -->
    </main>