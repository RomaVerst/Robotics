<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<div class="collapse navbar-collapse" id="navbarMenu">
    <ul class="navbar-nav mx-auto">
        <? foreach ($arResult['ITEMS'] as $key => $item): ?>
            <? if ($item['IS_PARENT']): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?=($item['SELECTED']) ? 'active' : ''?>" href="<?=$item['LINK']?>"
                       id="dropdown<?=$key?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$item['TEXT']?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown<?=$key?>">
                        <? foreach ($item['ITEMS'] as $subItem): ?>
                        <a class="dropdown-item <?=($item['SELECTED']) ? 'active' : ''?>" href="<?=$subItem['LINK']?>">
                            <?=$subItem['TEXT']?>
                        </a>
                        <? endforeach; ?>
                    </div>

                </li>
            <? else: ?>
                <li class="nav-item">
                    <a class="nav-link <?=($item['SELECTED']) ? 'active' : ''?>" href="<?=$item['LINK']?>"><?=$item['TEXT']?></a>
                </li>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
</div>