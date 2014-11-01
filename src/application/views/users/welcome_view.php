<div class="content">
<h2>Welcome Back, <?php echo $this->session->userdata('email'); ?>!</h2>
  <p>This section represents the area that only logged in members can access.</p>
  <h4><?php echo anchor('users/logout', 'Logout'); ?></h4>
  <h4><?php echo anchor('users/edit','Edit')?></h4>
</div><!--<div class="content">-->