<?php echo $map['html']; ?>
<div id="search_area" class="col_12 column">
  <form class="horizontal" name="forma" method="POST" action="jobs">
    <input id="keywords" name="searchterms" type="text" placeholder="Enter Keywords..."/>
    <select id="state_select" name="city">
      <option value="default">Select City</option>
      <?php foreach(get_provinces_h() as $province) :?>
        <optgroup label="<?php echo $province->name;?>">
          <?php foreach(get_cities_h($province->id) as $city) :?>
            <option value="<?php echo $city->id;?>"><?php echo $city->city_name;?></option>
          <?php endforeach;?>
        </optgroup>
      <?php endforeach;?>
    </select>
    <select id="category_select" name="category">
      <option value="default">Select Category</option>
      <?php foreach(get_categories_h() as $category) :?>
      <option value="<?php echo $category->id;?>"><?php echo $category->category_name;?></option>
      <?php endforeach;?>
    </select>
    <input type="submit" name="name" value="Submit">
  </form>
</div>

<div id="category_block" class="col_12 column">
  <h3>Browse Jobs</h3>
</div>

<div class="col_12 column">
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
