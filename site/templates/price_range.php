<?php namespace ProcessWire;

/** @var PriceRangePage $page */
/** @var Pages $pages */

$restaurants = $pages->find('template=restaurant, price_range=' . $page->id . ', sort=title');

?>

<div id="content">
	<?php if($restaurants->count()): ?>
	<ul>
		<?php foreach($restaurants as $restaurant): /** @var RestaurantPage $restaurant */ ?>
		<li>
			<a href="<?php echo $restaurant->url; ?>"><?php echo $restaurant->title; ?></a>
			<?php if($restaurant->cuisine->id): ?>
				&mdash; <?php echo $restaurant->cuisine->title; ?>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
	<p>No restaurants found for this price range.</p>
	<?php endif; ?>
</div>
