<h1>News categories</h1>

<?php foreach ($newsList as $key => $news): ?>
<div class="news_block">
    <h2><a href="<?=route('news.category',['catId' => $key])?>"><?=$news['title']?></a></h2>
    <p><?=$news['description']?> (<?=$news['created_at']->format('d-m-Y H:i')?>)</p>
</div>
<?php endforeach; ?>
