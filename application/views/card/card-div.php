<div class="carousel-row">
    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
        <div class="MultiCarousel-inner">
            <?php
                if(isset($data)){
                    foreach($data as $bookData){
                        foreach($bookData as $value){  ?>
                            <div class="card-item" id="card-item-1">
                                <div class="pad15">
                                    <div class="card card-div-item" onclick='location.href="<?php echo LINK."/detail/".$value["book_id"] ?>";'>
                                        <div class="card-img">
                                            <a href="<?php echo LINK."/detail/".$value["book_id"] ?>">
                                                <img src="<?php echo LINK."/".$value["thumbnail_address"]; ?>" alt="Card example">
                                            </a>
                                        </div>
                    
                                        <div class="card-caption">
                                            <h3>
                                                <a href="<?php echo LINK."/detail/".$value["book_id"] ?>"><?php echo $value["title"]; ?></a>
                                            </h3>
                                            <p><?php echo $value["author"]; ?></p>
                                            <div class="card-review-div">
                                                <div class="card-review"> 
                                                    <div class="card-rating">                   <!-- Star rating section -->
                                                        <?php getStars($value["rating"]); ?>
                                                    </div>
                    
                                                    <p><span><?php echo $value["number_of_review"]; ?></span> Reviews</p>             <!-- Number of reviews -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                }
            ?>
        </div>
    </div>
</div>