<form action="/index.php/topic/add" method="POST" class="col-md-10">
  <?php echo validation_errors(); ?>
  <input type="text" name="title" placeholder="제목" class="col-md-12"/>
  <br>
  <textarea name="description" placeholder="본문" class="col-md-12" rows="15"></textarea>
  <input class="btn" type="submit"/>
</form>
