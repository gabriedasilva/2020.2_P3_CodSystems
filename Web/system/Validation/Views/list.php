<?php if (! empty($errors)) : ?>
	<div style="text-align: center;">
		<ul style="list-style: none;">
		<?php foreach ($errors as $error) : ?>
			<li><?= esc($error) ?></li>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
