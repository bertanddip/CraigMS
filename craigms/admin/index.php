<?php include 'includes/header.php'; ?>


<?php 
if ($_SESSION["usertype"] == 1){
?>

<div class="col50">
<h1>Welcome Admin.</h1>
</div>
	
<?php 
} 
else {
?>

<div class="colFull">
<h1>Hi <?php echo $_SESSION["myusername"] ?>!</h1>
<p>Please select an item from the left menu to edit.</p>
</div>

<?php } ?>




<?php include 'includes/footer.php'; ?>