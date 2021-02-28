<!-- code mirror -->
<link rel='stylesheet' href='<?= site_url('assets/plugins/codemirror/codemirror.css') ?>'>
<script src="<?= site_url('assets/plugins/codemirror/codemirror.js') ?>"></script>

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
        <h1>Coding Test Set</h1>
      </div>
    </div>

    <div class="container">

		<form action="<?= (isset($info['code_id']) && !empty($info['code_id'])) ? '/data/code/put/' : '/data/code/set/' ?>" method="POST">
      <input type="hidden" name="id" value="<?= (isset($info['code_id']) && !empty($info['code_id'])) ? $info['code_id'] : '' ?>">

		  <div class="form-group">
		    <label for="exampleFormControlInput1">Title</label>
		    <input type="text" name="title" class="form-control" value="<?= (isset($info['code_title']) && !empty($info['code_title'])) ? $info['code_title'] : '' ?>">
		  </div>
		  <div class="form-group">
		    <label for="textarea">Source Code</label>
		    <textarea name="textarea" class="form-control" id="textarea" rows="10"><?= (isset($info['source_code']) && !empty($info['source_code'])) ? $info['source_code'] : '' ?></textarea>
		  </div>

      <button type="submit" class="btn btn-primary"><?= (isset($info['code_id']) && !empty($info['code_id'])) ? '수정' : '등록' ?></button>
		  <button type="button" class="btn btn-info" id="code_run">실행</button>
      <button type="button" class="btn btn-dark pull-right" onclick="location.href='/code/list'">목록</button>
		</form>

		<div id="code_run_result"></div>

      <footer>
        <p>&copy; Company 2021</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>


<script>
	$(function() {
        $("#code_run").click(function () {
            $.ajax({
                url: "/data/code/run/",
                type: "POST",
                data: {
                    "textarea": $("#textarea").val()
                },
                dataType: "JSON",
                complete: function(data, textStatus) {
                    $("#code_run_result").html(data.responseText);
                }
            });
        });
    });

    var editor = CodeMirror.fromTextArea(document.getElementById("textarea"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true
    });

</script>