<?php
/**
 * Функция добавления записи в таблицу
 * 
 * @param var $link идентификатор соединения
 * @param array $record ассоциативный массив
 * @return json ответ от сервера
 */
function create($link,$record){
    if(empty($record['first_name']) || empty($record['second_name'])||empty($record['age'])
        ||empty($record['date_of_birth']))
        return json_encode('Write all the fields!');
    else{
        mysqli_query($link, "INSERT INTO Users(first_name, second_name, age, date_of_birth)".
        "VALUES('{$record['first_name']}', '{$record['second_name']}', '{$record['age']}',
            '{$record['date_of_birth']}');");
        return json_encode('Success');
    }   
}

/**
 * Функция удаления записи из таблицы
 * 
 * @param var $link идентификатор соединения
 * @param array $record ассоциативный массив
 * @return json ответ от сервера
 */
function delete($link, $record){
    $count = mysqli_query($link,"SELECT * FROM Users WHERE id = '{$record['id']}'");
    if(mysqli_num_rows($count)!=0){
        $q = mysqli_query($link, "DELETE FROM Users WHERE id = '{$record['id']}'");
        return json_encode('Success');
    }else{
        return json_encode("record with id = '".$record['id']."' not found!");
    }
}
/**
 * Функция получения данных из таблицы
 * 
 * @param var $link идентификатор соединения
 * @return json ответ от сервера
 */
function get($link){
    $queryrows = 'SELECT * FROM ' .'Users';
    $result = mysqli_query($link, $queryrows) or die("Error".mysqli_error($result));
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row; 
    }
    return json_encode($data);
}
/**
 * Функция обновления записи в таблице
 * 
 * @param var $link идентификатор соединения
 * @param array $record ассоциативный массив
 * @return json ответ от сервера
 */
function update($link, $record){
    if(empty($record['first_name']) || empty($record['second_name'])||empty($record['age'])
        ||empty($record['date_of_birth']))
        return json_encode('Write all the fields!');
    else{
        $query = "UPDATE Users SET first_name='{$record['first_name']}',second_name='{$record['second_name']}',age='{$record['age']}', date_of_birth='{$record['date_of_birth']}' WHERE id='{$record['id']}'";
        $q = mysqli_query($link, $query);
        return json_encode( $q ? 'Success' : 'Does not exist!');
    }
}
?>

