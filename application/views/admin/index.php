<!-- Jumbotron -->
<div class="jumbotron text-center">
    <?php foreach($profiles as $profile) : ?>
    <img src="<?= base_url('/assets/img/imageProfile/') . $profile['photo']; ?>" class="rounded-circle" width="200"
        height="200">
    <h1 class="display-3">Hello, I'm <span
            style="font-family:'Times New Roman', Times, serif;"><?= $profile['name']; ?></span>.
    </h1>
    <p class="display-4">I'm a <?= $profile['profession']; ?>.</p>
    <?php endforeach; ?>
    <hr class="my-2">
    <br>

    <a href="https://www.facebook.com/dwiantoyuli/" target="_blank" width="3" height="3"><img
            src="<?= base_url('/assets/img/icons/fb.png'); ?>"></a>
    <a href="https://github.com/Dwidy99" target="_blank" width="3" height="3"><img
            src="<?= base_url('/assets/img/icons/github.png'); ?>"></a>
    <a href="https://www.instagram.com/xy_dwi/" target="_blank" width="3" height="3"><img
            src="<?= base_url('/assets/img/icons/instagram.png'); ?>"></a>
</div>

<!-- Marketing -->
<section class="menu" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Main Menu</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="<?= base_url('/assets/img/icons/userProfile.png'); ?>" width="140"
                    height="140">
                <h2>Profile</h2>
                <p>This is my profile. In there you can see my profile and change the information</p>
                <a class="btn btn-secondary" href="adminProfile">View details</a>
            </div>

            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="<?= base_url('/assets/img/icons/about.png'); ?>" width="140"
                    height="140">
                <h2>About</h2>
                <p>This is my about. In there you can see my About and change the information.</p>
                <a class="btn btn-secondary" href="<?= base_url('adminAbout'); ?>">View details</a>
            </div>

            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="<?= base_url('/assets/img/icons/portfolio.png'); ?>" width="140"
                    height="140">
                <h2>My Skills</h2>
                <p>This is my Skills. In there you can see my Skills, add, change, and delete their information.
                </p>
                <a class="btn btn-secondary" href="<?= base_url('adminPortfolio'); ?>">View details</a>
            </div>

            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="<?= base_url('/assets/img/icons/contact.png'); ?>" width="140"
                    height="140">
                <h2>Contact</h2>
                <p>This is my contact. In there you can tell me about somethings and find me.</p>
                <a class="btn btn-secondary" href="<?= base_url('adminContact'); ?>">View details</a>
            </div>
        </div>
    </div>
    <br><br>
</section>