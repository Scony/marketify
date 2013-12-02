<?php require_once('upload_header.php'); ?>
<?php if(isset($failure)): ?>
      <div class="alert alert-danger"><center><h3><b>Error:</b> can not process your code</h3></center></div>
<?php endif; ?>
      <div class="jumbotron">
        <h1>Share your code <span class="glyphicon glyphicon-cloud-upload"></span></h1>
        <p class="lead">If you have prepared your own recipe, you can upload its code and enjoy ready-to-go jar</p>
	<form action="" method="POST" style="text-align: left">
	  <input type="hidden" name="forked" value="<?php echo isset($fname) ? $fname : ''; ?>">
	  <label>Description</label>
	  <textarea name="description" style="height:100px;" class="form-control input-lg"><?php echo isset($fdescription) ? $fdescription : ''; ?></textarea>
	  <label>Code</label>
	  <pre class="editor" data-editor-lang="java" style="height: 500px;"><?php echo isset($fcode) ? $fcode : ''; ?></pre>
	  <hr>
	  <button type="submit" class="btn btn-lg btn-block btn-success">Submit <span class="glyphicon glyphicon-floppy-open"></span></button>
	</form>
      </div>
<?php require_once('footer.php'); ?>