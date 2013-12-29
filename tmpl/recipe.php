<?php require_once('header.php'); ?>
<?php if(!isset($recipe)): ?>
      <div class="alert alert-danger"><center><h3><b>Error:</b> recipe not found</h3></center></div>
<?php else: ?>
      <div class="jumbotron">
	<h2><b><?php echo $recipe['name']; ?></b></h2>
	<p>
	  <a href="recipe.php?name=<?php echo $recipe['name']; ?>&rate=1">
	    <span class="glyphicon glyphicon-star<?php echo round($recipe['rate']) >= 1 ? '' : '-empty'; ?>"></span></a>
	  <a href="recipe.php?name=<?php echo $recipe['name']; ?>&rate=2">
	    <span class="glyphicon glyphicon-star<?php echo round($recipe['rate']) >= 2 ? '' : '-empty'; ?>"></span></a>
	  <a href="recipe.php?name=<?php echo $recipe['name']; ?>&rate=3">
	    <span class="glyphicon glyphicon-star<?php echo round($recipe['rate']) >= 3 ? '' : '-empty'; ?>"></span></a>
	  <a href="recipe.php?name=<?php echo $recipe['name']; ?>&rate=4">
	    <span class="glyphicon glyphicon-star<?php echo round($recipe['rate']) >= 4 ? '' : '-empty'; ?>"></span></a>
	  <a href="recipe.php?name=<?php echo $recipe['name']; ?>&rate=5">
	    <span class="glyphicon glyphicon-star<?php echo round($recipe['rate']) >= 5 ? '' : '-empty'; ?>"></span></a>
	</p>
	<p class="lead"><?php echo $recipe['description']; ?></p>
        <p>
	  <div class="btn-group btn-group-lg" style="width:100%;">
	    <a class="btn btn-success" href="<?php echo $recipe['url']; ?>" style="width:50%;">Download <span class="glyphicon glyphicon-floppy-save"></span></a>
	    <a class="btn btn-primary" href="fork.php?name=<?php echo $recipe['name']; ?>" style="width:50%;">Fork <span class="glyphicon glyphicon-share"></span></a>
	  </div>
	</p>
      </div>
      <pre id="editor"><?php echo htmlspecialchars($recipe['code']); ?>
      </pre>

      <script src="http://ace.c9.io/build/src-min/ace.js" type="text/javascript" charset="utf-8"></script>
      <script>
      var editor = ace.edit("editor");
      editor.setReadOnly(true);
      editor.setTheme("ace/theme/twilight");
      editor.session.setMode("ace/mode/java");
      </script>
<?php endif; ?>
<?php require_once('footer.php'); ?>