<?php namespace ProcessWire;

/** @var RestaurantPage $page */

$days = [
	'Monday'    => $page->opening_hours_monday,
	'Tuesday'   => $page->opening_hours_tuesday,
	'Wednesday' => $page->opening_hours_wednesday,
	'Thursday'  => $page->opening_hours_thursday,
	'Friday'    => $page->opening_hours_friday,
	'Saturday'  => $page->opening_hours_saturday,
	'Sunday'    => $page->opening_hours_sunday,
];

?>

<div id="content">

	<?php if($page->image_hero->first()): ?>
	<img src="<?php echo $page->image_hero->first()->url; ?>" alt="<?php echo $page->title; ?>" />
	<?php endif; ?>

	<?php if($page->body_markdown): ?>
	<div><?php echo $page->body_markdown; ?></div>
	<?php endif; ?>

	<dl>
		<?php if($page->cuisine->id): ?>
		<dt>Cuisine</dt>
		<dd><a href="<?php echo $page->cuisine->url; ?>"><?php echo $page->cuisine->title; ?></a></dd>
		<?php endif; ?>

		<?php if($page->price_range->id): ?>
		<dt>Price Range</dt>
		<dd><a href="<?php echo $page->price_range->url; ?>"><?php echo $page->price_range->title; ?></a></dd>
		<?php endif; ?>

		<?php if($page->street || $page->city): ?>
		<dt>Address</dt>
		<dd>
			<?php if($page->street): ?><?php echo $page->street; ?><br /><?php endif; ?>
			<?php if($page->zip || $page->city): ?>
				<?php echo trim($page->zip . ' ' . $page->city); ?><br />
			<?php endif; ?>
			<?php if($page->area): ?><?php echo $page->area; ?><?php endif; ?>
		</dd>
		<?php endif; ?>

		<?php if($page->phone): ?>
		<dt>Phone</dt>
		<dd><a href="tel:<?php echo $page->phone; ?>"><?php echo $page->phone; ?></a></dd>
		<?php endif; ?>

		<?php if($page->email): ?>
		<dt>Email</dt>
		<dd><a href="mailto:<?php echo $page->email; ?>"><?php echo $page->email; ?></a></dd>
		<?php endif; ?>

		<?php if($page->website): ?>
		<dt>Website</dt>
		<dd><a href="<?php echo $page->website; ?>" target="_blank" rel="noopener"><?php echo $page->website; ?></a></dd>
		<?php endif; ?>
	</dl>

	<?php $hasHours = array_filter($days); ?>
	<?php if($hasHours): ?>
	<h3>Opening Hours</h3>
	<table>
		<?php foreach($days as $day => $hours): ?>
		<tr>
			<th><?php echo $day; ?></th>
			<td><?php echo $hours ?: 'Closed'; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

</div>
