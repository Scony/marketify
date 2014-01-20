<?php require_once('header.php'); ?>
<?php if(isset($failure)): ?>
      <div class="alert alert-danger"><center><h3><b>Error:</b> can not process your code</h3></center></div>
      <div class="alert alert-danger">
<?php foreach($failure as $line): ?>
<?php echo htmlspecialchars($line).'<br>'; ?>
<?php endforeach; ?>
      </div>
<?php endif; ?>
      <div class="jumbotron">
        <h1>Share your code <span class="glyphicon glyphicon-cloud-upload"></span></h1>
        <p class="lead">If you have prepared your own recipe, you can upload its code and enjoy ready-to-go jar</p>
	<form action="" method="POST" style="text-align: left">
	  <input type="hidden" name="forked" value="<?php echo isset($fname) ? $fname : ''; ?>">
	  <label>Description</label>
	  <textarea name="description" style="height:100px;" class="form-control input-lg"><?php echo isset($fdescription) ? $fdescription : ''; ?></textarea>
	  <label>Code</label>
	  <textarea name="code" style="display:none;"></textarea>
	  <pre id="editor"><?php echo isset($fcode) ? $fcode : ''; ?></pre>
	  <hr>
	  <button type="submit" class="btn btn-lg btn-block btn-success">Submit <span class="glyphicon glyphicon-floppy-save"></span></button>
	</form>
      </div>

      <script src="./js/editor.js" type="text/javascript" charset="utf-8"></script>
      <script src="http://ace.c9.io/build/src-min/ace.js" type="text/javascript" charset="utf-8"></script>
      <script src="http://ace.c9.io/build/src-min/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>
      <script src="./js/ace-settings.js" type="text/javascript" charset="utf-8"></script>
<?php require_once('footer.php'); ?>