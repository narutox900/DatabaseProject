<title><?php echo $data[0][0]["Movie"]["title"]; ?></title>
<div class="book_detail_section">
    <div class="book_detail_section_1">
        <div class="window__slider__img-container">
            <img style="width:400px;height:600px;" src="<?php echo POSTER_URL . $data[0][0]["Movie"]["poster"]; ?>" onerror="this.onerror=null;this.src='<?php echo LINK . '/image/tmp.jpg'; ?>';" />
            <div class="window__right">
                <h1><?php echo $data[0][0]["Movie"]["title"]; ?></h1>
                <p>Language: <?php echo $data[0][0]["Movie"]["language"]; ?></p>
                <p>Year: <?php echo $data[0][0]["Movie"]["year"]; ?></p>
                <p>Rating: <?php echo $data[0][0]["Movie"]["rating"]; ?></p>
                <p>Runtime: <?php echo $data[0][0]["Movie"]["length"]; ?> minutes</p>
                <p>Age: <?php if ($data[0][0]["Movie"]["isAdult"]) {
                            echo "Adult";
                        } else {
                            echo "Every age";
                        } ?></p>
                <a href="<?php echo LINK . "/watch/" . $data[0][0]["Movie"]["movie_id"]; ?>"><button class="detail-button">Watch Movie</button></a>
                <a href="<?php echo LINK . "/favourite/" . $data[0][0]["Movie"]["movie_id"]; ?>"><button class="detail-button">Add To Favourite</button></a>
            </div>
        </div>
    </div>
    <div class="book_detail_section_2">
        <div class="book_detail_section_2_nav">
            <input type="button" value="Description" id="book_detail_description_button" class="book_detail_button_section2 book_detail_description_button_chose" onclick='book_detail_section_2("description")'>
            <input type="button" value="Actor/Director" id="book_detail_author_button" class="book_detail_button_section2" onclick='book_detail_section_2("author")'>
            <input type="button" value="Genre" id="book_detail_review_button" class="book_detail_button_section2" onclick='book_detail_section_2("review")'>
        </div>
        <div class="book_detail_section_2_text_section">
            <div id="book_detail_2_description" class="book_detail_section_2_item book_detail_section_2_item_show">
                <p><?php echo $data[0][0]["Movie"]["description"]; ?></p>
            </div>
            <div id="book_detail_2_author" class="book_detail_section_2_item">
                <!-- Get director and actor info -->
                <p>Actor:</p>
                <ul>
                    <?php
                    if (count($data[1]) == 0) {
                        echo "There is no actor on this movie";
                    } else {
                        foreach ($data[1] as $value) {
                            echo "<li>" . $value["Actor"]["actor_name"] . "</li>";
                        }
                    }
                    ?>
                </ul><br>

                <p>Director:</p>
                <ul>
                    <?php
                    if (count($data[2]) == 0) {
                        echo "There is no director on this movie";
                    } else {
                        foreach ($data[2] as $value) {
                            echo "<li>" . $value["Director"]["director_name"] . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div id="book_detail_2_review" class="book_detail_section_2_item">
                <div class="card-rating">
                    <p>Director:</p>
                    <ul>
                        <?php
                        if (count($data[3]) == 0) {
                            echo "There is no director on this movie";
                        } else {
                            foreach ($data[3] as $value) {
                                echo "<li>" . $value["Genre"]["genre_name"] . "</li>";
                            }
                        }
                        ?>
                </div>

            </div>
        </div>

    </div>
</div>