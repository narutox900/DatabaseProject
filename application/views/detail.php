<title><?php echo $data[0]["Movie"]["title"]; ?></title>
<div class="book_detail_section">
    <div class="book_detail_section_1">
        <div class="window__slider__img-container">
            <img style="width:400px;height:600px;" src="<?php echo POSTER_URL.$data[0]["Movie"]["poster"]; ?>" onerror="this.onerror=null;this.src='<?php echo LINK.'/image/tmp.jpg'; ?>';"/>
            <div class="window__right">
                <h1><?php echo $data[0]["Movie"]["title"]; ?></h1>
                <p>Language: <?php echo $data[0]["Movie"]["language"]; ?></p>
                <p>Year: <?php echo $data[0]["Movie"]["year"]; ?></p>
                <p>Rating: <?php echo $data[0]["Movie"]["rating"]; ?></p>
                <p>Runtime: <?php echo $data[0]["Movie"]["length"]; ?> minutes</p>
                <p>Age: <?php if($data[0]["Movie"]["isAdult"]){echo "Adult";}else{echo "Every age";} ?></p>
                <a href="<?php echo LINK."/read/".$data[0]["Movie"]["movie_id"]; ?>"><button class="detail-button">Watch Movie</button></a>
            </div>
        </div>
    </div>
    <div class="book_detail_section_2">
        <div class="book_detail_section_2_nav">
            <input type="button" value="Description" id="book_detail_description_button" class="book_detail_button_section2 book_detail_description_button_chose" onclick='book_detail_section_2("description")'>
            <input type="button" value="Author/Publisher" id="book_detail_author_button" class="book_detail_button_section2" onclick='book_detail_section_2("author")'>
            <input type="button" value="Rating" id="book_detail_review_button" class="book_detail_button_section2" onclick='book_detail_section_2("review")'>
        </div>
        <div class="book_detail_section_2_text_section">
            <div id="book_detail_2_description" class="book_detail_section_2_item book_detail_section_2_item_show">
                <p><?php echo $data[0]["Movie"]["description"]; ?></p>
            </div>
            <div id="book_detail_2_author" class="book_detail_section_2_item">
                <!-- Get director and author info -->
            </div>
            <div id="book_detail_2_review" class="book_detail_section_2_item">
                <div class="card-rating">
                    <?php
                        echo $data[0]["Movie"]["rating"];
                    ?>
                </div>
                
            </div>
        </div>

    </div>
</div>