<div class="col_12 column">
  <?php if($this->session->flashdata('fail_login')) : ?>
    <div class="notice error">
      <?php echo $this->session->flashdata('fail_login'); ?>
    </div>
  <?php endif; ?>
  <form id="login_form" action="<?php echo base_url();?>home/signin" method="POST">
    <fieldset>
    <legend>Login</legend>
      <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text"/>
      </p>
      <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password"/>
      </p>
      <p>
        <input type="submit" value="Login"/>
      </p>
    </fieldset>
  </form>
</div>

<div class="clearfix"></div>
<footer>
  <p>Copyright @copy; 2016, JobFind, All Rights Reserved</p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
