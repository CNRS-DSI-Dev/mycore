<?php
if(!isset($_)) {//also provide standalone error page
	require_once '../../lib/base.php';

	$tmpl = new OC_Template( '', '503', 'guest' );
	$tmpl->printPage();
	exit;
}
?>
<ul>
	<li class='error'>
		<?php p($l->t( 'Service Unavailable' )); ?><br/><?php p($l->t( 'Error' ));?> 503<br/>
		<p class='hint'><?php if(isset($_['file'])) p($_['file'])?></p>
	</li>
</ul>
<div>
<p><a target="_blank" class="button" href="<?php print_unescaped(\OCP\Config::getSystemValue('custom_knowledgebaseurl',''));?>"><?php p($l->t('Documentation'));?></a>
</p>
</div>

