<form action="/index.php/topic/add" method="POST" class="col-md-10">
  <?php echo validation_errors(); ?>
  <input type="text" name="title" placeholder="제목" class="col-md-12" />
  <textarea name="description" placeholder="본문" class="col-md-12" rows="15"></textarea>
  <input class="btn" type="submit"/>
</form>
<script src="/static/lib/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('description',{'filebrowserUploadUrl':'/index.php/topic/upload_receive_from_ck'});
</script>
