<?php
/**
 * Подключение базы данных и файла с набором функция для работы с таблицами из базы данных
 */
require_once 'connect.php';
require_once 'handle.php';

$error = json_encode(array(
    'status' => 'ERROR',
    'message'=>'Wrong request!')
);


if (!empty($_REQUEST['act'])) {

    switch ($_REQUEST['act'])
    {
        case 'create':
        /**
         * Отправка запроса на добавление записи в таблицу
         * используется метод POST
         */
            if(!empty($_POST)){
                /**
                 * @param var $link идентификатор соединения
                 * @param @global $_POST ассоциативный массив
                 * @return json ответ от сервера
                 */
                $answer = create($link, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;//отправка json ответа от сервера
            break;
        case 'get':
            /**
             * Отправка запроса на получение записей из таблицы
             * используется метод GET
             */
            if(!empty($_GET)){
                /**
                 * @param var $link идентификатор соединения
                 * @return json ответ от сервера
                 */
                $answer = get($link);
            }else{
                $answer = $error;
            }
            print $answer;//отправка json ответа от сервера
            break;
        case 'update':
            /**
             * Отправка запроса на обновление записи в таблице
             * используется метод POST
             */
            if(!empty($_POST)){
                /**
                 * @param var $link идентификатор соединения
                 * @param @global $_POST ассоциативный массив
                 * @return json ответ от сервера
                 */
                $answer = update($link, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;//отправка json ответа от сервера
            break;
        case 'delete':
            /**
             * Отправка запроса на удаление записи записи из таблицы
             * используется метод POST
             */
            if(!empty($_POST)){
                /**                 * 
                 * @param var $link идентификатор соединения
                 * @param @global $_POST ассоциативный массив
                 * @return json ответ от сервера
                 */
                $answer = delete($link, $_POST);
            }
            else{
                $answer = $error;
            }
            print $answer;//отправка json ответа от сервера
            break;
    }
}