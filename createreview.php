<?php 
include "header.php"; 
?>
<?php

$errMsg="";
$error="";
$review_desc="";

if($username){
    // var_dump($_POST);
    $review_sitter = $_GET['sitter'];
    $sittersql = "select * from users, sitterprofiles where username = sp_username AND sp_id = '$review_sitter';";
    $result = $con->query($sittersql);
    $sitterdetail = $result->fetch_assoc();
    $sittername = $sitterdetail['username'];
    $reviewer = $_SESSION['username'];

    if(isset($_POST['submit-review-btn'])){
        $review_desc = $_POST['description'];
        $review_desc = mysqli_real_escape_string($con, $review_desc);
        $review_rate = $_POST['rate'];

        if($review_desc==""){
            $errMsg = "Please enter description.";
        } else{
            $sql = "insert into sitterreviews 
            (sr_sitterid, sr_reviewer, sr_description, sr_rate) values ({$review_sitter}, '{$reviewer}', '{$review_desc}', {$review_rate});";
            // echo $sql;
            // exit;
            $result = $con->query($sql) or die($con->error);
        }
        // echo "h"; exit;
        if($result === true){
            header("Location: sitterprofile.php?sitter=$review_sitter");
        } else{
            $error = "Error submitting.";
        }

    }
    ?>
    <h1>Review for <?php echo $sittername?></h1>
    <?php echo $error?>
    <form class="form-group form-container" action="createreview.php?sitter=<?php echo $review_sitter?>" method="post">
    <div class="row">
        <div class="col-md-12">
            <label for="review-description" id="review-description">Description <?php echo '<span class="error">'.$errMsg.'</span>';?></label>
            <textarea class="form-control" row="4" placeholder="How was your experience?" name="description"><?php echo $review_desc?></textarea>	
        </div>	
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="exampleFormControlTextarea1">Rating</label>
            <input type="radio" name="rate" id="rate-1" value="1"><label for="rate-1">1</label>
            <input type="radio" name="rate" id="rate-2" value="2"><label for="rate-2">2</label>
            <input type="radio" name="rate" id="rate-3" value="3"><label for="rate-3">3</label>
            <input type="radio" name="rate" id="rate-4" value="4"><label for="rate-4">4</label>
            <input type="radio" name="rate" id="rate-5" value="5"><label for="rate-5">5</label>
        </div>
    </div>
    <div class="form-inline text-center">
        <button type="submit" name="submit-review-btn" class="submit-review-btn">Post</button>
        <!-- <button type="submit" class="submit-cancel-btn"></button> -->
    </div>
</form>


<?php }?>