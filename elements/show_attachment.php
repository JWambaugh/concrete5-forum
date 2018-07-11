<?php
$fileName = $attachment->getFileName();
$regex = '/\.(jpg|gif|png|jpeg)$/mi';
$isImage = preg_match($regex, $fileName);
?>

<?php
if($isImage) {?>
  <a href="<?= $attachment->getURL() ?>" class="thumbnail">
  <img src="<?=$attachment->getURL()?>" / >
  </a>  
<?} else {?>
  <a href="<?= $attachment->getURL() ?>" target="_blank"><?= $fileName ?></a>
<?}?>