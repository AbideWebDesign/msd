<section class="bg-primary wrapper-sm">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-6 col-sm-3 col-xl-auto mb-2 mb-sm-0">

				<?php $link = get_field('quick_link_1', 'options'); ?>
					
				<div class="card shadow border-rounded p-2 px-xl-3 py-xl-2 text-center">
					
					<div class="rounded-circle bg-blue-dark p-2 mb-1">
						
						<?php echo wp_get_attachment_image( get_field('quick_link_icon_1', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> 
					
					</div>
				
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="stretched-link text-body font-weight-bold"><?php echo $link['title']; ?></a>
					
				</div>

			</div>

			<div class="col-6 col-sm-3 col-xl-auto mb-2 mb-sm-0">

				<?php $link = get_field('quick_link_2', 'options'); ?>
					
				<div class="card shadow border-rounded p-2 px-xl-3 py-xl-2 text-center">
					
					<div class="rounded-circle bg-primary p-2 mb-1">
						
						<?php echo wp_get_attachment_image( get_field('quick_link_icon_2', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> 
					
					</div>
				
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="stretched-link text-body font-weight-bold"><?php echo $link['title']; ?></a>
					
				</div>

			</div>

			<div class="col-6 col-sm-3 col-xl-auto mb-2 mb-sm-0">

				<?php $link = get_field('quick_link_3', 'options'); ?>
					
				<div class="card shadow border-rounded p-2 px-xl-3 py-xl-2 text-center">
					
					<div class="rounded-circle bg-orange p-2 mb-1">
						
						<?php echo wp_get_attachment_image( get_field('quick_link_icon_3', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> 
					
					</div>
				
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="stretched-link text-body font-weight-bold"><?php echo $link['title']; ?></a>
					
				</div>

			</div>

			<div class="col-6 col-sm-3 col-xl-auto">

				<?php $link = get_field('quick_link_4', 'options'); ?>
					
				<div class="card shadow border-rounded p-2 px-xl-3 py-xl-2 text-center">
					
					<div class="rounded-circle bg-green p-2 mb-1">
						
						<?php echo wp_get_attachment_image( get_field('quick_link_icon_4', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> 
					
					</div>
				
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="stretched-link text-body font-weight-bold"><?php echo $link['title']; ?></a>
					
				</div>

			</div>
			
			<div class="col-auto d-none d-xl-block">

				<?php $link = get_field('quick_link_5', 'options'); ?>
					
				<div class="card shadow border-rounded p-2 px-xl-3 py-xl-2 text-center">
					
					<div class="rounded-circle bg-red p-2 mb-1">
						
						<?php echo wp_get_attachment_image( get_field('quick_link_icon_5', 'options'), 'thumbnail', false, array('class'=>'img-quick-icon img-fluid') ); ?> 
					
					</div>
				
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="stretched-link text-body font-weight-bold"><?php echo $link['title']; ?></a>
					
				</div>

			</div>

		</div>

	</div>

</section>