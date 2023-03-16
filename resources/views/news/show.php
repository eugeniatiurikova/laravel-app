<div>
    <h2><?=$news['title']?></h2>
    <p><?=$news['author']?> - <?=$news['created_at']->format('d-m-Y H:i')?></p>
    <p><?=$news['description']?></p>
    <a href="/news">back</a>
</div>
