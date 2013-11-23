      <div class="jumbotron">
        <h1>Recipe repository <span class="glyphicon glyphicon-th"></span></h1>
        <p class="lead">
	  Our repository contains all recipes that ever existed. You can access all of them in order to download or to fork
	</p>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th>Rate</th>
            <th>Name</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
<?php if(isset($recipes)): ?>
<?php foreach($recipes as $recipe): ?>
          <tr>
	    <td><?php echo $recipe['rate'] ? number_format($recipe['rate'],2) : ''?></td>
            <td><a href="recipe.php?name=<?php echo $recipe['name']; ?>"><?php echo $recipe['name']; ?></a></td>
            <td><?php echo $recipe['description']; ?></td>
          </tr>
<?php endforeach; ?>
<?php endif; ?>
        </tbody>
      </table>

      <center>
      <ul class="pagination pagination-lg">
	<li><a href="#">&laquo;</a></li>
	<li><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li><a href="#">&raquo;</a></li>
      </ul>
      </center>
