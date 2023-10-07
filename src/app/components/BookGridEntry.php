<button class="book-grid-mem" name="clickable gridmember with image and brief description" onclick="location.href='/detail?bid=<?=$book_id?>'">
    <img class="book-image" src="<?=$image_path?>">
    <p class="book-grid-mem-t"><?=$title?></p>
    <p class="book-grid-mem-auth">By <?=$name?></p>
    <p class="book-grid-mem-auth"><?=$genre?></p>
    <p class="book-grid-mem-auth"><?=$release_date?></p>
    <?php if(isset($rating_avg)) echo '<p class="book-grid-mem-auth">Rating: ' . number_format($rating_avg, 2) . ' / 5</p>';?>
    <?php if($graphic_cntn) echo '<p class="book-grid-mem-auth">Graphic Content</p>';?>
</button>