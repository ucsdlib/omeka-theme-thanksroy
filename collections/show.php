<?php head(array('title'=>collection('Title'))); ?>

<div id="primary" class="show">
    <h1><?php echo collection('Title'); ?></h1>

    <div id="description" class="element">
    <h2>Description</h2>
    <div class="element-text"><?php echo nls2p(collection('Description')); ?></div>
    </div>
    
    <div id="collectors" class="element">
    <h2>Collector(s)</h2> 
        <div class="element-text">
            <ul>
                <li><?php echo collection('Collectors', array('delimiter'=>'</li><li>')); ?></li>
            </ul>
        </div>
    </div>

    <p class="view-items-link"><?php echo link_to_browse_items('View the items in' . collection('Title'), array('collection' => collection('id'))); ?></p>
    
    <div id="collection-items">

    <?php while (loop_items_in_collection(5)): ?>
		<h3><?php echo link_to_item(item('Title'), array('class'=>'permalink')); ?></h3>

		<?php if (item_has_thumbnail()): ?>
		<div class="item-img">
			<?php echo link_to_item(item_square_thumbnail(array('alt'=>item('Title',0)))); ?>						
		</div>
		<?php endif; ?>

		<?php if ($text = item('Text', array('index'=>0,'snippet'=>250))): ?>
			<div class="item-description">
			<p><?php echo $text; ?></p>
			</div>
		<?php elseif ($description = item('Description', array('index'=>0,'snippet'=>250))): ?>
			<div class="item-description">
			<?php echo $description; ?>
			</div>
		<?php endif; ?>
		
    <?php endwhile; ?>

    </div>
    
</div>

<?php foot(); ?>