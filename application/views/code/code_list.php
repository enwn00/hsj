
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

		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">번호</th>
		      <th scope="col">제목</th>
		      <th scope="col">소스코드</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(count($list) > 0) : ?>
		  		<?php foreach($list as $key => $data) :?>
		  			<tr>
				      <th scope="row"><?= $key ?></th>
				      <td><?=$data['code_title']?></td>
				      <td><?=$data['source_code']?></td>
				      <td><button type="button" onclick="location.href='/code/set/<?=$data['code_id']?>'" class="btn btn-light">수정</button></td>
				    </tr>
		  		<?php endforeach ;?>
		  	<?php else : ?>
		  		<tr>
			      <td colspan="4">목록이 없습니다.</td>
			    </tr>
		  	<?php endif ; ?>
		  </tbody>
		</table>

		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		    <li class="page-item disabled">
		      <a class="page-link" href="#" tabindex="-1">Previous</a>
		    </li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item">
		      <a class="page-link" href="#">Next</a>
		    </li>
		  </ul>
		</nav>

		<div class="btn-group" role="group" aria-label="Basic example">
			<button type="button" onclick="location.href='/code/set'" class="btn btn-light">작성</button>
		</div>


      <footer>
        <p>&copy; Company 2021</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>


