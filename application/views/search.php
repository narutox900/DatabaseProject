<style>
    .category__banner {
        background-image: url("<?php echo LINK; ?>/image/slider_1.jpg");
    }
</style>
<title>Movies Filter</title>
<div class="category__banner">
    <h1>Movies Filter</h1>
</div>

<div class="category__product">
    <div class="category__product__filter">

        <form action="search" method="POST">
            <input type="hidden" name="search" value="1">
            <div class="category__product__filter__by__category">
                <h3>Title</h3>
                <label>
                    <label></label>
                    <input type="text" name="filter-title" id="filter-title">
                    <p style="font-style: italic;font-size:13px;">e.g. The Godfather</p>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Release Year</h3>
                <label>
                    <table>
                        <tr>
                            <td>
                                <p>From:</p>
                            </td>
                            <td><input type="number" name="filter-min-year" id="filter-min-year" value="0"></td>
                        </tr>

                        <tr>
                            <td>
                                <p>To:</p>
                            </td>
                            <td><input type="number" name="filter-max-year" id="filter-max-year" value="0"></td>
                        </tr>
                    </table>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Rating score</h3>
                <label>
                    <table>
                        <tr>
                            <td>
                                <p>From:</p>
                            </td>
                            <td><input type="number" name="filter-min-rating" id="filter-min-rating" min="0" max="10" value="0"></td>
                        </tr>

                        <tr>
                            <td>
                                <p>To:</p>
                            </td>
                            <td><input type="number" name="filter-max-rating" id="filter-max-rating" min="0" max="10" value="10"></td>
                        </tr>
                    </table>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Genres</h3>
                <select name="filter-genre[]" id="filter-genre" multiple style="width:160px;">
                    <?php
                    foreach ($data[2] as $value) {
                        echo "<option value='" . $value['Genre']['genre_id'] . "'>" . $value['Genre']['genre_name'] . "</option>";
                    };
                    ?>
                </select>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Include Adult Movie(18+ tag)</h3>
                <label class="filter__by__category__container">
                    <input type="checkbox" id="filter-isadult" name="filter-isadult" value="1" <?php if($data[3][0][""]["age"] < 18){echo "disabled";}; ?>>
                    <span class="filter__by__category__checkmark"></span>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Language</h3>
                <select name="filter-language[]" id="filter-language" multiple style="width:160px;">
                    <?php
                    foreach ($data[1] as $value) {
                        echo "<option value='" . $value['Movie']['language'] . "'>" . $value['Movie']['language'] . "</option>";
                    };
                    ?>
                </select>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Plot</h3>
                <label>
                    <label for=""></label>
                    <input type="text" name="filter-plot" id="filter-plot">
                    <p style="font-style: italic;font-size:13px;">Search for words that might appear in the description. </p>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Actors</h3>
                <label>
                    <label for=""></label>
                    <input type="text" name="filter-actor" id="filter-actor">
                    <p style="font-style: italic;font-size:13px;">e.g. Elizabeth Olsen</p>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Directors</h3>
                <label>
                    <label for=""></label>
                    <input type="text" name="filter-director" id="filter-director">
                    <p style="font-style: italic;font-size:13px;">e.g. George Lucas</p>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Runtime</h3>
                <label>
                    <table>
                        <tr>
                            <td>
                                <p>From:</p>
                            </td>
                            <td><input type="number" name="filter-min-length" id="filter-min-length" min="0" value="0"></td>
                        </tr>

                        <tr>
                            <td>
                                <p>To:</p>
                            </td>
                            <td><input type="number" name="filter-max-length" id="filter-max-length" min="0" value="500"></td>
                        </tr>
                    </table>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Display Options</h3>
                <div class="category__dropdown__div" tabindex="0">
                    <p>Display:</p>
                    <select name="filter-display" class="category_dropdown" id="filter-display">
                        <option value="50">50 movies</option>
                        <option value="100">100 movies</option>
                        <option value="150">150 movies</option>
                    </select>
                    <p>Sorted By:</p>
                    <select name="filter-sort" class="category_dropdown" id="filter-sort">
                        <option value="popular-asc">Popularity Ascending</option>
                        <option value="popular-des">Popularity Descending</option>
                        <option value="title-asc">A-Z Title Ascending</option>
                        <option value="title-des">A-Z Title Descending</option>
                        <option value="year-asc">Year Ascending</option>
                        <option value="year-des">Year Descending</option>
                        <option value="runtime-asc">Runtime Ascending</option>
                        <option value="runtime-des">Runtime Descending</option>
                    </select>
                </div>
            </div>

            <div class="category__product__filter__by__category">
                <button type="submit" class="detail-button" style="margin-top: 0px !important;margin-bottom: 20px;">Search</button>
            </div>

        </form>
    </div>

    <div class="category__product__cards">
        <div class="category-card-div-outer">
            <div class="category-card-div" data-interval="1000">
                <div class="category-card-div-inner">

                    <?php
                    if (isset($data)) {
                        foreach ($data[0] as $value) {  ?>
                                <!-- MOVIE ITEM -->
                                <div class="card">
                                    <a href="<?php echo LINK."/detail/".$value["Movie"]["movie_id"]; ?>" class="movie-item">
                                        <img style="width:100%;height:100%;" src="<?php echo POSTER_URL.$value["Movie"]["poster"]; ?>" onerror="this.onerror=null;this.src='<?php echo LINK.'/image/tmp.jpg'; ?>';"/>
                                        <div class="movie-item-content">
                                            <div class="movie-item-title" style="font-size:16px;">
                                                <?php echo $value["Movie"]["title"]; ?>
                                            </div>
                                            <div class="movie-infos">
                                                <div class="movie-info">
                                                    <i class="bx bxs-star"></i>
                                                    <span><?php echo $value["Movie"]["rating"]; ?></span>
                                                </div>
                                                <div class="movie-info">
                                                    <i class="bx bxs-time"></i>
                                                    <span><?php echo $value["Movie"]["length"]; ?> mins</span>
                                                </div>
                                                <div class="movie-info">
                                                    <span>HD</span>
                                                </div>
                                                <div class="movie-info">
                                                    <span><?php if($value["Movie"]["isAdult"] == 1){echo "18+";}else{echo "All";} ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- END MOVIE ITEM -->
                    <?php
                            
                        }
                    }
                    ?>


                </div>
            </div>
        </div>

    </div>
</div