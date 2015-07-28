<script>
	$(function() {
		$("#topbar-cart-text").on('click', function(e) {
			showEditCartModal(<?= CJSON::encode(Yii::app()->createUrl('editcart')) ?>);
			//prevents default link behavior that causes the cart modal to be called twice
			e.preventDefault();
		});
	});
</script>

<div id="topbar" class="row-fluid page-header">
	<div class="span9">
	<!-- template header -->
		<div id="headerimage" class="logo">
			<?php echo CHtml::link(CHtml::image($this->pageHeaderImage, 'web store header image'), $this->createUrl("site/index")); ?>
		</div>

		<ul>
			<!-- Cart -->
			<?php if (Yii::app()->params['DISABLE_CART'] == false): ?>
			<li>
				<a id="topbar-cart-text" href=""><em id="em"></em><?php echo Yii::t('cart', 'Cart'); ?></em></a>
				<small id="topbar-cart-number" >
						<span id="cartItemsTotal">
							<?php
							echo Yii::app()->shoppingcart->totalItemCount;
							?>
						</span>
				</small>
			</li>
			<?php endif; ?>
			<!-- login Register -->
			<?php if(Yii::app()->user->isGuest):
				echo "<li>".CHtml::link(Yii::t('global', 'Account'), array("/site/login"))."</li>";
			elseif(!Yii::app()->user->isGuest):
				echo "<li>".CHtml::link(Yii::t('global', 'Account'), array("/myaccount"))."</li>";
			endif; ?>

			<!-- wish Lists -->
			<?php
				if (_xls_get_conf('ENABLE_WISH_LIST')):
					if (Yii::app()->user->isGuest):
						echo "<li>".CHtml::link(Yii::t('global', 'Wish Lists'), array("wishlist/search"))."</li>";
					else:
						echo "<li>".CHtml::link(Yii::t('global', 'Wish Lists'), array("/wishlist"))."</li>";
					endif;
				endif;
			?>

			<!-- log Out -->
			<?php if(!Yii::app()->user->isGuest):
				echo "<li>".CHtml::link(Yii::t('global', 'Logout'), array("site/logout"))."</li>";
			endif; ?>

		</ul>
</div>
	<div class="span3">
		<?php if(_xls_get_conf('LANG_MENU', 0)): ?>
			<div class="langmenu">
				<?php $this->widget('application.extensions.'._xls_get_conf('PROCESSOR_LANGMENU').'.'._xls_get_conf('PROCESSOR_LANGMENU')); ?>
				</div>
		<?php endif; ?>
		<div class="social-buttons">
           <!-- Facebook -->
          <a href="https://www.facebook.com/ChefCityEquipment" title="Like Chef City on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
          <!-- Google+ -->
          <a href="https://plus.google.com/u/0/+ChefCityEquipmentCorporationWhitePlains/posts" title="Review Chef City on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i></a>
          <!-- Twitter -->
          <a href="https://twitter.com/ChefCityCorp" title="Follow Chef City on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
          <!-- Yelp -->
          <a href="http://www.yelp.com/biz/chef-city-white-plains" title="Tell Chef City how we are doing on Yelp" target="_blank" class="btn btn-yelp"><i class="fa fa-yelp"></i></a>
          <!-- Instagram --> 
          <a href="https://foursquare.com/v/chef-city/513281c1e4b0680a846cde5e" title="Checkin on Foursquare" target="_blank" class="btn btn-foursquare"><i class="fa fa-foursquare"></i></a>
        </div>
	</div>
</div>
