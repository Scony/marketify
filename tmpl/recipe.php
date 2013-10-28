<?php require_once('header.php'); ?>
<?php if(!isset($recipe)): ?>
      <div class="alert alert-danger"><center><h3><b>Error:</b> recipe not found</h3></center></div>
<?php else: ?>
      <div class="jumbotron">
	<h1><?php echo $recipe['name']; ?></h1>
	<p>
	  <span class="glyphicon glyphicon-heart"></span>
	  <span class="glyphicon glyphicon-heart"></span>
	  <span class="glyphicon glyphicon-heart"></span>
	  <span class="glyphicon glyphicon-heart"></span>
	  <span class="glyphicon glyphicon-heart-empty"></span>
	</p>
	<p class="lead"><?php echo $recipe['description']; ?></p>
	<p>
	  <div class="input-group input-group-sm">
	    <input class="form-control input-sm" type="text" value="<?php echo $recipe['url']; ?>">
	    <span class="input-group-btn">
              <button class="btn btn-default bnt-sm" type="button"><span class="glyphicon glyphicon-floppy-disk"></span></button>
	    </span>
	  </div>
	</p>
        <p><a class="btn btn-lg btn-success" href="<?php echo $recipe['url']; ?>">Download <span class="glyphicon glyphicon-floppy-save"></span></a></p>
      </div>
<?php endif; ?>
<?php require_once('footer.php'); ?>