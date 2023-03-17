<h1>All news in category</h1>

<?php foreach ($newsList as $key => $news): ?>
    <div class="news_block">
        <h2><a href="<?=route('news.show',['catId' => 1, 'id' => $key])?>"><?=$news['title']?></a></h2>
        <p><?=$news['author']?> - <?=$news['created_at']->format('d-m-Y H:i')?> <i>(<?=$news['category']?></i>)</p>
        <p><?=$news['description']?></p>
    </div>
<?php endforeach; ?>
