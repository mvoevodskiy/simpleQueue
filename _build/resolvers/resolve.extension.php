<?php

/**
 * Handles adding Component to Extension Packages
 *
 * @var xPDOObject $object
 * @var array $options
 */
if ($object->xpdo) {
    /** @var modX $modx */
    $modx = $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            if ($modx instanceof modX) {
                $modx->addExtensionPackage('simplequeue', '[[++core_path]]components/simplequeue/model/');
            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            if ($modx instanceof modX) {
                $modx->removeExtensionPackage('simplequeue');
            }
            break;
    }
}
return true;
