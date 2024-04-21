<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16"> 
<title>AIS Learning</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="forumStyles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
  <style>
    body {
        background-image: url('AIS_Logo2.png'); /* Replace with the path to your image */
        background-size: cover; /* Adjust as needed */
        background-repeat: no-repeat;
    }
    a{
        text-decoration: none;
        color:white;
    }
    a:hover {
        background-color: gray;
    }
</style>
</head>


<!-- Modal -->
<div id="ReplyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style ="font-size : 35px; font-style: italic; font-weight:bold; font-family: cursive;"
        >Reply Question</h4>
      </div>
      <div class="modal-body">
        <form name="frm1" method="post">
            <input type="hidden" id="commentid" name="Rcommentid">
        	<div class="form-group">
        	  <label for="usr"style = "font-size: 25px; font-family: cursive;">Your name:</label>
        	  <input type="text" class="form-control" name="Rname" required>
        	</div>
            <div class="form-group">
              <label for="comment" style = "font-size: 25px; font-family: cursive;">Your reply:</label>
              <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
            </div>
        	 <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
      </form>
      </div>
    </div>

  </div>
</div>

<div class="container">
<div class="col-md-12 logo-title-container position-fixed pb-3" style="background-color: rgba(255, 255, 255, 0.0);">
            <div class="logo-container">
                <img src="AIS_Logo2.png" alt="AIS Logo" width="250" height="250"/>
            </div>
            <h1 class="levelHeading" style="margin-top:50px; font-style: italic; color: white; font-size: 150px;">AIS Learning</h1>
            
            <hr class="my-4">
        </div>
      </div>
  </div>
<br/>
<br/>

<div class="container">

<div class="panel panel-default" style="margin-top:50px">
  <div class="panel-body">
    <h3
        style ="font-size : 35px; font-style: italic; font-weight:bold; font-family: cursive;"
    >Ask the Community of Students and Teachers of AIS Family</h3>
    <hr>
    <form name="frm" method="post">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
	<div class="form-group">
	  <label for="usr" style = "font-size: 25px; font-family: cursive;">Your name:</label>
	  <input type="text" class="form-control" name="name" required>
	</div>
    <div class="form-group">
      <label for="comment" style = "font-size: 25px; font-family: cursive;">What do you need help with? </label>
      <textarea class="form-control" rows="5" name="msg" required></textarea>
    </div>
	 <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send" style ="font-size : 20px">
  </form>
  </div>
</div>

<br/>
<br/>
  
<div class="panel panel-default">
  <div class="panel-body">
    <h4 style = "font-size: 25px; font-weight:bold;font-family: cursive;">Recent questions</h4>           
    <div class="question-container">
      <table class="table" id="MyTable" style="background-color: Black; color:white; border:0px;border-radius:10px">
        <tbody id="record">
          
        </tbody>
      </table>
      
    </div>
  </div>
</div>

<br/>
<a href="http://localhost/Learners_Login/first.php">
<button type="button" class="btn btn-primary">Home </button>
</a>
<a href="javascript:history.go(-1)">
<button type="button" class="btn btn-primary">Back </button>
</a>
  
  
</div>

</body>
</html>