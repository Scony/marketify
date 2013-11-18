<?php require_once('header.php'); ?>
<?php if(!isset($recipe)): ?>
      <div class="alert alert-danger"><center><h3><b>Error:</b> recipe not found</h3></center></div>
<?php else: ?>
      <div class="jumbotron">
	<h2><b><?php echo $recipe['name']; ?></b></h2>
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
        <p>
	  <div class="btn-group btn-group-lg" style="width:100%;">
	    <a class="btn btn-success" href="<?php echo $recipe['url']; ?>" style="width:50%;">Download <span class="glyphicon glyphicon-floppy-save"></span></a>
	    <a class="btn btn-primary" href="#" style="width:50%;">Fork <span class="glyphicon glyphicon-share"></span></a>
	  </div>
	</p>
      </div>
      <pre class="prettyprint"><?php echo htmlspecialchars($recipe['code']); ?>
      </pre>
<?php endif; ?>
<?php require_once('footer.php'); ?>