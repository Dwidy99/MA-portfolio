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
                <h2>Contact</h2>
                <hr>
            </div>
        </div>
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-8">
                    <form action="" method="post">
                        <form>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Your email.." value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class=" form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your name.."
                                    value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class=" form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="Your number phone.." value="<?= set_value('phone'); ?>">
                            </div>
                            <div class=" form-group">
                                <label for="message">Your message</label>
                                <textarea name="message" class="form-control" id="message"
                                    rows="3"><?= set_value('message'); ?></textarea>
                                <?= form_error('message', '<small class=" form-text text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" name="submitContact" class="btn btn-primary float-right">Send
                                message!</button>
                        </form>
                    </form>
                </div>


            </div>

        </div>
    </div>
</section>