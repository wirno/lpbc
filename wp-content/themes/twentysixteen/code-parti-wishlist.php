<?php
if(is_user_logged_in ()){ 

$action = get_permalink();
$pid = $post->ID;
?>
<form action="<?php echo $action ?>" method="POST">
  <input type="hidden" name="wishlist" value="1">
  <input type="hidden" name="id_user" value="<?php echo get_current_user_id(); ?>">
  <input type="hidden" name="id_chateau" value="<?php echo $pid; ?>">
<label id="name_wishlist">nom de la wishlist : <input type="text" name="name_wishlist" placeholder=" wishlist name">
<input type="submit" value="Creer une nouvelle wishlist">
</form>

<?php   
$i = 1;
$wishlist_by_interest = listWishlistNameByInterest();
foreach ($wishlist_by_interest as $key => $value) {
  echo $key;
  echo $value;
  ?>
  <form action="<?php echo $action; ?>" method="POST">
  <input type="hidden" name="wishlist" value="1">
  <input type="hidden" name="id_user" value="<?php echo get_current_user_id(); ?>">
  <input type="hidden" name="id_chateau" value="<?php echo $pid; ?>">
  <input type="hidden" name = "id_wishlist" value="<?php echo $i; ?>">

<input type="hidden" name="name_wishlist" placeholder=" wishlist name" value="<?php echo $key; ?>">
<input type="submit" value="Ajouter">
</form>
<?php
$i++;
}

?>

<?php } ?>
