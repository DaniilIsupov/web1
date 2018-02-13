<?php
/**
 * Validation of input paramerers.
 * 
 * This method will call then the server accepts parameters for editing and adding record .
 * 
 * For example, adding new user in the table: 
 * 
 * ```php
 *  $answer = chek_incorrect_input($record);
 *  if($answer!='complete')
 *      return  json_encode($answer);
 *  else    
 *      sending request to database
 * ```
 * 
 * @param array $record to generate a request to database.
 * $record contains:
 *  First name of user
 *  Second name of user
 *  Age of user
 *  Date of birth user
 * @return string message which contains error if validation not pass or success if validation passed.
 */
function chek_incorrect_input($record){
    if(!preg_match('#^\p{L}+$#u', $record['first_name']))
        return ('First name entered incorrectly');
    if(!preg_match('#^\p{L}+$#u', $record['second_name']))
        return ('Second name entered incorrectly');
    if(!preg_match('#^\d+$#',$record['age']))
        return ('Age entered incorrectly');
    if(!preg_match('/\d{4}-\d{2}-\d{2}/', $record['date_of_birth']))
        return ('Date entered incorrectly');
    return 'complete';
}


/**
 * Getting the last user added.
 * 
 * This method will call then you need to get last user in the table.
 * 
 * For examlpe, to get added user (this user have the biggest id):
 * 
 * ```php
 * $last_user = get_last_user($mysqli);
 * ```
 * @param var $mysqli object representing the connection to the MySQL server.
 *  
 * @return array $records last added user.
 */
function get_last_user($mysqli)
{
    $result = $mysqli->query("SELECT * FROM Users ORDER BY id DESC LIMIT 1") or
    die("Error" . $result->error);
    if ($records = $result->fetch_assoc()) {
        return $records;
    }
}
/**
 * Create a new user in users table.
 *
 * This method will call when you nedd to created new user in table.
 * 
 * For example:
 * 
 * ```php
 * $record = array(
 *      'first_name'=>$first_name, 
 *      'second_name'=>$second_name, 
 *      'age'=>$age, 
 *      'date_of_birth'=>$date_of_birth);
 * add($mysqli, $record);
 * ```
 * 
 * @param var $mysqli object representing the connection to the MySQL server.
 * @param array $record user data array to be added to the table.
 * 
 * @return array $result the data array containing the status of the request and the created record.
 */
function create($mysqli, $record)
{
    $answer = chek_incorrect_input($record);
    if ($answer != 'complete'){
        return json_encode(array(
            'status' => $answer)
        );
    }
    $mysqli->query("INSERT INTO Users(first_name, second_name, age,date_of_birth)".
        "VALUES('{$record['first_name']}','{$record['second_name']}','{$record['age']}','{$record['date_of_birth']}');");
    $result = json_encode(array(
        'status' => 'Success',
        'user' => get_last_user($mysqli))
    );
    return $result;
}

/**
 * Removing a user from a users Table
 * 
 * This method is called when you want to delete a user record
 * 
 * For example:
 * 
 * ```php
 * $record = array('id'=>$id);
 * del($mysqli, $data);
 * ```
 * 
 * @param  var $mysqli object representing the connection to the MySQL server.
 * @param array $record an array containing the user id that you want to delete
 * @return array $result a data array containing the status of the request
 */
function delete($mysqli, $record)
{
    if(!preg_match('#^\d+$#',$record['id'])){
        $result = json_encode('Id entered incorrectly');
        return $result;
        }
    $count = $mysqli->query("SELECT * FROM Users WHERE id = '{$record['id']}'");
    if (mysqli_num_rows($count) != 0) {
        $q = $mysqli->query("DELETE FROM Users WHERE id = '{$record['id']}'");
        $result = json_encode('Success');
        return $result;
    } else {
        $result = json_encode("Record with id = '" . $record['id'] . "' not found!");
        return $result;
        }
}
/**
 * Getting user data from a users table.
 * 
 * This method is called when it is necessary to get all the user data from the table users.
 * 
 * For example:
 * 
 * ```php
 *   $all_users = display($mysqli);
 * ```
 * 
 * @param var $mysqli object representing the connection to the MySQL server.
 * @return array $records contains all records about users from the table.
 */
function get($mysqli)
{
    $result = $mysqli->query('SELECT * FROM Users') or
    die("Error" . $result->error);
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
    return json_encode($records);
}

/**
 * Updating user data from the users table.
 * 
 * This method is called when you need to change the user's data in a table.
 * 
 * For example:
 * 
  * ```php
 * $record = array(
 *      'id' => $id,
 *      'first_name' => $first_name, 
 *      'second_name' => $second_name, 
 *      'age' => $age, 
 *      'date_of_birth' => $date_of_birth);
 * update($mysqli, $record);
 * ```
 * 
 * @param var $mysqli object representing the connection to the MySQL server.
 * @param array $record user data that you want to change in the table.
 * 
 * @return array $result returns status of request/
 */
function update($mysqli, $record)
{
    if(!preg_match('#^\d+$#',$record['id'])){
        $result = json_encode('Id entered incorrectly');}
        return $result;
    $answer = chek_incorrect_input($record);
    if ($answer != 'complete'){
        $result = json_encode($answer);
        return $result;
    } else {
        $count = $mysqli->query("SELECT * FROM Users WHERE id = '{$record['id']}'");
        if (mysqli_num_rows($count) != 0) {
            $q = $mysqli->query("UPDATE Users SET first_name='{$record['first_name']}',second_name='{$record['second_name']}',age='{$record['age']}',
                date_of_birth='{$record['date_of_birth']}' WHERE id='{$record['id']}'");
            $result = json_encode($q ? 'Success' : 'Does not exist!');
            return $result;
        } else {
            $result = json_encode("Record with id = '" . $record['id'] . "' not found!");
            return $result;
        }
    }
}
