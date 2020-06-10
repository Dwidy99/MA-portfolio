<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <h5 class="card-header">You can change informations</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $profile['id']; ?>">

                        <div class="form-group text-center">
                            <img src="<?= base_url('/assets/img/imageProfile/') . $profile['photo']; ?>" width="65"
                                height="65">
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <label for="photo">Choose Image..</label>
                                <input type="file" class="form-control-file" id="photo" name="photo">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?= $profile['name'] ?>" placeholder="Name..">
                            <small class="form-text text-danger"><?= form_error('name'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control" id="profession" name="profession"
                                value="<?= $profile['profession'] ?>" placeholder="Profession..">
                            <small class="form-text text-danger"><?= form_error('profession'); ?></small>
                        </div>

                        <div class="row">
                            <div class="col">
                                <a href="<?= base_url('adminProfile'); ?>">Back</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Submit!</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>