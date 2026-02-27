<?php namespace ProcessWire;

/** @var PriceRangesPage $page */
/** @var Pages $pages */

$priceRanges = $page->children('template=price_range, sort=title');

?>

<div id="content">
	<h2>Price Ranges</h2>
	<?php if($priceRanges->count()): ?>
	<ul>
		<?php foreach($priceRanges as $priceRange): /** @var PriceRangePage $priceRange */ ?>
		<li>
			<a href="<?php echo $priceRange->url; ?>"><?php echo $priceRange->title; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
	<p>No price ranges yet.</p>
	<?php endif; ?>
</div>
