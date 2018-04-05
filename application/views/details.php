<?php echo $map['html']; ?>
<div class="col_12 column">
  <h3><?php echo $job->title;?></h3>
    <li><strong>Location: </strong><?php echo get_location_h($job->fk_city_id)->city_name;?></li>
    <li><strong>Job Type: </strong><?php echo get_color_h($job->fk_type_id)->type_name;?></li>
    <li><strong>Company Name: </strong><?php echo $job->company_name;?></li>
    <li><strong>Description: </strong><pre><p><?php echo $job->description;?></p></li></pre>
  </ul>
  <p><a href="<?php echo base_url();?>home">Back To Jobs</a></p>
</div>

<div class="clearfix"></div>
<footer>
  <p>Copyright @copy; 2016, JobFind, All Rights Reserved</p>
</footer>
</div> <!-- End Grid -->
</body>
</html>
