<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */
?>

<?php
$column1 = get_field('column_1', 'option');
$column2 = get_field('column_2', 'option');
$column3 = get_field('column_3', 'option');
$bottom = get_field('bottom', 'option');
?>

<footer class="">
	<div class="container">
		<div class="grid grid-cols-1 lg:grid-cols-[3fr_1fr_1fr] xl:grid-cols-[4fr_1fr_1fr] gap-8 max-lg:text-center">

			<div>
				<?php echo wp_get_attachment_image($column1['logo'], 'sm', false, ['class' => 'h-16 w-auto object-contain mb-8 max-lg:mx-auto']); ?>
				<div class="wysiwyg">
					<?php echo $column1['content']; ?>
				</div>

				<?php if ($column1['socials']): ?>
					<div class="flex gap-4 mt-8 max-lg:justify-center">
						<?php foreach ($column1['socials'] as $social): ?>
							<a class="flex items-center gap-2" href="<?php echo $social['link']['url']; ?>"
								target="<?php echo $social['link']['target']; ?>">
								<div>
									<?php if ($social['icon'] === 'facebook'): ?>
										<svg height="22" width="22"
											style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
											viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
											xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
											<path
												d="M512,257.555c0,-141.385 -114.615,-256 -256,-256c-141.385,0 -256,114.615 -256,256c0,127.777 93.616,233.685 216,252.89l0,-178.89l-65,0l0,-74l65,0l0,-56.4c0,-64.16 38.219,-99.6 96.695,-99.6c28.009,0 57.305,5 57.305,5l0,63l-32.281,0c-31.801,0 -41.719,19.733 -41.719,39.978l0,48.022l71,0l-11.35,74l-59.65,0l0,178.89c122.385,-19.205 216,-125.113 216,-252.89Z"
												style="fill-rule:nonzero;" fill="currentColor" />
										</svg>
									<?php endif; ?>
									<?php if ($social['icon'] === 'instagram'): ?>
										<svg height="24" width="24" viewBox="0 0 512 512">
											<path
												d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"
												fill="currentColor" />
											<path d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z" />
											<path
												d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"
												fill="currentColor" />
										</svg>

									<?php endif; ?>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="flex flex-col items-start gap-3 max-lg:items-center">
				<?php foreach ($column2['navigation'] as $item): ?>
					<a class="text-base font-medium" href="<?php echo $item['link']['url']; ?>"
						target="<?php echo $item['link']['target']; ?>"><?php echo $item['link']['title']; ?></a>
				<?php endforeach; ?>
			</div>

			<div class="flex flex-col items-start gap-3 max-lg:items-center">
				<?php foreach ($column3['navigation'] as $item): ?>
					<a class="text-base font-medium" href="<?php echo $item['link']['url']; ?>"
						target="<?php echo $item['link']['target']; ?>"><?php echo $item['link']['title']; ?></a>
				<?php endforeach; ?>
			</div>

		</div>
	</div>

	<div class="border-t border-t-black/10 py-3 mt-10">
		<div class="container">
			<div class="flex items-center justify-between max-md:flex-col max-md:items-center">
				<div>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</div>
				<div class="flex items-center gap-4">
					<?php foreach ($bottom['navigation'] as $item): ?>
						<a href="<?php echo $item['link']['url']; ?>" class="text-black/80 underline underline-offset-4"
							target="<?php echo $item['link']['target']; ?>"><?php echo $item['link']['title']; ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</footer>