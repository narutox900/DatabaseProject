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

        <form action="searchQuery" method="POST">

            <div class="category__product__filter__by__category">
                <h3>Title</h3>
                <label>
                    <label for=""></label>
                    <input type="text" name="filter-name" id="filter-name">
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
                            <td><input type="number" name="filter-min-year" id="filter-min-year"></td>
                        </tr>

                        <tr>
                            <td>
                                <p>To:</p>
                            </td>
                            <td><input type="number" name="filter-max-year" id="filter-max-year"></td>
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
                            <td><input type="number" name="filter-min-year" id="filter-min-year" min="0" max="10" value="0"></td>
                        </tr>

                        <tr>
                            <td>
                                <p>To:</p>
                            </td>
                            <td><input type="number" name="filter-max-year" id="filter-max-year" min="0" max="10" value="10"></td>
                        </tr>
                    </table>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Genres</h3>
                <label class="filter__by__category__container">
                    <p>All</p>
                    <input type="checkbox" checked="check" id="all_category_checkbox">
                    <span class="filter__by__category__checkmark"></span>
                </label>

                <label class="filter__by__category__container">
                    <p style="display: none;">12</p>
                    <p>Category 1</p>
                    <input type="checkbox" class="category_checkbox">
                    <span class="filter__by__category__checkmark"></span>
                </label>
                <label class="filter__by__category__container">
                    <p style="display: none;">12</p>
                    <p>Category 2</p>
                    <input type="checkbox" class="category_checkbox">
                    <span class="filter__by__category__checkmark"></span>
                </label>
                <label class="filter__by__category__container">
                    <p style="display: none;">12</p>
                    <p>Category 3</p>
                    <input type="checkbox" class="category_checkbox">
                    <span class="filter__by__category__checkmark"></span>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Adult Movie(18+ tag)</h3>
                <label class="filter__by__category__container">
                    <input type="checkbox" checked="check" id="all_category_checkbox">
                    <span class="filter__by__category__checkmark"></span>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Language</h3>
                <select name="" id="" multiple style="padding-left: 10px;padding-right:80px;">
                    <option value="">English</option>
                    <option value="">Vietnamese</option>
                    <option value="">English</option>
                    <option value="">English</option>
                    <option value="">English</option>
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
                    <input type="text" name="filter-actor" id="filter-actor">
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
                            <td><input type="number" name="filter-min-year" id="filter-min-year" min="0" max="300" value="0"></td>
                        </tr>

                        <tr>
                            <td>
                                <p>To:</p>
                            </td>
                            <td><input type="number" name="filter-max-year" id="filter-max-year" min="0" max="300" value="300"></td>
                        </tr>
                    </table>
                </label>
            </div>

            <div class="category__product__filter__by__category">
                <h3>Display Options</h3>
                <div class="category__dropdown__div" tabindex="0">
                    <p>Display:</p>
                    <select name="browse_dropdown" class="category_dropdown" id="order_filter" onchange="getOrderFilter()">
                        <option value="50">50 movies</option>
                        <option value="100">100 movies</option>
                        <option value="150">150 movies</option>
                    </select>
                    <p>Sorted By:</p>
                    <select name="browse_dropdown" class="category_dropdown" id="order_filter" onchange="getOrderFilter()">
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

    </div>
</div