<?php
include LIBS . 'Auth.php';

/**
 * Блок авторизации
 */
new Auth('teachers');
Auth::exit();
$auth = Auth::auth();
/**
 * 1. Инициализируем класс FS с начальным каталогом и файлами для сканирования
 */
$Fs = new Fs('/mnt/shared/');

/**
 * 4. Запуск метода для скачивания файла
 * Отрабатывает если нажмем на ссылку с файлом
 */
// $Fs->recursive('/mnt/teachers/');
// exit;
$Fs->downloadFile();

/**
 * Формирование контента на странице
 */
$content = '';
$content .= Temp::templates('navbar', $auth);

if (isset($_GET['dir'])&&!empty($_GET['dir'])) {    
    $dir = $_GET['dir'];
    /**
     * 3. Класс FS
     * ->установка текущего каталога внутри базового
     * ->сканируем выбранный каталог
     * ->возвращаем массив найденных элементов
     */
    $Fs->setCatalog($dir)
        ->dirScan()
        ->showInTo($dir);
    /**
     * Хлебные крошки и навигация по каталогам
     */
    $content .= Temp::templates('breadcrumb', $Fs->breadcrumb);
    /**
     * Полученный выше массив передаем в Вид
     */    
    $content .= '<div class="buttons">' . Temp::templates('a', $Fs->temp_array) . '</div>';    
} else {
    /**
     * 4. Чтение корневого каталога, инициализированного на первом этапе
     */
    $Fs->scanRec()->show();
    /**
     * Хлебные крошки и навигация по каталогам
     */
    $content .= Temp::templates('breadcrumb', $Fs->breadcrumb);
    $content .= '<div class="buttons">' . Temp::templates('a', $Fs->temp_array) . '</div>';
}