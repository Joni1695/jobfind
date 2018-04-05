<div class="col_12 column">
  <?php if($this->session->flashdata('signupfail')) : ?>
    <div class="notice error">
      <?php echo $this->session->flashdata('signupfail'); ?>
    </div>
  <?php endif; ?>
  <?php echo validation_errors('<div class="notice error">','</div>'); ?>
  <form id="reg_form" action="<?php echo base_url();?>home/register" method="POST">
    <fieldset>
    <legend>Create An Account</legend>
      <p>
        <label for="first_name">First Name</label>
        <input id="first_name" name="first_name" type="text"/>
      </p>
      <p>
        <label for="last_name">Last Name</label>
        <input id="last_name" name="last_name" type="text"/>
      </p>
      <p>
        <label for="username">Username</label>
        <input id="username" name="username" type="text"/>
      </p>
      <p>
        <label for="email">Email</label>
        <input id="emali" name="email" type="text"/>
      </p>
      <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password"/>
      </p>
      <p>
        <label for="password2">Confirm Password</label>
        <input id="password2" name="password2" type="password"/>
      </p>
      <p>
        <input type="submit" value="Submit"/>
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
