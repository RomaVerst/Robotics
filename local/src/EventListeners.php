<?php

namespace App\Robotics;

use Bitrix\Main\Localization\Loc;

Loc::loadLanguageFile(__FILE__, LANGUAGE_ID);

class EventListeners
{
    public function addSettingsMenuItem(&$aGlobalMenu, &$aModuleMenu)
    {
        global $USER;

        if ($USER->IsAdmin()) {

            $aGlobalMenu['global_menu_robotics'] = [
                'menu_id' => 'robotics',
                'text' => 'Robotics',
                'title' => 'Robotics',
                'sort' => 80,
                'items_id' => 'global_menu_robotics',
                'help_section' => 'robotics',
                'items' => [
                    [
                        'parent_menu' => 'global_menu_robotics',
                        'sort'        => 10,
                        'url'         => 'settings_robotics.php?lang='.LANGUAGE_ID,
                        'text'        => Loc::getMessage('COMMENTS_TEXT'),
                        'title'       => Loc::getMessage('COMMENTS_TEXT'),
                        'icon'        => 'forum_menu_icon',
                        'page_icon'   => 'forum_menu_icon',
                        'items_id'    => 'global_menu_robotics',
                    ]
                ],
            ];

        }
    }
}
