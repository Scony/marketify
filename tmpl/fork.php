<?php require_once('header.php'); ?>
<?php if(isset($failure)): ?>
      <div class="alert alert-danger"><center><h3><b>Error:</b> recipe not found</h3></center></div>
<?php else: ?>
      <div class="jumbotron">
        <h1>Forking into <span class="glyphicon glyphicon-share"></span></h1>
        <p class="lead"><?php echo $name; ?></p>
	<form action="upload.php" method="POST" style="text-align: left">
	  <input type="hidden" name="fname" value="<?php echo $name; ?>">
	  <label>New class name</label>
	  <input type="text" name="nname" class="form-control input-lg">
	  <hr>
	  <button type="submit" class="btn btn-lg btn-block btn-primary">Continue</button>
	</form>
      </div>
<?php endif; ?>
<?php require_once('footer.php'); ?>