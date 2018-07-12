<hr>

<h3><?= t('Start new discussion') ?></h3>

<?php if (User::isLoggedIn()) { ?>
    <form method="POST" action="<?= $self->action('writeTopic') ?>" enctype="multipart/form-data">
        <?= $token->output('writeTopic') ?>

        <div class="form-group">
            <label for="subject"><?= t('Subject') ?></label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="" value="<?=h($forumTopicSubject)?>">
        </div>
        <div class="form-group">
            <label for="message"><?= t('Message') ?></label>
            <textarea class="form-control" name="message" id="txt-new-message" placeholder=""><?=h($forumTopicMessage)?></textarea>
        </div>
        <div class="form-group">
            <label for="attachment"><?= t('Attachment') ?></label>
            <input type="file" class="form-control" name="attachment" id="attachment" placeholder="">
        </div>
        <button class="btn btn-primary"><?= t('Post Message') ?></button>
    </form>
<?php } else { ?>
    <div class="alert alert-info">
        <?= t('Please <a href="%s">sign in</a> or <a href="%s">register</a> to add a new discussion.', $self->action('login'), $self->action('register'))?>
    </div>
<?php } ?>


<script>
$(document).ready(function(){
    var simplemde = new SimpleMDE({ element: $("#txt-new-message")[0] });
});

</script>