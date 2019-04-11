<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoilà! Plus for CS SEO',
    'description' => 'Integration of TYPO3 [clickstorm] SEO into TemplaVoilà! Plus.',
    'category' => 'misc',
    'version' => '0.2.3-dev',
    'state' => 'stable',
    'uploadfolder' => 0,
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Opitz',
    'author_email' => 'opitz@pluspol-interactive.de',
    'author_company' => 'PLUSPOL interactive GbR',
    'constraints' => [
        'depends' => [
            'php' => '5.5.0-7.3.99',
            'typo3' => '7.6.0-9.5.99',
            'templavoilaplus' => '7.1.3-7.99.99',
            'cs_seo' => '2.1.0-4.99.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Ppi\\PpiTemplavoilaplusCsseo\\' => 'Classes/',
        ],
    ],
];
