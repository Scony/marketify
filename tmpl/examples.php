      <div class="jumbotron">
        <h1>Examples <span class="glyphicon glyphicon-thumbs-up"></span></h1>
        <p class="lead">
	  Examples are basic, well-commented recipes created by staff. Feel free to fork, learn and reuse.
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
