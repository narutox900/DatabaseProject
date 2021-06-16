
	</div>
</div>

<script>
        window.onload = function(){
			var data = <?php echo json_encode($_POST) ?>;
			var searchSuggest = "";
			if(data.search!==undefined)
			searchSuggest = data.search
			getAllFilter(searchSuggest);
		}

	function filterAjax() {
		// alert(JSON.stringify(filter, null, 2));
		var xmlhttp1 = new XMLHttpRequest();
		var link = ""
		link += "category"
		for (i = 0; i < filter["category"].length; i++)
			link += "/" + filter["category"][i]
		link += "/publisher"
		for (i = 0; i < filter["publisher"].length; i++)
			link += "/" + filter["publisher"][i]
		link += "/author"
		for (i = 0; i < filter["author"].length; i++)
			link += "/" + filter["author"][i]
		link += "/rating"
		link += "/" + filter["rating"].toString();
		link += "/order"
		link += "/" + filter["sort_filter"];
		// link = link.split(" ").join("phamnhatlinh")
		link += "/suggestion"
		link += "/" + filter["search_suggest"];
		link = link.split("/").join("phamnhatlinh")
		link = link.split(" ").join("leanhtuan")
		link = encodeURI(link);
		// alert("<?php echo LINK; ?>"+"/ajax/ajaxBookFilter/" + link)
		xmlhttp1.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				str = this.responseText
				res = str.substring(
					str.lastIndexOf('ajax-filter-result-start') + 24,
					str.lastIndexOf("ajax-filter-result-end")
				);
				document.getElementsByClassName("category-card-div-inner")[0].innerHTML = res;
			};
		}
		xmlhttp1.open("GET", "<?php echo LINK; ?>"+"/ajax/ajaxBookFilter/" + link, true);
		xmlhttp1.send();
	}
</script>