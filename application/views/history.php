<div style="padding:20px;">
    <title>User Dashboard: View History</title>
    <h1>User View History</h1>
    <?php if(count($data) != 0){ ?>
    <?php foreach ($data as $value) { ?>
        <div class="book_detail_section_1">
            <div class="window__slider__img-container">
                <img style="width:400px;height:600px;" src="<?php echo POSTER_URL . $value["Movie"]["poster"]; ?>" onerror="this.onerror=null;this.src='<?php echo LINK . '/image/tmp.jpg'; ?>';" />
                <div class="window__right">
                    <h1><?php echo $value["Movie"]["title"]; ?></h1>
                    <p>Language: <?php echo $value["Movie"]["language"]; ?></p>
                    <p>Year: <?php echo $value["Movie"]["year"]; ?></p>
                    <p>Rating: <?php echo $value["Movie"]["rating"]; ?></p>
                    <p>Runtime: <?php echo $value["Movie"]["length"]; ?> minutes</p>
                    <p>Age: <?php if ($value["Movie"]["isAdult"]) {
                                echo "Adult";
                            } else {
                                echo "Every age";
                            } ?></p>
                    <p>Watch time: <?php echo $value["Watch_history"]["watch_time"]; ?></p>
                    <a href="<?php echo LINK . "/favourite/" . $value["Movie"]["movie_id"]; ?>"><button class="detail-button">Add To Favourite</button></a>
                </div>
            </div>
        </div>
    <?php }}else{ ?>
        <h3>You haven't watched any movie yet!</h3>
    <?php } ?>


</div>