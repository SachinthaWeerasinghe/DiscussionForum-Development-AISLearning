var myVar = setInterval(LoadData, 2000);

http_request = new XMLHttpRequest();

var commentsData = [];
var currentPage = 1;
var itemsPerPage = 10;


function renderQuestions(page) {
    $('#MyTable tbody').empty();
    var start = (page - 1) * itemsPerPage;
    var end = Math.min(start + itemsPerPage, commentsData.length);

    for (var i = start; i < end; i++) {
        var commentId = commentsData[i].id;
        if (commentsData[i].parent_comment == 0) {
            var row = $('<tr><td><b><img src="user.jpg" width="30px" height="30px" />'
             + commentsData[i].student + ' :<i> ' 
             + commentsData[i].date + ':</i></b></br><p style="padding-left:80px">' 
             + commentsData[i].post + '</br><a data-toggle="modal" data-id="' 
             + commentId + '" title="Add this item" class="open-ReplyModal" href="#ReplyModal">Reply</a>' 
             + '</p></td></tr>');
            $('#record').append(row);

            for (var r = 0; r < commentsData.length; r++) {
                if (commentsData[r].parent_comment == commentId) {
                    var comments = $('<tr><td style="padding-left:80px"><b><img src="user.jpg" width="30px" height="30px" />' 
                    + commentsData[r].student + ' :<i> ' 
                    + commentsData[r].date + ':</i></b></br><p style="padding-left:40px">' 
                    + commentsData[r].post + '</p></td></tr>');
                    $('#record').append(comments);
                }
            }
        }
    }
}

  

function LoadData() {
  $.ajax({
    url: 'view.php',
    type: "POST",
    dataType: 'json',
    success: function (data) {
      commentsData = data;
      renderQuestions(currentPage);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('Error: ' + textStatus + ' - ' + errorThrown);
    }
  });
}

$(document).on("click", ".open-ReplyModal", function () {
  var commentid = $(this).data('id');
  $(".modal-body #commentid").val(commentid);
});

$(document).ready(function () {
  $('#butsave').on('click', function () {
    $("#butsave").attr("disabled", "disabled");
    var id = document.forms["frm"]["Pcommentid"].value;
    var name = document.forms["frm"]["name"].value;
    var msg = document.forms["frm"]["msg"].value;
    if (name != "" && msg != "") {
      $.ajax({
        url: "save.php",
        type: "POST",
        data: {
          id: id,
          name: name,
          msg: msg,
        },
        cache: false,
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $("#butsave").removeAttr("disabled");
            document.forms["frm"]["Pcommentid"].value = "";
            document.forms["frm"]["name"].value = "";
            document.forms["frm"]["msg"].value = "";
            LoadData();
          } else if (dataResult.statusCode == 201) {
            alert("Error occurred!");
          }
        }
      });
    } else {
      alert('Please enter your name and your question !');
    }
  });

  $('#nextBtn').on('click', function () {
    if ((currentPage + 1) * itemsPerPage <= commentsData.length) {
      currentPage++;
      renderQuestions(currentPage);
    }
  });

  $('#prevBtn').on('click', function () {
    if (currentPage > 1) {
      currentPage--;
      renderQuestions(currentPage);
    }
  });
});


// Reply comment
$(document).ready(function () {
  $('#btnreply').on('click', function () {
    $("#btnreply").attr("disabled", "disabled");
    var id = document.forms["frm1"]["Rcommentid"].value;
    var name = document.forms["frm1"]["Rname"].value;
    var msg = document.forms["frm1"]["Rmsg"].value;
    if (name != "" && msg != "") {
      $.ajax({
        url: "save.php",
        type: "POST",
        data: {
          id: id,
          name: name,
          msg: msg,
        },
        cache: false,
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $("#btnreply").removeAttr("disabled");
            document.forms["frm1"]["Rcommentid"].value = "";
            document.forms["frm1"]["Rname"].value = "";
            document.forms["frm1"]["Rmsg"].value = "";
            LoadData();
            $("#ReplyModal").modal("hide");
          } else if (dataResult.statusCode == 201) {
            alert("Error occurred!");
          }
        }
      });
    } else {
      alert('Please enter your name and your reply !');
    }
  });
});
