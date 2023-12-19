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
            <table id="tableinvoice" class="table pt-3">
                <thead class="table-dark">
                    <tr>
                        <th>no</th>
                        <th>Invoice</th>
                        <th>Product</th>
                        <th>Receipt</th>
                        <th>Expedition</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($invoice_model as $ivc) : ?>
                        <tr>
                            <th> <?= $i++; ?></th>
                            <th><?= $ivc['invoice'] ?></th>
                            <th><?= $ivc['product'] ?></th>
                            <th><?= $ivc['resi'] ?></th>
                            <th><?= $ivc['name_ex'] ?></th>
                            <th><?= $ivc['status'] ?></th>
                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal<?= $ivc['id_order'] ?>">
                                    Detail
                                </button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal<?= $ivc['id_order'] ?>">
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



            <!-- modal -->
            <?php $i = 0;
            foreach ($invoice_model as $ivc) : $i++; ?>
                <div class="modal fade" id="detailModal<?= $ivc['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="ms-2 mb-3">
                                        <h5 for="formFileSm" class="form-group row">Picture</h5>
                                        <div class="row">
                                            <div class="col- ms-2 float-start">
                                                <img src="<?= base_url('assets/img/product/') . $ivc['img_product']; ?>" class="col-4 mt-2 img-thumnail" style="width: 120px; height:120px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Product</h5>
                                        <p><?= $ivc['product'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Invoice</h5>
                                        <p><?= $ivc['invoice'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Receipt</h5>
                                        <p><?= $ivc['resi'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Status</h5>
                                        <p><?= $ivc['status'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">QTY</h5>
                                        <p><?= $ivc['jumlah'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Total</h5>
                                        <p><?= $ivc['total'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Name</h5>
                                        <p><?= $ivc['name'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="">Email</h5>
                                        <p><?= $ivc['email'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Phone</h5>
                                        <p><?= $ivc['phone'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Addres</h5>
                                        <p><?= $ivc['addres'] ?></p>
                                    </div>
                                    <div class=" mt-3 mb-3">
                                        <h5 for="invoice">Note</h5>
                                        <p><?= $ivc['note'] ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- end -->
    </main>
    <!-- Modal -->
    <?php $i = 0;
    foreach ($invoice_model as $ivc) : $i++; ?>
        <!-- Modal -->
        <div class="modal fade" id="updateModal<?= $ivc['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class=" mt-3 mb-3">
                            <h5 for="invoice">Invoice</h5>
                        </div>
                        <form action="<?= base_url('invoice/update') ?>" method="post">
                            <input type="text" name="invoice" readonly value="<?= $ivc['invoice'] ?>"></input>
                            <input type="hidden" id="id_order" name="id_order" value="<?= $ivc['id_order'] ?>">
                            <div class="col-9">
                            </div>
                            <div class="col-9">
                                <label for="exampleInputEmail1" class="form-label">Receipt</label>
                                <input type="text" class="form-control" id="resi" name="resi" value="<?= $ivc['resi'] ?>">

                            </div>
                            <div class=" mt-3 mb-3">
                                <label for="invoice_status">Status</label>
                                <select class="ms-3 col-4" id="status" name="status">
                                    <option selected>Status</option>
                                    <option value="Waiting for payment">Waiting for payment</option>
                                    <option value="On Procces">On Procces</option>
                                    <option value="On Delivery">On Delivery</option>
                                    <option value="Finished">Finished</option>

                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- SELECT ordering.jumlah * product.price AS total
            FROM ordering
            JOIN product ON product.id = ordering.id; -->