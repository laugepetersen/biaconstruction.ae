<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<?php
$navigation = get_field('navigation', 'option');
$logo_white = get_field('logo_white', 'option');
$logo_dark = get_field('logo_dark', 'option');
$light_mode = is_front_page();
?>


<header id="masthead"
	class="py-3 fixed top-0 z-50 w-full [.admin-bar_&]:mt-8 md:[.admin-bar_&]:mt-[32px] <?php echo $light_mode ? 'light-mode' : ''; ?> transition-colors">
	<div class="container">
		<div class="flex justify-between items-center relative">
			<div>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
					<?php echo wp_get_attachment_image($logo_white, 'sm', false, ['class' => 'h-10 w-auto object-contain [.scroll_&]:hidden ' . ($light_mode ? '' : 'hidden')]); ?>
					<?php echo wp_get_attachment_image($logo_dark, 'sm', false, ['class' => 'h-10 w-auto object-contain [.scroll_&]:block ' . ($light_mode ? 'hidden' : '')]); ?>
				</a>
			</div>

			<!-- Desktop Menu -->
			<div class="absolute-center max-lg:hidden">
				<nav class="flex gap-8">
					<?php foreach ($navigation as $item): ?>
						<?php
						$button = $item['button'];
						if ($button) {
							continue;
						}
						$is_current = is_page($item['link']['ID']);
						?>
						<a class="link hover:underline underline-offset-[8px] p-2 -m-2 shrink-0"
							href="<?php echo esc_url($item['link']['url']); ?>"
							target="<?php echo esc_attr($item['link']['target']); ?>">
							<?php echo esc_html($item['link']['title']); ?>
						</a>
					<?php endforeach; ?>
				</nav>
			</div>

			<div class="flex items-center gap-4">
				<?php foreach ($navigation as $item): ?>
					<?php
					$button = $item['button'];
					if (!$button) {
						continue;
					}
					?>
					<div class="">
						<?php if ($light_mode): ?>
							<a href="<?php echo esc_url($item['link']['url']); ?>"
								class="button <?php echo $item['button'] ?> inverted [.scroll_&]:hidden"
								target="<?php echo esc_attr($item['link']['target']); ?>">
								<?php echo esc_html($item['link']['title']); ?>
							</a>
							<a href="<?php echo esc_url($item['link']['url']); ?>"
								class="button <?php echo $item['button'] ?> hidden [.scroll_&]:block"
								target="<?php echo esc_attr($item['link']['target']); ?>">
								<?php echo esc_html($item['link']['title']); ?>
							</a>
						<?php else: ?>
							<a href="<?php echo esc_url($item['link']['url']); ?>" class="button <?php echo $item['button'] ?>"
								target="<?php echo esc_attr($item['link']['target']); ?>">
								<?php echo esc_html($item['link']['title']); ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
				<!-- Mobile Burger Menu -->
				<button id="mobile-nav-open-btn" class="lg:hidden">
					<svg viewBox="0 0 32 32" width="32px" height="32px">
						<path d="M28,9.5H4A0.5,0.5,0,0,1,4,8.5H28a0.5,0.5,0,0,1,0,1Z" fill="currentColor" />
						<path d="M28,16.5H4a0.5,0.5,0,0,1,0-1H28a0.5,0.5,0,0,1,0,1Z" fill="currentColor" />
						<path d="M28,23.5H4a0.5,0.5,0,0,1,0-1H28a0.5,0.5,0,0,1,0,1Z" fill="currentColor" />
					</svg>
				</button>
			</div>
		</div>
	</div>
</header>

<div id="mobile-nav" class="fixed h-screen w-screen bg-bg-gray/90 backdrop-blur-md top-0 left-0 z-[100] grid">
	<div class="container min-h-full overflow-y-scroll grid py-10">

		<button id="mobile-nav-close-btn"
			class="absolute top-4 right-[4vw] p-3 rounded-full hover:bg-black/5 cursor-pointer transition-all opacity-80 hover:opacity-100">
			<svg enable-background="new 0 0 128 128" version="1.1" viewBox="0 0 128 128" width="20px" height="20px">
				<g>
					<polygon fill="currentColor"
						points="123.5429688,11.59375 116.4765625,4.5185547 64.0019531,56.9306641 11.5595703,4.4882813     4.4882813,11.5595703 56.9272461,63.9970703 4.4570313,116.4052734 11.5244141,123.4814453 63.9985352,71.0683594     116.4423828,123.5117188 123.5126953,116.4414063 71.0732422,64.0019531   " />
				</g>
			</svg>
		</button>

		<nav class="flex flex-col items-start gap-8">
			<?php foreach ($navigation as $item): ?>
				<?php
				$button = $item['button'];
				if ($button === 'primary') {
					continue;
				}
				$is_current = is_page($item['link']['ID']);
				?>
				<a href="<?php echo esc_url($item['link']['url']); ?>"
					class="h2 hover:underline underline-offset-[8px] decoration-2 <?php echo $button ? $button : ''; ?>"
					target="<?php echo esc_attr($item['link']['target']); ?>">
					<?php echo esc_html($item['link']['title']); ?>
				</a>
			<?php endforeach; ?>
		</nav>

	</div>
</div>