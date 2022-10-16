<?php

namespace Sprint\Migration;


class CommentsFileAdmin20221009211830 extends Version
{
    protected $description = "подключение файла с настройками для комментариев";

    protected $moduleVersion = "4.1.1";

    protected $adminPath = "/bitrix/admin/settings_robotics.php";
    protected $localPath = "/local/admin/settings_robotics.php";

    public function up()
    {
        if (
            file_exists($_SERVER['DOCUMENT_ROOT'].$this->localPath)
            && !file_exists($_SERVER['DOCUMENT_ROOT'].$this->adminPath)
        ) {
            $content = '<?php require($_SERVER["DOCUMENT_ROOT"]."'.$this->localPath.'"); ';
            file_put_contents($_SERVER['DOCUMENT_ROOT'].$this->adminPath, $content);
        }
    }

    public function down()
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$this->adminPath)) {
            unlink($_SERVER['DOCUMENT_ROOT'].$this->adminPath);
        }
    }
}
