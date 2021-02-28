
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jumbotron Template for Bootstrap</title>
  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Coding Test List</h1>
      </div>
    </div>

    <div class="container">
    	<div>
    		<?= nl2br($info['source_code']); ?>
    	</div>
  		<div>
  			<?php eval($info['source_code']); ?>
  		</div>
      <footer>
        <p>&copy; Company 2021</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>


