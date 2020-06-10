<section class="pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <h5 class="card-header">You can change this informations</h5>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $about['id']; ?>">

                        <div class="form-group text-center">
                            <img src="<?= base_url('/assets/img/imageAbout/') . $about['image']; ?>" width="90"
                                height="90">
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <label for="image">Choose Image..</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                <small class="form-text text-danger"><?= form_error('image'); ?></small>
                            </div>
                        </div>

                        <div class="form-group mt-3">

                            <label for="about">About</label>
                            <textarea class="form-control" id="about" name="about" rows="3"
                                placeholder="About.."><?= $about['about']; ?></textarea>
                            <small class="form-text text-danger"><?= form_error('about'); ?></small>
                        </div>

                        <div class="row">
                            <div class="col">
                                <a href="<?= base_url('adminAbout'); ?>">Back</a>
                            </div>
                            <div class="col">
                                <button type="submit" name="editAbout" class="btn btn-primary">Submit!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>