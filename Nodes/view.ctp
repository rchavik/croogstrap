<?php $this->Nodes->set($node); ?>
<div id="node-<?php echo $this->Nodes->field('id'); ?>" class="panel panel-primary node-type-<?php echo $this->Nodes->field('type'); ?>">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $this->Nodes->field('title'); ?></h3>
	</div>
	<?php
	echo $this->Nodes->info();
	echo $this->Nodes->body();
	echo $this->Nodes->moreInfo();
	?>
</div>

<?php if (CakePlugin::loaded('Comments')): ?>
	<div id="comments" class="node-comments">
		<?php
		$type = $types_for_layout[$this->Nodes->field('type')];

		if ($type['Type']['comment_status'] > 0 && $this->Nodes->field('comment_status') > 0) {
			echo $this->element('Comments.comments', array('model' => 'Node', 'data' => $node));
		}

		if ($type['Type']['comment_status'] == 2 && $this->Nodes->field('comment_status') == 2) {
			echo $this->element('Comments.comments_form', array('model' => 'Node', 'data' => $node));
		}
		?>
	</div>
<?php endif;