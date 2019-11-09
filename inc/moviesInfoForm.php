<div class="">
    <label for="" id="1902_yearInput">Year Released</label>
    <input id="1902_yearInput" type="number" min="0" max="9999" name="1902_year" value="<?php echo get_post_meta(get_the_ID(), '1902_year', true); ?>">
</div>

<?php
$vampireChecked = '';
$excopsChecked = '';
$copsChecked = '';

if ((get_post_meta( get_the_id(), '1902_genre', true)) === 'Vampire Mockumentary') {
    $vampireChecked = 'checked';
} else if ((get_post_meta( get_the_id(), '1902_genre', true)) === 'Ex-Cops'){
    $excopsChecked = 'checked';
} else if ((get_post_meta( get_the_id(), '1902_genre', true)) === 'Cops') {
    $copsChecked = 'checked';
}
 ?>

<div class="">
    <label for="" id="1902_genreInput">Genre</label>
    <div class="radio">
        <label><input type="radio" name="1902_genre" value="Vampire Mockumentary" <?php echo $vampireChecked ?>>Vampire Mockumentary</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="1902_genre" value="Ex-Cops" <?php echo $excopsChecked ?>>Ex-Cops</label>
    </div>
    <div class="radio disabled">
        <label><input type="radio" name="1902_genre" value="Cops" <?php echo $copsChecked ?>>Cops</label>
    </div>
</div>
