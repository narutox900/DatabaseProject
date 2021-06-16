<div class="category-card-div-outer">
    <div class="category-card-div" data-interval="1000">
        <div class="category-card-div-inner">

            <?php
            if (isset($data)) {
                foreach ($data as $bookData) {
                    foreach ($bookData as $value) {  ?>
                        <!-- MOVIE ITEM -->
                    <div class="card">
                    <a href="#" class="movie-item">
                        <img src="<?php echo LINK; ?>/image/movies/transformer.jpg" alt="">
                        <div class="movie-item-content">
                            <div class="movie-item-title">
                                Transformer
                            </div>
                            <div class="movie-infos">
                                <div class="movie-info">
                                    <i class="bx bxs-star"></i>
                                    <span>9.5</span>
                                </div>
                                <div class="movie-info">
                                    <i class="bx bxs-time"></i>
                                    <span>120 mins</span>
                                </div>
                                <div class="movie-info">
                                    <span>HD</span>
                                </div>
                                <div class="movie-info">
                                    <span>16+</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!-- END MOVIE ITEM -->
            <?php
                    }
                }
            }
            ?>

            
        </div>
    </div>
</div>