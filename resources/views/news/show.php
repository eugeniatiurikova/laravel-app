<h1>News text</h1>

<div>
    <h2><?=$news['title']?></h2>
    <p><?=$news['author']?> - <?=$news['created_at']->format('d-m-Y H:i')?> <i>(<?=$news['category']?></i>)</p>
    <p><?=$news['description']?></p>
    <a href="/news">back</a>
</div>
