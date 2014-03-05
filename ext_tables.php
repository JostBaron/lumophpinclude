<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key';

$TCA['tx_lumophpinclude_validurls'] = array(
    'ctrl' => array(
        'label' => 'List of valid URLs generated by lumophpinclude.',
        'hideTable' => 1,
        'rootLevel' => -1,
    ),
    'columns' => array(
        'url' => array(
            'exclude' => 0,
            'label' => 'A valid URL',
            'config' => array(
                'type' => 'passthrough',
                'eval' => 'required',
            ),
        ),
    ),
);

t3lib_extMgm::addPlugin(Array('LLL:EXT:lumophpinclude/locallang_db.php:tt_content.list_type_pi1', $_EXTKEY . '_pi1'), 'list_type');

t3lib_extMgm::addStaticFile($_EXTKEY, "pi1/static/", "PHP Include");

// Use FlexForms.
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:lumophpinclude/pi1/flexform_ds_pi1.xml');

if (TYPO3_MODE=="BE") {
    $TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_lumophpinclude_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY) . 'pi1/class.tx_lumophpinclude_pi1_wizicon.php';
}
