<?php require_once('header.php'); ?>
      <div class="jumbotron">
        <h1>Market API <span class="glyphicon glyphicon-cog"></span></h1>
        <p class="lead">Market API is a highly configurable way to access JSONified market data. You can use it to build your own application</p>
      </div>
      
      <div class="row marketing" id="info">
	<div class="col-lg-12">
          <h3>New recipes</h3>
          <a href="http://ify.cs.put.poznan.pl/~scony/marketify/api/new.php"><h4>http://ify.cs.put.poznan.pl/~scony/marketify/api/new.php?limit={limit}</h4></a>
	  <p>{limit} - int - number of new recipes to fetch</p>

          <h3>All recipes</h3>
          <a href="http://ify.cs.put.poznan.pl/~scony/marketify/api/recipes.php"><h4>http://ify.cs.put.poznan.pl/~scony/marketify/api/recipes.php?page={page}&limit={limit}</h4></a>
	  <p>{page} - int - page number to fetch recipes from</p>
	  <p>{limit} - int - number of recipes per page</p>

          <h3>Search</h3>
          <a href="http://ify.cs.put.poznan.pl/~scony/marketify/api/search.php"><h4>http://ify.cs.put.poznan.pl/~scony/marketify/api/search.php?phrase={phrase}</h4></a>
	  <p>{phrase} - string - phrase to search through recipes</p>

          <h3>Concrete recipe</h3>
          <a href="http://ify.cs.put.poznan.pl/~scony/marketify/api/recipe.php"><h4>http://ify.cs.put.poznan.pl/~scony/marketify/api/recipe.php?name={name}</h4></a>
	  <p>{name} - string - full name of recipe to fetch</p>

          <h3>Random recipe</h3>
          <a href="http://ify.cs.put.poznan.pl/~scony/marketify/api/random.php"><h4>http://ify.cs.put.poznan.pl/~scony/marketify/api/random.php</h4></a>
	</div>
      </div>
<?php require_once('footer.php'); ?>