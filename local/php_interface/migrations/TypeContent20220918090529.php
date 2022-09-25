<?php

namespace Sprint\Migration;


class TypeContent20220918090529 extends Version
{
    protected $description = "миграция для типа инфоблоков Контент";

    protected $moduleVersion = "4.1.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->saveIblockType([
          'ID' => 'content',
          'SECTIONS' => 'Y',
          'EDIT_FILE_BEFORE' => '',
          'EDIT_FILE_AFTER' => '',
          'IN_RSS' => 'N',
          'SORT' => '500',
          'LANG' =>
          [
            'ru' =>
            [
              'NAME' => 'Контент',
              'SECTION_NAME' => '',
              'ELEMENT_NAME' => '',
            ],
            'en' =>
            [
              'NAME' => 'Content',
              'SECTION_NAME' => '',
              'ELEMENT_NAME' => '',
            ],
          ],
        ]);
    }

    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->deleteIblockTypeIfExists('content');
    }
}
