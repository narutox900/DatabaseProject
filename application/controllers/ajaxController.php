<?php

/**
 * 
 */
class ajaxController extends Controller
{   

    public function __construct()
    {
        $this->userModel = $this->model('Book');
    }
    
    public function ajaxBookByName($param)
    {
        $param = preg_replace('/[^A-Za-z0-9:,\s]/', ' ', $param);
		$param = trim($param);
        echo 'ajax-result-start';
        $result = $this->userModel->getBookName($param);
        if ($result == NULL) echo "";
        else {
            for ($i = 0; $i < count($result); $i++)
                echo '<li><a href="' . LINK . "/detail/" . $result[$i]["Book"]["book_id"] . '">' . $result[$i]["Book"]["title"] . "</a></li>";
        }
        echo 'ajax-result-end';
    }
    public function ajaxBookFilter($param)
    {
        function printStart($num,$flag){
            $empty = 0;
            for($i = 0;$i < $num - $flag;$i++){
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
            }else{
                echo "Error value";
            }
        }
        $param = str_replace("phamnhatlinh", "/", $param);
        $param = str_replace("leanhtuan", " ", $param);
        $split = explode("/", $param);
        $filter1 = array(
            "category" => array(),      // (1,2,3) of ("1", "2", "3") --> see line 48
            "publisher" => array(),     // ("NXB a", "NXB b")
            "author" => array(),        // ("linh", "tuan", "dat")
            "rating" => 0,              // 0.0, 1.0, 2.0, 3.0, 4.0, 5.0
            "order" => "old",    // "old", "new", "name"
            "suggestion" => ""
        );
        $a = "";
        for ($i = 0; $i < count($split); $i++) {
            if ($split[$i] == "category") {
                $a = "category";
            } elseif ($split[$i] == "publisher") {
                $a = "publisher";
            } elseif ($split[$i] == "author") {
                $a = "author";
            } elseif ($split[$i] == "rating") {
                $a = "rating";
            } elseif ($split[$i] == "order") {
                $a = "order";
            }elseif ($split[$i] == "suggestion") {
                $a = "suggestion";
            } else {
                if ($a == "publisher" || $a == "author") {
                    array_push($filter1[$a], $split[$i]);
                } elseif ($a == "category") {
                    array_push($filter1[$a], intval($split[$i]));   // change the type of category array here: string, int...
                } elseif ($a == "order" || $a == "suggestion") {
                    $filter1[$a] = $split[$i];
                } else {
                    $filter1[$a] = floatval($split[$i]);            // change the type of rating to double
                }
            }
        }
        echo 'ajax-filter-result-start';
        $book = $this->userModel->getBookByFilter($filter1);
        if (isset($book)) {
            foreach ($book as $bookData) {
                foreach ($bookData as $value) {
                    echo '<div class="card-item" id="card-item-0">';
                    echo    '<div class="pad15">';
                    echo        '<div class="card card-div-item" ';
                    echo        "onclick='location.href=" . '"';
                    echo LINK . "/detail/" . $value["book_id"];
                    echo '"' . ";'>";
                    echo '<div class="card-img"><a href="';
                    echo LINK . "/detail/" . $value["book_id"];
                    echo '">';
                    echo '<img src="';
                    echo LINK . "/" . $value["thumbnail_address"];
                    echo '" alt="Card example"> </a> </div>';



                    echo ' <div class="card-caption"><h3>';

                    echo '<a href="';
                    echo LINK . "/detail/" . $value["book_id"];
                    echo ' ">';
                    echo $value["title"];
                    echo '</a></h3><p>';

                    echo $value["author"];

                    echo '</p><div class="card-review-div"><div class="card-review"> ';

                    echo '<div class="card-rating">                   <!-- Star rating section -->';
                    getStars($value["rating"]);
                    echo '</div><p><span>';
                    echo $value["number_of_review"];
                    echo '</span> Reviews</p>             <!-- Number of reviews -->';
                    echo ' </div></div>  </div>  </div></div></div>';
                }
            }
        }
        // var_dump($filter1);
        echo "ajax-filter-result-end";
    }
}
