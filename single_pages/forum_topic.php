<?php
$token = Core::make('token');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<?php if ($forumSuccess) { ?>
    <div class="alert alert-success"><?= $forumSuccess ?></div>
<?php } ?>

<?php if ($forumError) { ?>
    <div class="alert alert-danger"><?= $forumError ?></div>
<?php } ?>
<h1><?= $currentPage->getCollectionName() ?></h1>

<div class="row">
    <div class="col-xs-12 col-sm-9">
        <div class="btn-group">
            <a class="btn btn-default" href="./"> Back to Topics </a>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 text-right">
        <div class="btn-group" role="group">
            <?php if ($user->isLoggedIn()) { ?>
                <?php if ($isMonitoring) { ?>
                    <a href="<?=$this->action('stopMonitoring')?>" class="btn btn-default">
                        <?=t('Stop Monitoring')?>
                    </a>
                <?php } else { ?>
                    <a href="<?=$this->action('startMonitoring')?>" class="btn btn-default">
                        <?=t('Start Monitoring')?>
                    </a>
                <?php } ?>
            <?php } ?>
            <a href="#reply" class="btn btn-default">
                <?=t('Reply')?>
            </a>
        </div>
    </div>
</div>

<?php foreach ($messages as $message) { ?>
    <div class="ortic-forum-message row thumbnail" id="message-<?= $message->getID() ?>">

        <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 col-xl-1">
            <?php View::element('user_avatar', ['user' => $message->user], 'ortic_forum') ?>
        </div>
        <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 col-xl-11">
            <div class="ortic-forum-message-author">
                <strong><?php View::element('user_link', ['user' => $message->user], 'ortic_forum') ?></strong>
                <?= Core::make('helper/date')->formatDateTime($currentPage->getCollectionDateLastModified()) ?>
                <?php if ($message->canEdit()) { ?>
                    |
                    <a class="ortic-forum-edit" href="#">
                        <?= t('Edit') ?>
                    </a>
                    <a class="ortic-forum-edit-cancel" style="display: none;" href="#">
                        <?= t('Cancel') ?>
                    </a>
                    |
                    <a class="ortic-forum-delete"
                       href="<?= $this->action('deleteMessage', [$message->getID(), $token->generate('deleteMessage')]) ?>">
                        <?= t('Delete') ?>
                    </a>
                <?php } ?>
            </div>
            <div class="ortic-forum-message-text">
                <p>
                    <?= nl2br($message->getMessageHtml()) ?>
                </p>
                <?php if ($attachment = $message->getAttachmentFile()) { ?>
                    <?php View::element('show_attachment', ['user' => $message->user, 'attachment' => $attachment], 'ortic_forum') ?>
                <?php } ?>
            </div>
            <div class="ortic-forum-message-edit" style="display: none;">
                <form method="POST" action="<?= $this->action('updateMessage', [$message->getID()]) ?>">
                    <?= $token->output('updateMessage'); ?>

                    <textarea class="form-control ortic-forum-message-edit-text" name="message" id="txt-message-<?= $message->getID() ?>" placeholder=""><?= $message->getMessage() ?></textarea>
                    <button class="btn btn-primary"><?= t('Save') ?></button>
                </form>
            </div>

        </div>
    </div>
<?php } ?>

<?php View::element('new_answer', ['self' => $this, 'token' => $token], 'ortic_forum') ?>
