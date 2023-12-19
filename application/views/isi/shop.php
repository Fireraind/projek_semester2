<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="">Shop</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <div class="row col-4 ">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass fa-rotate-90" style="color: #000000;"></i></span>
                    <input id="filter" type="text" class="form-control" placeholder="Search ...." aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="row text-start">

                <?php foreach ($shop_model as $sop) : ?>
                    <div class="card ms-3 mt-3" style="width: 18rem;">
                        <a href="#">
                            <img src="<?= base_url('assets/img/product/') . $sop['img_product'] ?>" class="card-img-top mt-2" alt="..." style="height: 240px; ">
                        </a>
                        <div class="card-body">
                            <div>

                                <div id="shop">
                                    <div>
                                        <h3 class="card-title row"><?= $sop['product'] ?></h3>
                                    </div>

                                    <div>
                                        <p class="card-text"><?= $sop['brand'] ?></p>
                                    </div>
                                </div>
                                <div>
                                    <p class="card-text">Rp. <?= $sop['price'] ?></p>
                                </div>
                                <div> <small class="card-text">Stock :<?= $sop['stock'] ?></small>
                                    <small class="card-text float-end"><?= date('d F Y', $sop['date_created']) ?></small>
                                </div>


                                <a href="#" class="btn btn-primary mt-3"> Buy Now </a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    </main>