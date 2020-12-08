<?php if($this->session->userdata('user_id') == !(null)) : ?>

<h1>Welcome: <?php echo $this->session->userdata('username'); ?>, </h1>
<h2><?= $title ?></h2>
<?php foreach ($posts as $post) :?>
    <?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<h2><a class="text" href="<?php echo site_url('/posts/'.$post['slug']); ?>"><?php echo ($post['title']); ?> </a></h2>
<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
<?php echo form_open('/posts/delete/'.$post['id']) ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>
<?php endforeach; ?>
<?php echo $this->pagination->create_links(); ?>
<?php endif; ?>
<?php echo "Please log in first"; ?>