<?php
    function printStart($num,$flag){
        $empty = 0;
        for($i = 0;$i < $num-$flag;$i++){
            echo "<i class='fas fa-star'></i>";
        }
        if($flag == 1){
            echo "<i class='fas fa-star-half-alt'></i>";
        }
        for($empty = 0;$empty < 5 - $num - $flag ;$empty++){
            echo "<i class='far fa-star'></i>";
        }
    }

    function getStars($rating){
        $num = 0;
        if($rating >= 0 && $rating < 0.5){
            printStart($rating,0);
        }else if($rating >= 0.5 && $rating < 1){
            printStart($rating,1);
        }else if($rating >= 1 && $rating < 1.5){
            printStart($rating,0);
        }else if($rating >= 1.5 && $rating < 2){
            printStart($rating,1);
        }else if($rating >= 2 && $rating < 2.5){
            printStart($rating,0);
        }else if($rating >= 2.5 && $rating < 3){
            printStart($rating,1);
        }else if($rating >= 3 && $rating < 3.5){
            printStart($rating,0);
        }else if($rating >= 3.5 && $rating < 4){
            printStart($rating,1);
        }else if($rating >= 4 && $rating < 4.5){
            printStart($rating,0);
        }else if($rating >= 4.5 && $rating < 5){
            printStart($rating,1);
        }else if($rating == 5){
            printStart($rating, 0);
        }else{
            echo "Error value";
        }
    }
?>
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

        <button type="button" class="card-slick-prev card-slick-arrow leftLst" style="display: block;">
            <i class="fas fa-chevron-left"></i>
        </button>

        <button type="button" class="card-slick-next card-slick-arrow rightLst" style="display: block;">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>