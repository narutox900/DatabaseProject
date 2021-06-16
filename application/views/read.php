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
<title>Read <?php echo $data[0]["Book"]["title"]; ?></title>
<style>
    .reading-book-title {
        background-image: url("<?php echo LINK; ?>/image/category_banner_1.jpg");
    }
</style>
<div class="reading-page">
    <div class="reading-book-title">
        <h1><?php echo $data[0]["Book"]["title"]; ?></h1>
    </div>
    <div class="reading-section">
        <iframe src="<?php echo LINK."/".$data[0]["Book"]["bookPDF"]; ?>"></iframe>
    </div>
    <div class="comment-section">
        <h3>Comment Section</h3>
        <!-- <div class="rating-section">
            <div id="reading-book-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p id="reading-book-review">120 Reviews</p> 
        </div> -->
        <div class="comment-container">
            <?php if(isset($data[1])){
                    if($data[1] == 'NULL'){ ?>
                <div class="comment-inner-element">
                    <p class="commenter-name">There are no comment on this book. Give us your thought now. </p>
                </div>
            <?php }else{
                    for($i = 0;$i < count($data[1]);$i++){ ?>
                <div class="comment-inner-element">
                    <p class="commenter-name"><?php echo $data[1][$i]["C"]["name"]; ?></p>
                    <div class="commenter-rating">
                        <!-- Star rating section -->
                        <?php getStars($data[1][$i]["R"]["rating"]); ?>
                    </div>
                    <p class="commenter-review"><?php echo $data[1][$i]["R"]["review"]; ?></p>
                </div>
            <?php }}} ?>

            <?php
            // var_dump($_SESSION);
                if(isset($_SESSION["valid"])){ ?>
            <div class="your-comment-inner-element">
                <p class="commenter-name">Welcome <?php echo $_SESSION["username"]; ?></p>
                <?php // var_dump($_SESSION);  ?>
                    <?php if(isset($data[2]["Review"])){ ?>
                    
                    <form id="submit-review" method="POST" action="updateComment/<?php echo $data[0]["Book"]["book_id"];?>">
                        <p style="font-weight: bold;">Update Your Review</p>
                        <table>
                        <tr>
                            <td><label for="your-rate">Rating:</label></td>
                            <td><select name="your-rate" id="your-rate">
                                    <?php for($i=5;$i>0;$i--){ ?>
                                        <option value="<?php echo $i; ?>" <?php if($i == $data[2]["Review"]["rating"]){echo "selected";} ?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="your-review">Comment:</label></td>
                            <td><textarea id="your-review" name="your-review"  rows="5"><?php echo $data[2]["Review"]["review"];?></textarea></td>
                        </tr>
                    <tr>
                        <td></td>
                    <td><input type="submit" value="Submit" id="submit-review-btn"><a href="deleteComment/<?php echo $data[0]["Book"]["book_id"];?>" onclick="return confirm('Are you sure you want to delete your comment?')">Delete</a></td>
                    </tr>
                    </table>
                    <?php }else{ ?>
                    
                    <form id="submit-review" method="POST" action="createComment/<?php echo $data[0]["Book"]["book_id"];?>">
                        <p style="font-weight: bold;">Create Your Review</p>
                        <table>
                        <tr>
                            <td><label for="your-rate">Rating:</label></td>
                            <td><select name="your-rate" id="your-rate">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="your-review">Comment:</label></td>
                            <td><textarea id="your-review" name="your-review"  rows="5"></textarea></td>
                        </tr>
                    <tr>
                        <td></td>
                    <td><input type="submit" value="Submit" id="submit-review-btn"></td>
                    </tr>
                    </table>
                    <?php } ?>
                </form>
            </div>
            <?php }else{ ?>
                <div class="login-to-comment-inner-element">
                    <p><a href="<?php echo LINK."/login"; ?>">Login</a> to leave a comment!</p>
                </div>
            <?php }?>
        </div>
    </div>
</div>
