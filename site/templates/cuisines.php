<?php namespace ProcessWire;

/** @var CuisinesPage $page */
/** @var Pages $pages */

$cuisines = $page->children('template=cuisine, sort=title');

?>

<div id="content">
	<h2>Cuisines</h2>
	<?php if($cuisines->count()): ?>
	<ul>
		<?php foreach($cuisines as $cuisine): /** @var CuisinePage $cuisine */ ?>
		<li>
			<a href="<?php echo $cuisine->url; ?>"><?php echo $cuisine->title; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
	<p>No cuisines yet.</p>
	<?php endif; ?>
</div>
