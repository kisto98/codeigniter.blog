
<h2><?php echo $post['title']; ?></h2>
<p><a class="text" href="<?php echo site_url('/posts/') ?>">Back</a></p>
<div class="post-body">
<small>Posted on: <?php echo $post['created_at']; ?></small><br>
<?php echo $post['body']; ?>
</div>
<?php if($post['file_name']): ?>
<img src="<?php echo site_url(); ?>uploads/<?php echo $post['file_name']; ?>" height="500" width="500">
<?php endif ; ?>
<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<hr>
<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<?php echo form_open('/posts/delete/'.$post['id']) ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif ; ?>