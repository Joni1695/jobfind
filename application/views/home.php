<div class="col_12 column">
  <?php if($this->session->flashdata('registered')) : ?>
    <div class="notice success">
      <?php echo $this->session->flashdata('registered'); ?>
    </div>
  <?php endif; ?>
  <?php if($this->session->flashdata('successfuladd')) : ?>
    <div class="notice success">
      <?php echo $this->session->flashdata('successfuladd'); ?>
    </div>
  <?php endif; ?>
  <h3>Latest Job Listings</h3>
  <ul id="listings">
    <?php foreach($jobs as $job) :?>
    <li>
      <?php $type=get_color_h($job->fk_type_id); $location=get_location_h($job->fk_city_id);?>
      <div class="type">
        <span style="background:<?php echo $type->color;?>;"><?php echo $type->type_name;?></span>
      </div>
      <div class="description">
        <h5><?php echo $job->title;?> ( <?php echo $location->city_name;?> )</h5>
        <?php echo substr($job->description,0,300);?>
        <a href="<?php echo base_url();?>details/<?php echo $job->id;?>"><i class="fa fa-plus"></i>Read More..</a>
      </div>
    </li>
  <?php endforeach;?>
  </ul>
</div>

<div class="clearfix"></div>
<footer>
  <p>Copyright @copy; 2016, JobFind, All Rights Reserved</p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
