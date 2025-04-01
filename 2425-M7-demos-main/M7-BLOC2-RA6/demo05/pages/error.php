<style>
.four_zero_four_bg {
    background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 400px;
    background-position: center;
}

.four_zero_four_bg h1 {
    font-size: 80px;
}

.four_zero_four_bg h3 {
    font-size: 80px;
}

.link_404 {
    color: #fff !important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;
}

.contant_box_404 {
    margin-top: -50px;
}
</style>


<?php
include("../includes/db_connect.php");
include("../includes/header.php");

$error = $_GET['error'];

?>

<section class="container mt-4">
    <div class="col-sm-12 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">ERROR</h1>
		</div>
		
		<div class="contant_box_404">
            <h3 class="h2">
                Look like you're lost
            </h3>
            
            <h1>
                ERROR: <?= $error; ?>
            </h1>
            
        </div>
	</div>
</section>

<?php
include("../includes/footer.php");
?>
