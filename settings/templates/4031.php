<?php
if(!isset($_)) {//also provide standalone error page
	require_once '../../lib/base.php';
	
	$tmpl = new OC_Template( '', '403', 'guest' );
	$tmpl->printPage();
	exit;
}
?>
<ul>
	<li class='error'>
		<?php p($l->t( 'Access forbidden' )); ?><br/>
		<?php print_unescaped($l->t( 'Ce service n\'est pas encore ouvert à toutes les unités CNRS, merci de contacter le <a href="http://www.offres-de-services-unites.net/contacts.html">SI de votre délégation</a> pour plus d\'informations.' )); ?><br/>
		<p class='hint'><?php if(isset($_['file'])) p($_['file'])?></p><?php p($l->t( 'Error' ));?> 403<br/>
	</li>
</ul>
<div>
<p><a target="_blank" class="button" href="<?php print_unescaped(OC_Config::getValue('custom_knowledgebaseurl',''));?>"><?php p($l->t('Documentation'));?></a>
</p>
</div>
