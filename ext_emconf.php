<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoilà! Plus for CS SEO',
    'description' => 'Integration of TYPO3 [clickstorm] SEO into TemplaVoilà! Plus PageLayout Modul',
    'category' => 'misc',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Opitz',
    'author_email' => 'opitz.alexander@googlemail.com',
    'author_company' => 'T3Voila Team',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-8.1.99',
            'typo3' => '8.7.0-11.5.99',
            'templavoilaplus' => '8.1.0-8.2.99',
            'cs_seo' => '6.0.0-7.99.99',
        ],
    ]
];
