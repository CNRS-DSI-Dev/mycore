<?php
/** @var $_ array */
/** @var $l OC_L10N */
if(!isset($_)) {//also provide standalone error page
	require_once '../../../../lib/base.php';

	$tmpl = new OC_Template( '', '404', 'guest' );
	$tmpl->printPage();
	exit;
}
?>
<?php if (isset($_['content'])): ?>
	<?php print_unescaped($_['content']) ?>
<?php else: ?>
	<ul>
		<li class="error">
			<?php p($l->t( 'Cloud not found' )); ?><br/><?php p($l->t( 'Error' ));?> 404<br/>
			<p class='hint'><?php if(isset($_['file'])) p($_['file'])?></p>
		</li>
	</ul>
<?php endif; ?>
<div>
<p><a target="_blank" class="button" href="<?php print_unescaped(\OCP\Config::getSystemValue('custom_knowledgebaseurl',''));?>"><?php p($l->t('Documentation'));?></a>
</p>
</div>

