<?php
namespace Ppi\PpiTemplavoilaplusCsseo;

/**
 *  Copyright notice
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

use Ppi\TemplaVoilaPlus\Controller\BackendLayoutController;

/**
 * Class to add [clickstorm] SEO to the templavoila page module
 * Uses the renderHeaderFunctionHook hook
 *
 * @author Alexander Opitz <opitz@pluspol-interactive.de>
 */
class RenderHook
{
    public function renderHeaderFunctionHook(array $params, BackendLayoutController $parentObject)
    {
        /** @var TYPO3\CMS\Backend\Controller\PageLayoutController $pageLayoutController */
        $pageLayout = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Controller\PageLayoutController::class);
        $pageLayout->id = $parentObject->id;
        $pageLayout->current_sys_language = $parentObject->currentLanguageUid;
        $pageLayout->MOD_SETTINGS['function'] = 1;
        $pageLayout->modTSconfig = BackendUtility::getModTSconfig($parentObject->id, 'mod.' . 'web_layout');
        $pageLayout->pageinfo = BackendUtility::readPageAccess($parentObject->id, $parentObject->perms_clause);

        /** @var YoastSeoForTypo3\YoastSeo\Backend\PageLayoutHeader $yoast */
        $csseo = GeneralUtility::makeInstance(\Clickstorm\CsSeo\Hook\PageHook::class);
        return $csseo->render($params, $pageLayout);
    }
}
