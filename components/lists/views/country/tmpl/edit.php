<?php
/**
Package: Point of sale
version: 1.0.0
URI: https://webapplics.com/apps/pos/1.0.0/docs
Author: Shafique Ahmad
Author URI: http://webapplics.com/
Description: 
copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/

defined('_MEXEC') or die ('Restricted Access');

$app=core::getApplication();

$id=0;
$title='';
$published=1;
$is_origin=0;
$is_destination=0;
$action='add';
if(isset($this->row['id'])){$id=$this->row['id'];$action='update';}
if(isset($this->row['title'])){$title=$this->row['title'];}
if(isset($this->row['published'])){$published=$this->row['published'];}
if(isset($this->row['is_origin'])){$is_origin=$this->row['is_origin'];}
if(isset($this->row['is_destination'])){$is_destination=$this->row['is_destination'];}
//var_dump($this->row);exit;


?>
<div class="table-responsive">
<div class="com-head">
</div><div class="form-group">
	<form class="form-inline" id="root-form" method="post" name="frm" action="?com=lists&view=country&task=edit&id=<?php echo $this->id;?>">
		<fieldset class="form">
			<div class="form grid">
			<input type="hidden" name="id" value="<?php if(isset($this->row['id'])){ echo $this->row['id'];}?>" />
			<input type="hidden" name="action" value="<?php echo $action; ?>" />
			<input type="hidden" name="source" value="countries" />
			<input type="hidden" name="token" value="<?php //echo TOKEN; ?>" />
			<div class="row">
				<div class="col-sm-1"><label class="control-label" for="title">Country:</label></div><div class="col-sm-6"><input name="title" pattern=".{3,}" class="inputbox form-control" value="<?php echo $title;?>" required autofocus autocomplete="off" /></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><label class="control-label">Published: <input name="published" type="checkbox" class="checkbox" <?php if($published){echo 'checked';} ?> /></label></div>
			</div>
			<div class="btn-group">
				<span><button type="submit" id="save" class="btn btn-success btn-flat" tabindex="-1" ><i class="fa fa-save"></i> Save</button></span>
				<span><a href="index.php?com=lists&view=countries" class="btn btn-info btn-flat" tabindex="-1" ><i class="fa fa-circle-o"></i> Countries</a></span>
			</div>
			</div>
			</div>
		</fieldset>
	</form>
</div>
</div>
<!-- Select2 -->
<?php /*?><link rel="stylesheet" href="templates/<?php echo $app->getTemplate();?>/bower_components/select2/dist/css/select2.min.css">
<script src="templates/<?php echo $app->getTemplate();?>/bower_components/select2/dist/js/select2.full.min.js"></script>
$(function () {
	//Initialize Select2 Elements
	$('select').select2()
})

<?php */ ?>

<script>

</script>

