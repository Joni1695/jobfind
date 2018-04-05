<div id="category_block" class="col_12 column">
  <h3>My Jobs</h3>
</div>
<div class="col_12 column">

  <ul id="listings">
    <?php foreach($myjobs as $job) :?>
    <li>
      <?php $type=get_color_h($job->fk_type_id); $location=get_location_h($job->fk_city_id);?>
      <div class="type">
        <span style="background:<?php echo $type->color;?>;"><?php echo $type->type_name;?></span>
      </div>
      <div class="description">
        <h5><?php echo $job->title;?> ( <?php echo $location->city_name;?> )</h5>
        <?php echo substr($job->description,0,300);?>
        <a href="<?php echo base_url();?>details/<?php echo $job->id;?>"><i class="fa fa-plus"></i>Read More..</a><a href="<?php echo base_url(); ?>delete/<?php echo $job->id; ?>" ><span style="color:red;"><i class="fa fa-times"></i>Delete
        </span></a>
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
