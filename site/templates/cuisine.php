<?php namespace ProcessWire;

/** @var CuisinePage $page */
/** @var Pages $pages */

$restaurants = $pages->find('template=restaurant, cuisine=' . $page->id . ', sort=title');

?>

<div id="content">
	<?php if($restaurants->count()): ?>
	<ul>
		<?php foreach($restaurants as $restaurant): /** @var RestaurantPage $restaurant */ ?>
		<li>
			<a href="<?php echo $restaurant->url; ?>"><?php echo $restaurant->title; ?></a>
			<?php if($restaurant->price_range->id): ?>
				(<?php echo $restaurant->price_range->title; ?>)
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
	<p>No restaurants found for this cuisine.</p>
	<?php endif; ?>
</div>
