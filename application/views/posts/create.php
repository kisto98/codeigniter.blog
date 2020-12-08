<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" placeholder="Add title" name="title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add body"></textarea>
  </div>
  <div class="form-group">
	  <label>Upload Image</label>
	  <input type="file" multiple="multiple" name="userfile" size="20">
  </div>
  <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>posts">Back</a>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
