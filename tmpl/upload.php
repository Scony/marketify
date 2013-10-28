<?php require_once('header.php'); ?>
<?php if(isset($failure)): ?>
      <div class="alert alert-danger"><center><h3><b>Error:</b> can not process your code</h3></center></div>
<?php endif; ?>
      <div class="jumbotron">
        <h1>Share your code <span class="glyphicon glyphicon-cloud-upload"></span></h1>
        <p class="lead">If you have prepared your own recipe, you can upload its code and enjoy ready-to-go jar</p>
	<form action="" method="POST" style="text-align: left">
	  <label>Class name</label>
	  <input type="text" name="name" class="form-control input-lg">
	  <label>Description</label>
	  <textarea name="description" style="height:100px;" class="form-control input-lg"></textarea>
	  <label>Code</label>
	  <textarea name="code" style="height:400px;" class="form-control input-lg"></textarea>
	  <hr>
	  <button type="submit" class="btn btn-lg btn-block btn-success">Submit <span class="glyphicon glyphicon-floppy-open"></span></button>
	</form>
      </div>
<?php require_once('footer.php'); ?>