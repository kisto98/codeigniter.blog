<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">  
<div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" placeholder="Add title" name="title" value="<?php echo $post['title'];?>">
  </div>
  <div class="form-group">
    <label>Body</label>
     <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div>
  <label>Upload Image</label>
    <input type="file" multiple="multiple" name="userfile" size="20" >
    <br>
    <div class="form-group">
    <?php if($post['file_name']): ?>
      <label>Curent image</label>
<img src="<?php echo site_url(); ?>uploads/<?php echo $post['file_name']; ?>" height="100" width="100">
<?php endif ; ?>
    </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <a class="btn btn-danger pull-left" href="<?php echo base_url(); ?>posts">Back</a>
</form>