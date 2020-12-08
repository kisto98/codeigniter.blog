<html>
<head>
<title>NBG</title>
<link rel="stylesheet" href="https://bootswatch.com/3/darkly/bootstrap.min.css">
<script src="http://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>posts">NBG</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">

      <?php if($this->session->userdata('logged_in')) : ?>
        <li><a href="<?php echo base_url(); ?>posts">My Posts</a></li>
        <li><a href="<?php echo base_url(); ?>posts/allposts">All Posts</a></li>
        <li><a href="<?php echo base_url(); ?>posts/create">New post</a></li>
        <?php endif; ?>
        <?php if(!$this->session->userdata('logged_in')) : ?>
        <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
        <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
        <?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if($this->session->userdata('logged_in')) : ?>
      <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">