<footer>
	<div class="container">
		<div class="row f-contact">
			<div class="col-md-3 offset-md-1 branding">
				<?php $logo_full = get_field('logo_full', 'option'); ?>
				<?php if ($logo_full) { ?>
					<img src="<?php echo $logo_full['url']; ?>" alt="<?php echo $logo_full['alt']; ?>" />
				<?php } ?>
			</div>
			<div class="col-md-7">
				<?php if (have_rows('contactgegevens', 'option')) : ?>
					<?php while (have_rows('contactgegevens', 'option')) : the_row(); ?>
						<?php if (get_sub_field('telefoonnummer')) { ?><a class="fbtn" href="tel:<?php the_sub_field('telefoonnummer'); ?>"><?php the_sub_field('telefoonnummer'); ?></a><?php } ?>
						<?php if (get_sub_field('emailadres')) { ?><a class="fbtn" href="mailto:<?php the_sub_field('emailadres'); ?>"><?php the_sub_field('emailadres'); ?></a><?php } ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 offset-md-1 widgets">
				<?php if (is_active_sidebar('footer_1')) {
					dynamic_sidebar('footer_1');
				} ?>
				<?php if (is_active_sidebar('footer_2')) {
					dynamic_sidebar('footer_2');
				} ?>

				<?php if (is_active_sidebar('footer_3')) {
					dynamic_sidebar('footer_3');
				} ?>
				<?php if (is_active_sidebar('footer_4')) {
					dynamic_sidebar('footer_4');
				} ?>
			</div>
		</div>
	</div>
</footer>
<div id="socket">
	<div class="container">
		<div class="row">
			<div class="col-md-4 socials">
				<?php if (have_rows('contactgegevens', 'option')) : ?>
					<?php while (have_rows('contactgegevens', 'option')) : the_row(); ?>
						<?php $twitter = get_sub_field('twitter'); ?>
						<?php if ($twitter) { ?>
							<a href="<?php echo $twitter['url']; ?>" <?php if ($twitter['target']) { ?>target="<?php echo $twitter['target']; ?>" <?php } ?>>
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect x="0.5" y="0.5" width="31" height="31" rx="4.5" stroke="#03314C" stroke-opacity="0.25" />
									<path d="M20.2285 13.9937C20.235 14.0812 20.235 14.1688 20.235 14.2562C20.235 16.925 18.1139 20 14.2371 20C13.0428 20 11.9333 19.6687 11 19.0938C11.1697 19.1125 11.3328 19.1188 11.5091 19.1188C12.4945 19.1188 13.4017 18.8 14.1262 18.2563C13.1994 18.2375 12.4228 17.6563 12.1552 16.8562C12.2857 16.875 12.4162 16.8875 12.5533 16.8875C12.7426 16.8875 12.9319 16.8625 13.1081 16.8188C12.1421 16.6312 11.4177 15.8187 11.4177 14.8375V14.8125C11.6983 14.9625 12.0247 15.0563 12.3705 15.0687C11.8027 14.7062 11.4307 14.0875 11.4307 13.3875C11.4307 13.0125 11.5351 12.6687 11.7179 12.3687C12.7556 13.5937 14.3154 14.3937 16.0645 14.4812C16.0319 14.3312 16.0123 14.175 16.0123 14.0188C16.0123 12.9062 16.9521 12 18.1204 12C18.7273 12 19.2756 12.2437 19.6606 12.6375C20.137 12.55 20.5939 12.3812 20.9986 12.15C20.8419 12.6188 20.5091 13.0125 20.0718 13.2625C20.496 13.2188 20.9072 13.1062 21.2857 12.95C20.9986 13.35 20.6396 13.7062 20.2285 13.9937Z" fill="#03314C" fill-opacity="0.25" />
								</svg>
							</a>
						<?php } ?>
						<?php $facebook = get_sub_field('facebook'); ?>
						<?php if ($facebook) { ?>
							<a href="<?php echo $facebook['url']; ?>" <?php if ($facebook['target']) { ?>target="<?php echo $facebook['target']; ?>" <?php } ?>>
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect x="0.5" y="0.5" width="31" height="31" rx="4.5" stroke="#03314C" stroke-opacity="0.25" />
									<path d="M14.7432 21.9091V17.0298H13V15.0909H14.7432V13.5632C14.7432 11.9034 15.825 11 17.4045 11C18.1614 11 18.8114 11.0533 19 11.0767V12.8111H17.9045C17.0455 12.8111 16.8795 13.1946 16.8795 13.755V15.0909H18.8182L18.5523 17.0298H16.8795V21.9091" fill="#03314C" fill-opacity="0.25" />
								</svg>
							</a>
						<?php } ?>
						<?php $youtube = get_sub_field('youtube'); ?>
						<?php if ($youtube) { ?>
							<a href="<?php echo $youtube['url']; ?>" <?php if ($youtube['target']) { ?>target="<?php echo $youtube['target']; ?>" <?php } ?>>
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect x="0.5" y="0.5" width="31" height="31" rx="4.5" stroke="#03314C" stroke-opacity="0.25" />
									<path d="M21.1898 13.2517C21.0583 12.759 20.6711 12.371 20.1794 12.2393C19.2881 12 15.7143 12 15.7143 12C15.7143 12 12.1405 12 11.2492 12.2393C10.7575 12.371 10.3702 12.759 10.2388 13.2517C10 14.1448 10 16.0081 10 16.0081C10 16.0081 10 17.8714 10.2388 18.7644C10.3702 19.2571 10.7575 19.629 11.2492 19.7607C12.1405 20 15.7143 20 15.7143 20C15.7143 20 19.2881 20 20.1794 19.7607C20.6711 19.629 21.0583 19.2571 21.1898 18.7644C21.4286 17.8714 21.4286 16.0081 21.4286 16.0081C21.4286 16.0081 21.4286 14.1448 21.1898 13.2517V13.2517ZM14.5454 17.6998V14.3164L17.5324 16.0081L14.5454 17.6998V17.6998Z" fill="#03314C" fill-opacity="0.25" />
								</svg>
							</a>
						<?php } ?>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="col-md-8 disclaimer">
				<?php wp_nav_menu(array('theme_location' => 'socket_menu')); ?>
			</div>
		</div>
	</div>
</div>
<div class="btp">
	<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M8.06307 14L4.94019 14C4.50754 14 4.15947 13.6657 4.15947 13.2501L4.15947 7.00078L0.782856 7.00078C0.0867142 7.00078 -0.261357 6.19462 0.229846 5.71967L5.94862 0.220287C6.2544 -0.0734302 6.74885 -0.0734302 7.05464 0.220287L12.7702 5.71967C13.2614 6.1915 12.9133 7.00078 12.2171 7.00078L8.84378 7.00078L8.84379 13.2501C8.84379 13.6657 8.49571 14 8.06307 14Z" fill="white" />
	</svg>
</div>

<?php wp_footer(); ?>
</body>

</html>