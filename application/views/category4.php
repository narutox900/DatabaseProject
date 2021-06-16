</div>

		<div class="category__product__filter__by__rating">
			<label class="filter__by__rating__container">
				<input type="button" id="filter__by__rating__button" value="Filter by Rating" onclick="filter__by__rating__choice()">
				<span><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></span>
			</label>
			<div id= "filter__by__rating__choice__div" class="filter__by__rating__choice filter__by__rating__choice__unshown">
					<input type="button" id="filter__by__rating__choice__button" value="5 Star Rating" onclick='filter__by__rating__choice__button("5 Star Rating")'>
					<input type="button" id="filter__by__rating__choice__button" value="4 Star Rating" onclick='filter__by__rating__choice__button("4 Star Rating")'>
					<input type="button" id="filter__by__rating__choice__button" value="3 Star Rating" onclick='filter__by__rating__choice__button("3 Star Rating")'>
					<input type="button" id="filter__by__rating__choice__button" value="2 Star Rating" onclick='filter__by__rating__choice__button("2 Star Rating")'>
					<input type="button" id="filter__by__rating__choice__button" value="1 Star Rating" onclick='filter__by__rating__choice__button("1 Star Rating")'>
					<input type="button" id="filter__by__rating__choice__button" value="Filter by Rating" onclick='filter__by__rating__choice__button("Filter by Rating")'>
			</div>
		</div>
	</div>
	<div class="category__product__cards">
		<div class="category__dropdown__div" tabindex="0">
			<select name="browse_dropdown" class="category_dropdown" id="order_filter" onchange="getOrderFilter()">
				<!-- <option value="Popularity">Browse by popularity</option> -->
				<option value="Old">Old</option>
				<option value="New">New</option>
				<option value="Name">Name</option>
			</select>
		</div>