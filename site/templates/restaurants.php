<?php namespace ProcessWire;

/** @var RestaurantsPage $page */
/** @var Pages $pages */

$restaurants = $page->children('template=restaurant, sort=title');

?>

<div id="content">
	<h2>Restaurants</h2>
	<?php if($restaurants->count()): ?>
	<ul>
		<?php foreach($restaurants as $restaurant): /** @var RestaurantPage $restaurant */ ?>
		<li>
			<a href="<?php echo $restaurant->url; ?>"><?php echo $restaurant->title; ?></a>
			<?php if($restaurant->cuisine->id): ?>
				&mdash; <?php echo $restaurant->cuisine->title; ?>
			<?php endif; ?>
			<?php if($restaurant->price_range->id): ?>
				(<?php echo $restaurant->price_range->title; ?>)
			<?php endif; ?>
			<?php if($restaurant->is_verified): ?>
				&#10003;
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
	<p>No restaurants yet.</p>
	<?php endif; ?>
</div>
