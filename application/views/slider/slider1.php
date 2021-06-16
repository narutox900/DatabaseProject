<div class="window">
  <div class="window__slider">
    <div class="window__slider__img-container window__slider__img-container--opacity">
      <img src="<?php echo LINK."/".$data[0]["Book"]["thumbnail_address"]; ?>" style="float: left; top: 20%; padding-left: 70px; padding-right: 70px;"  />
      <div class="window__right"  style="float: left;">
        <h1><?php echo $data[0]["Book"]["title"]; ?></h1>
        <p>By <?php echo $data[0]["Book"]["author"]; ?></p>
        <button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[0]['Book']['book_id'] ?>';">View Details</button>
      </div>
    </div>
    <div class="window__slider__img-container">
      <img src="<?php echo LINK."/".$data[1]["Book"]["thumbnail_address"]; ?>" style="float: left; top: 20%; padding-left: 70px; padding-right: 70px;"  />
      <div class="window__right"  style="float: left;">
        <h1><?php echo $data[1]["Book"]["title"]; ?></h1>
        <p>By <?php echo $data[1]["Book"]["author"]; ?></p>
        <button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[1]['Book']['book_id'] ?>';">View Details</button>
      </div>
    </div>
    <div class="window__slider__img-container">
      <img src="<?php echo LINK."/".$data[2]["Book"]["thumbnail_address"]; ?>" style="float: left; top: 20%; padding-left: 70px; padding-right: 70px;"  />
      <div class="window__right"  style="float: left;">
        <h1><?php echo $data[2]["Book"]["title"]; ?></h1>
        <p>By <?php echo $data[2]["Book"]["author"]; ?></p>
        <button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[2]['Book']['book_id'] ?>';">View Details</button>
      </div>
    </div>
    <div class="window__slider__img-container">
      <img src="<?php echo LINK."/".$data[3]["Book"]["thumbnail_address"]; ?>" style="float: left; top: 20%; padding-left: 70px; padding-right: 70px;"  />
      <div class="window__right"  style="float: left;">
        <h1><?php echo $data[3]["Book"]["title"]; ?></h1>
        <p>By <?php echo $data[3]["Book"]["author"]; ?></p>
        <button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[3]['Book']['book_id'] ?>';">View Details</button>
      </div>
    </div>
    <div class="window__slider__img-container">
      <img src="<?php echo LINK."/".$data[4]["Book"]["thumbnail_address"]; ?>" style="float: left; top: 20%; padding-left: 70px; padding-right: 70px;"  />
      <div class="window__right"  style="float: left;">
        <h1><?php echo $data[4]["Book"]["title"]; ?></h1>
        <p>By <?php echo $data[4]["Book"]["author"]; ?></p>
        <button onclick="window.location.href='<?php echo LINK.'/detail/'.$data[4]['Book']['book_id'] ?>';">View Details</button>
      </div>
    </div>
  </div>
  <button class="window__slide-left">
    <i class="fa fa-chevron-left"></i>
  </button>
  <button class="window__slide-right">
    <i class="fa fa-chevron-right"></i>
  </button>
  <div class="window__current-img">
    <button class="window__current-img__btn window__current-img__btn--current"></button>
    <button class="window__current-img__btn"></button>
    <button class="window__current-img__btn"></button>
    <button class="window__current-img__btn"></button>
    <button class="window__current-img__btn"></button>
  </div>
</div>