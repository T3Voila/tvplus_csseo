<?php

declare(strict_types=1);

namespace T3voila\TvplusCsseo;

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

use Clickstorm\CsSeo\Hook\PageHook;
use Tvp\TemplaVoilaPlus\Controller\Backend\PageLayoutController;
use TYPO3\CMS\Backend\Controller\PageLayoutController as CorePageLayoutController;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class to add [clickstorm] SEO to the templavoila page module
 * Uses the renderHeaderFunctionHook hook
 *
 * @author Alexander Opitz <opitz.alexander@googlemail.com>
 */
class RenderHook
{
    public function renderHeaderFunctionHook(array $params, PageLayoutController $parentObject): string
    {
        /** @var CorePageLayoutController $pageLayoutController */
        $pageLayout = GeneralUtility::makeInstance(CorePageLayoutController::class);
        $pageLayout->id = $parentObject->getCurrentPageUid();
        $pageLayout->pageinfo = $parentObject->getCurrentPageInfo();
        $pageLayout->MOD_SETTINGS = [
            'function' => 1,
            'language' => $parentObject->getCurrentLanguageUid(),
        ];

        /** @var PageHook $csseo */
        $csseo = GeneralUtility::makeInstance(PageHook::class);
        return $csseo->render($params, $pageLayout) ?? '';
    }
}
