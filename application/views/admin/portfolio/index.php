<section class="portfolio pb-5 pt-5">
    <div class="container">

        <div class="row justify-content-center text-center">
            <div class="col-sm-6">
                <?php if( $this->session->flashdata('flash') ) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row pt-5 mb-5 text-center">
            <div class="col-sm-12">
                <h2>Portfolio</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <h5 class="card-header">My Portfolio</h5>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-3">
                            <?php foreach ($portfolios as $portfolio) : ?>
                            <div class="col mb-4">
                                <div class="card text-center">
                                    <img src="<?= base_url('/assets/img/imagePortfolio/') . $portfolio['portfolio_image']; ?>"
                                        class="card-img-top" width="30" height="170">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $portfolio['name']; ?></h5>
                                        <a href="<?= base_url('adminPortfolio/editPortfolio/') . $portfolio['id']; ?>"
                                            class="badge badge-success">Edit</a><a
                                            href="<?= base_url('adminPortfolio/deletePortfolio/') . $portfolio['id']; ?>"
                                            class="badge badge-danger ml-1"
                                            onclick="return confirm('Are you sure you want to Delete?');">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center pt-3">
            <div class="col-sm-12">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addModal"><img
                        src="<?= base_url('/assets/img/icons/plus.png'); ?>" width="50" weight="50"></a>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Modal -->

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="custom-file">
                        <label for="porfolioImage">Choose image</label>
                        <input type="file" name="portfolio" id="portfolioImage" class="form-control-file" required>
                        <small class="text-danger">Image type: gif | png | jpg & 5MB max size</small>
                    </div>

                    <div class="form-group pt-3">
                        <label for="portfolioName">Name</label>
                        <input type="text" class="form-control" name="name" id="portfolioName">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>