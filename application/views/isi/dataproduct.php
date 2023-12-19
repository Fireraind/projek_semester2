<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><?= $judul; ?></li>
            </ol>
            <fieldset>
                <?php if ($message = $this->session->flashdata('message')) : ?>
                    <div class="alert alert-success " role="alert"><?= $message ?></div>
                <?php endif; ?>
            </fieldset>


            <div class=" me-auto   ">

                <button type="button" class="btn btn-primary mb-4 col-1  " data-bs-toggle="modal" data-bs-target="#insertproduct">
                    insert
                </button>
            </div>
            <!-- <form action="<?= base_url('dataproduct/search'); ?>" method="post">
                    <div class="float-end">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Seach ...." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
                        </div>
                    </div>
                </form> -->


            <table id="tableproduct" class="table  pt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($product_model as $prd) :  ?>
                        <tr>
                            <th> <?= $i++ ?></th>
                            <th><?= $prd['product'] ?></th>
                            <th><?= $prd['brand'] ?></th>
                            <th><?= $prd['price'] ?></th>
                            <th><?= $prd['stock'] ?></th>

                            <td>

                                <button type="button" class="btn text-bg-primary   col-xl-3" data-bs-toggle="modal" data-bs-target="#detailproduct<?= $prd['id']; ?>">
                                    detail
                                </button> <button type="button" class="btn text-bg-success text-center  col-xl-3" data-bs-toggle="modal" data-bs-target="#editproduct<?= $prd['id']; ?>">
                                    edit
                                </button>
                                <a href="<?= base_url('dataproduct/'); ?>deleteproduct/<?= $prd['id']; ?>" class="btn text-bg-danger text-center   col-xl-3" onclick="return confirm ('Sure?');">delete</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <!-- <div class="float-end">
                <!-- <?= $this->pagination->create_links(); ?> -->
            <!-- </div>  -->




    </main>
    <!-- Modal insert -->
    <div class="modal fade" id="insertproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <?php echo form_open_multipart('dataproduct/insert') ?>
                    <div class="mb-3">
                        <div class="ms-2 mb-3">
                            <label for="formFileSm" class="form-group row">Picture</label>
                            <div class="row">
                                <div class="col- ms-2 float-start">
                                    <img src="" class="col-4 mt-2 img-thumnail" style="width: 120px; height:120px;">
                                </div>
                            </div>
                            <div class="col-5">
                                <input class="form-control form-control-sm mt-2 ms-2" id="img_product" name="img_product" type="file">
                            </div>
                            <div class="">
                                <label for="exampleInputEmail1" class="form-label">Product</label>
                                <input type="text" class="form-control" id="product" name="product">
                                <?= form_error('product', '<small class="text-danger ps-3">', '</small>') ?>

                            </div>
                            <div class=" mt-3 mb-3">
                                <label for="id_brand">Brand</label>
                                <select class="ms-3 col-4" id="id_brand" name="id_brand">
                                    <option selected>Choose a brand</option>
                                    <option value="1">Xiaomi</option>
                                    <option value="2">Apple</option>
                                    <option value="3">Samsung</option>
                                    <option value="4">Realme</option>
                                    <option value="5">Infinix</option>
                                    <option value="6">Oppo</option>
                                    <option value="7">Vivo</option>
                                </select>
                                <?= form_error('brand', '<small class="text-danger ps-3">', '</small>') ?>

                            </div>
                            <div class=" mb-3">
                                <label for="exampleInputPassword1" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price">
                                <?= form_error('price', '<small class="text-danger ps-3">', '</small>') ?>

                            </div>
                            <div class=" mb-3">
                                <label for="exampleInputPassword1" class="form-label">Stock</label>
                                <input type="text" class="form-control" name="stock" id="stock">
                                <?= form_error('stock', '<small class="text-danger ps-3">', '</small>') ?>

                            </div>
                            <div class=" mb-3">
                                <label for="exampleInputPassword1" class="form-label">Specification</label>
                                <textarea rows="7" type="text" class="form-control" name="specification" id="specification"></textarea>
                                <?= form_error('specification', '<small class="text-danger ps-3">', '</small>') ?>

                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <!-- end modal -->
            </div>
        </div>
    </div>

    <!--detail modal  -->

    <?php $i = 0;
    foreach ($product_model as $prd) : $i++; ?>
        <div class="modal fade" id="detailproduct<?= $prd['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="modal-title fs-5" id="exampleModalLabel">Details Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="ms-2 mb-3">
                                <h5 for="formFileSm" class="form-group row">Picture</h5>
                                <div class="row">
                                    <div class="col- ms-2 float-start">
                                        <img src="<?= base_url('assets/img/product/') . $prd['img_product']; ?>" class="col-4 mt-2 img-thumnail" style="width: 120px; height:120px;">
                                    </div>
                                </div>

                                <div class="">
                                    <h5 for="exampleInputEmail1" class="form-label">Product</h5>
                                    <p><?= $prd['product'] ?> </p>

                                </div>
                                <div class=" mt-3 mb-3">
                                    <h5 for="id_brand">Brand</h5>
                                    <p><?= $prd['brand'] ?></p>
                                </div>
                                <div class=" mb-3">
                                    <h5 for="exampleInputPassword1" class="form-label">Price</h5>
                                    <p>Rp. <?= $prd['price'] ?></p>

                                </div>
                                <div class=" mb-3">
                                    <h5 for="exampleInputPassword1" class="form-label">Stock</h5>
                                    <p><?= $prd['stock'] ?></p>

                                </div>
                                <div class=" mb-3">
                                    <h5 for="exampleInputPassword1" class="form-label">Specification</h5>
                                    <p><?= $prd['specification'] ?></p>
                                    <div class="float-end">
                                        <small> <?= date('d F Y', $prd['date_created']); ?></small>
                                    </div>
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
    <!-- edit modal -->
    <?php $i = 0;
    foreach ($product_model as $prd) : $i++; ?>
        <div class="modal fade" id="editproduct<?= $prd['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <?php echo form_open_multipart('dataproduct/editproduct'); ?>
                        <div class="mb-3">
                            <div class="ms-2 mb-3">
                                <label for="formFileSm" class="form-group row">Picture</label>
                                <div class="row">
                                    <div class="col- ms-2 float-start">
                                        <img src="<?= base_url('assets/img/product/') . $prd['img_product']; ?>"" class=" col-4 mt-2 img-thumnail" style="width: 120px; height:120px;">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <input class="form-control form-control-sm mt-2 ms-2" id="img_product" name="img_product" type="file">
                                </div>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $prd['id']; ?>">
                                <div class="">
                                    <label for="exampleInputEmail1" class="form-label">Product</label>
                                    <input type="text" class="form-control" id="product" name="product" value="<?= $prd['product']; ?>">
                                    <?= form_error('product', '<small class="text-danger ps-3">', '</small>') ?>

                                </div>
                                <div class=" mt-3 mb-3">
                                    <label for="id_brand">Brand</label>
                                    <select class="ms-3 col-4 justify-center" id="id_brand" name="id_brand">
                                        <option value="<?= $prd['id_brand']; ?>"><?= $prd['brand']; ?></option>
                                        <option value="1">Xiaomi</option>
                                        <option value="2">Apple</option>
                                        <option value="3">Samsung</option>
                                        <option value="4">Realme</option>
                                        <option value="5">Infinix</option>
                                        <option value="6">Oppo</option>
                                        <option value="7">Vivo</option>
                                    </select>
                                    <?= form_error('brand', '<small class="text-danger ps-3">', '</small>') ?>

                                </div>
                                <div class=" mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" id="price" value="<?= $prd['price']; ?>">
                                    <?= form_error('price', '<small class="text-danger ps-3">', '</small>') ?>

                                </div>
                                <div class=" mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Stock</label>
                                    <input type="text" class="form-control" name="stock" id="stock" value="<?= $prd['stock']; ?>">
                                    <?= form_error('stock', '<small class="text-danger ps-3">', '</small>') ?>

                                </div>
                                <div class=" mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Specification</label>
                                    <textarea rows="7" type="text" class="form-control" name="specification" id="specification"><?= $prd['specification']; ?></textarea>
                                    <?= form_error('specification', '<small class="text-danger ps-3">', '</small>') ?>

                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    <!-- endmodal -->