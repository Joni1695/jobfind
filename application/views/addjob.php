<?php echo $map['html']; ?>
<div class="col_12 column">
  <?php if($this->session->flashdata('categoryfail')) : ?>
    <div class="notice error">
      <?php echo $this->session->flashdata('categoryfail'); ?>
    </div>
  <?php endif; ?>
  <?php if($this->session->flashdata('typefail')) : ?>
    <div class="notice error">
      <?php echo $this->session->flashdata('typefail'); ?>
    </div>
  <?php endif; ?>
  <?php if($this->session->flashdata('cityfail')) : ?>
    <div class="notice error">
      <?php echo $this->session->flashdata('cityfail'); ?>
    </div>
  <?php endif; ?>
  <?php if($this->session->flashdata('failadd')) : ?>
    <div class="notice error">
      <?php echo $this->session->flashdata('failadd'); ?>
    </div>
  <?php endif; ?>
  <?php if($this->session->flashdata('badext')) : ?>
    <div class="notice error">
      <?php echo $this->session->flashdata('badext'); ?>
    </div>
  <?php endif; ?>
  <?php echo validation_errors('<div class="notice error">','</div>'); ?>
  <form action="<?php echo base_url(); ?>home/addjob" enctype="multipart/form-data" method="POST">
    <fieldset>
      <legend>Create A Job</legend>
      <p>
        <label class="center" for="company_name">Company:</label>
        <input class="center" style="width:35%;" type="text" id="company_name" name="company_name" placeholder="Exp. Gamerstation SHPK">
      </p>
      <p>
        <label class="center" style="text-align:center;" for="title">Title:</label>
        <input class="center" style="width:35%;" type="text" id="title" name="title" placeholder="Exp. Software Developer">
      </p>

      <p>
        <label class="center" for="city">Location:</label>
        <select class="center" style="width:35%;" id="city" name="city">
          <option value="default">Select City</option>
          <?php foreach(get_provinces_h() as $province) :?>
            <optgroup label="<?php echo $province->name;?>">
              <?php foreach(get_cities_h($province->id) as $city) :?>
                <option value="<?php echo $city->id;?>"><?php echo $city->city_name;?></option>
              <?php endforeach;?>
            </optgroup>
          <?php endforeach;?>
        </select>
      </p>
      <p>
        <label class="center" style="text-align:center;" for="category">Category:</label>
        <select class="center" style="width:35%;" id="category" name="category">
          <option value="default">Select Category</option>
          <?php foreach(get_categories_h() as $category) :?>
          <option value="<?php echo $category->id;?>"><?php echo $category->category_name;?></option>
          <?php endforeach;?>
        </select>
      </p>
      <p>
        <label class="center"  style="text-align:center;" for="type">Type:</label>
        <select class="center" style="width:35%;"id="type" name="type">
          <option value="default">Select Type</option>
          <option value="1">Full-time</option>
          <option value="2">Part-time</option>
          <option value="3">Freelancer</option>
        </select>
      </p>
      <p>
        <label class="center" for="image">Image:</label>
        <input type="file" id="image" name="image" value="">
      </p>
      <p>
        <label class="center"  style="text-align:center;" for="description">Description:</label>
        <textarea name="description" style="width:35%;" id="description" ></textarea>
      </p>
    </fieldset>
    <input class="center" type="submit" value="Submit"/>
    <input type="hidden" name="latitude" value="41.3273">
    <input type="hidden" name="longtitude" value="19.8187">
  </form>
</div>
<div class="clearfix"></div>
<footer>
  <p>Copyright @copy; 2016, JobFind, All Rights Reserved</p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
