<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <h5 class="card-header">You can change this informations</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $portfolio['id']; ?>">

                        <div class="form-group text-center">
                            <img src="<?= base_url('/assets/img/imagePortfolio/') . $portfolio['portfolio_image']; ?>"
                                style="width: 18rem;">
                        </div>

                        <div class="form-group">
                            <label for="imagePortfolio">Choose Image..</label>
                            <input type="file" name="new_portfolioImage" id="imagePortfolio" class="form-control-file">
                            <small class="text-danger">Image type: gif | png | jpg & 5MB max size</small>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="<?= $portfolio['name']; ?>" placeholder="Name..">
                        </div>
                        <a href="<?= base_url('adminPortfolio'); ?>">Back</a>
                        <button type="submit" name="submitEditPortfolio"
                            class="btn btn-primary float-right">Submit!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>