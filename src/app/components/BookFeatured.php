<button class="book-container" style="background-color: transparent;border:none"
    onclick="location.href='\detail?bid=<?=$book_id?>'">
    <img class="book-image" src="<?=$image_path?>">
</button>
<div class="book-rec-desc">
    <p class="title-text"><?=$title?></p>
    <p class="subtitle-text">By <?=$name?></p>
    <p class="desc-text">
        <?=$synopsis?>
    </p>
</div>