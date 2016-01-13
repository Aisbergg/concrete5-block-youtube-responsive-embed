<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<style>
    .ccm-ui .beside {
        display: inline-block;
								width: 49%;
    }
    .ccm-ui .form-control.small-width {
        display: inline-block;
								width: 60px;
    }
				.ccm-ui .form-control.small-width {
        display: inline-block;
								width: 60px;
    }
				.ccm-ui label.footnote {
					 float: right;
					 right: 0;
					 bottom: 0;
    }
</style>
<div class="form-group">
    <label><?php echo t('YouTube URL')?></label>
    <input type="text" class="form-control" id="YouTubeVideoURL" name="youtubeURL" value="<?php echo $bObj->youtubeURL?>" />
</div>
<div class="form-group" value="<?php  echo $bObj->aspectWidth?>">
  <div class="form-group beside">
			<label><?php echo t('Max Width')?>*</label>
   <input type="text" class="form-control" id="YouTubeVideoMaxWidth" name="maxWidth" value="<?php echo $bObj->maxWidth?>" />
 </div>
 <div class="form-group beside" value="<?php  echo $bObj->aspectWidth?>">
  <label><?php echo t('Max Height')?>*</label>
	 
  <input type="text" class="form-control" id="YouTubeVideoMaxHeight" name="maxHeight" value="<?php echo $bObj->maxHeight?>" />
	</div>
</div>
<div class="form-group">
    <label><?php  echo t('Aspect Ratio')?></label>
				<div>
					<input type="text" class="form-control small-width" id="YouTubeVideoAspectWidth" name="aspectWidth" value="<?php  echo $bObj->aspectWidth?>" />
     :
					<input type="text" class="form-control small-width" id="YouTubeVideoAspectHeight" name="aspectHeight" value="<?php  echo $bObj->aspectHeight?>" />
				</div>
</div>
<label class="footnote"><?php echo t('* 0 == disabled')?></label>
