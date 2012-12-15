<?php
/**
 * Resolve creating db tables
 *
 * @package hybridauth
 * @subpackage build
 */
if ($object->xpdo) {
	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modx =& $object->xpdo;
			$modelPath = $modx->getOption('hybridauth.core_path',null,$modx->getOption('core_path').'components/hybridauth/').'model/';
			$modx->addPackage('hybridauth',$modelPath);

			$manager = $modx->getManager();

			$manager->createObjectContainer('haUserService');

			if ($modx instanceof modX) {
				$modx->addExtensionPackage('hybridauth', '[[++core_path]]components/hybridauth/model/');
			}

			break;
		case xPDOTransport::ACTION_UPGRADE:
			break;
	}
}
return true;