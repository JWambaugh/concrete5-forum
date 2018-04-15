<hr>

<h3><?= t('Add reply') ?></h3>

<?php if (User::isLoggedIn()) { ?>
    <form method="POST" action="<?= $self->action('writeAnswer') ?>">
        <?= $token->output('writeAnswer') ?>

        <div class="form-group">
            <label for="message"><?= t('Message') ?></label>
            <textarea type="text" class="form-control" name="message" id="message" placeholder=""></textarea>
        </div>
        <button class="btn btn-primary"><?= t('Post Message') ?></button>
    </form>
<?php } else { ?>
    <div class="alert alert-info">
        <?= t('Please <a href="%s">sign in</a> or <a href="%s">register</a> to write a new topic.', $self->action('login'), $self->action('register'))?>
    </div>
<?php } ?>