<!-- Jumbotron -->
<div class="jumbotron text-center">
    <!-- Alert -->
    <?php if( $this->session->flashdata('flash') ) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('flash'); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <?php foreach($profiles as $profile) : ?>
    <img src="<?= base_url('/assets/img/imageProfile/') . $profile['photo']; ?>" class="rounded-circle" width="200"
        height="200">
    <h1 class="display-3">Hello, I'm <span
            style="font-family:'Times New Roman', Times, serif;"><?= $profile['name']; ?></span>.
    </h1>
    <p class="display-4">I'm a <?= $profile['profession']; ?>.</p>
    <hr class="my-2">
    <br>

    <a href="https://www.facebook.com/dwiantoyuli/" width="3" height="3"><img
            src="<?= base_url('/assets/img/icons/fb.png'); ?>"></a>
    <a href="https://www.facebook.com/dwiantoyuli/" width="3" height="3"><img
            src="<?= base_url('/assets/img/icons/github.png'); ?>"></a>
    <a href="https://www.facebook.com/dwiantoyuli/" width="3" height="3"><img
            src="<?= base_url('/assets/img/icons/instagram.png'); ?>"></a>
    <br><br>
    <a class="btn btn-danger" href="<?= base_url(); ?>adminProfile/edit/<?= $profile['id']; ?>">Change It</a>
    <?php endforeach; ?>
</div>