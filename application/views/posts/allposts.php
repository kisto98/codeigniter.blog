<h2><?= $title ?></h2>

<?php foreach ($posts as $post) :?>
   <h2><a class="text" href="<?php echo site_url('/posts/'.$post['slug']); ?>"><?php echo ($post['title']); ?> </a></h2>
<a class="btn btn-default pull-right" href="<?php echo base_url(); ?>posts/<?php echo $post['slug']; ?>">Read more</a>

</form>
<?php endforeach; ?>
<?php echo $this->pagination->create_links(); ?>
