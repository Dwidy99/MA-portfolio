<section class="about pb-5 pt-5">
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
                <h2>About</h2>
                <hr>
            </div>
        </div>
        <div class="row text-center">
            <?php foreach($abouts as $about) : ?>
            <div class="col-sm-6">
                <img src="<?= base_url('/assets/img/imageAbout/') . $about['image']; ?>" width="350" height="250">
                <p><?= $about['about']; ?></p>
                <a class="btn btn-primary mx-auto"
                    href="<?= base_url(); ?>adminAbout/editAbout/<?= $about['id']; ?>">Change
                    It</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>