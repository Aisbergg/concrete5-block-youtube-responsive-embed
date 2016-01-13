<?php
defined('C5_EXECUTE') or die("Access Denied.");

// strip youtube url to get the video id
$url       = parse_url($youtubeURL);
$pathParts = explode('/', rtrim($url['path'], '/'));
$videoID   = end($pathParts);

// calculate the bottom padding through aspect ratio
$aspectWidth  = ($aspectWidth)  ? $aspectWidth  : 16;
$aspectHeight = ($aspectHeight) ? $aspectHeight : 9;
$cHeight = ($cHeight) ? $cHeight : 0;
$aspectRatio = ($aspectHeight>0) ? $aspectWidth/$aspectHeight : 100;
$paddingPct=100/$aspectRatio;

// max width; disabling by setting to zero
$maxWidth = ($maxWidth) ? $maxWidth : 0;
$maxHeight = ($maxHeight) ? $maxHeight : 0;

if ($maxWidth != 0 && $maxHeight != 0) {
	$maxWidth = min($maxWidth, $maxHeight*$aspectWidth/$aspectHeight);
} elseif ($maxHeight != 0) {
	$maxWidth = $maxHeight*$aspectWidth/$aspectHeight;
}

if (isset($url['query'])) {
	parse_str($url['query'], $query);
	$videoID = (isset($query['v'])) ? $query['v'] : $videoID;
}

if ($maxWidth != 0) { ?>
	<div class="video-wrapper" style="width: <?php echo $maxWidth; ?>px">
<?php }
if (Page::getCurrentPage()->isEditMode()) { ?>
	<div class="ccm-edit-mode-disabled-item" style="padding-bottom: <?php echo $paddingPct; ?>%">
		<div style="padding:8px 0px; padding-top: <?php echo round($vHeight/2)-10; ?>px;"><?php echo t('YouTube Video disabled in edit mode.'); ?></div>
	</div>
<?php } else { ?>
	<div id="youtube-responsive<?php echo $bID; ?>" class="video-container" style="padding-bottom:  <?php echo $paddingPct; ?>%">
		<iframe class="youtube-player" src="//www.youtube.com/embed/<?php echo $videoID; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
	</div>	
<?php } ?>
<?php if ($maxWidth != 0) { ?>
	</div>
<?php } ?>
