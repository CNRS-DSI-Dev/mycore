<?php
/**
 * ownCloud - validate.php
 *
 * @author Marc DeXeT
 * @copyright 2014 DSI CNRS https://www.dsi.cnrs.fr
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
\OCP\Util::addScript('gtu', 'vendor/angular/angular');
\OCP\Util::addScript('gtu', 'app/controllers/appcontroller');
\OCP\Util::addScript('gtu', 'app/services/services');
\OCP\Util::addStyle( "gtu", "gtu" );
\OCP\Util::addStyle( "settings", "settings" );
\OCP\Util::addStyle( "", "apps" );

$msg = isset($_['msg']) ? $_['msg']: ''

?>
<!-- block firstrunwizard https://github.com/owncloud/firstrunwizard/blob/master/js/activate.js with empty error class-->
<div class="error">GTU</div>
<div class="overlay">
	<div id="app" ng-app="Gtu" ng-controller="ValidateAppCtrl">
		<div id="app-content" ng-view ng-class="{loading: is.loading}">
			<h2><?php p($msg)?></h2>
			<div class="gtu-loading" ng-hide="show">Chargement en cours...</div>
			<form ng-show="show" name="login">
				<fieldset>
					<p>Veuillez prendre connaissance des nouvelles Conditions Générales d'Utilisation en version <b>{{gtu.version}}</b></p>
					<!-- Mantis 34762 <p>Contenu : {{gtu.text}}</p> -->
					<p>Téléchargez le document complet des CGU en suivant le lien suivant : <a href="{{gtu.url}}" target="_gtu">{{gtu.url}}</a></p>
					<button ng-show="notValidated" ng-click="validate()">
						VALIDER LES CGU
					</button>
					<div class="gtu-status">{{status}}</div>
					<div ng-hide="notValidated">
						<strong><a href="<?php p($_['start_page_url']);?>"><?php p($_['start_page_message']);?></a></strong>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>
