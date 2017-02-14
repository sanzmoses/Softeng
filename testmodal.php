<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <p>Link 1</p>
<a data-toggle="modal" data-id="ISBN564541" title="Add this item" class="open-AddBookDialog btn btn-primary" data-target="#addBookDialog">test</a>

<p>&nbsp;</p>


<p>Link 2</p>
<a data-toggle="modal" data-id="ISBN-001122" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>

<div class="modal fade" id="addBookDialog" role="dialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Modal header</h3>
  </div>
    <div class="modal-body">
        <p>some content</p>
        <input type="text" name="bookId" id="bookId" value=""/>
    </div>
</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

<script type="text/javascript">
$(document).on("click", ".open-AddBookDialog", function () {
   var myBookId = $(this).data('id');
   $(".modal-body #bookId").val( myBookId );
   // As pointed out in comments,
   // it is superfluous to have to manually call the modal.
  $('#addBookDialog').modal('show');
});
</script>
  </body>
</html>
