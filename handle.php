<?php    
     function create($link, $record){
        $id = 'NULL';
        if(empty($record['first_name']) || empty($record['second_name'])||empty($record['age'])
            ||empty($record['date_of_birth']))
                return 'Write all the fields!';
        mysqli_query($link, "INSERT INTO Users(first_name, second_name, age, date_of_birth)".
		"VALUES('{$record['first_name']}', '{$record['second_name']}', '{$record['age']}', '{$record['date_of_birth']}');");
        return 'Success';
    }
    function delete($link, $record){
        $count = mysqli_query($link,"SELECT * FROM Users WHERE id = '{$record['id']}'");
        if(mysqli_num_rows($count)!=0){
            $q = mysqli_query($link, "DELETE FROM Users WHERE id = '{$record['id']}'");
            return 'Success!';
        }else{
            return "record with id = ".$record['id']." not found!";
        }
    }
    function get($link){
        $queryrows = 'SELECT * FROM ' .'Users';
        $result = mysqli_query($link, $queryrows) or die("Error".mysqli_error($result));
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row; 
        }
        return json_encode($data);
    }
    function update($link, $record){
        if(empty($record['first_name']) || empty($record['second_name'])||empty($record['age'])
            ||empty($record['date_of_birth']))
                return 'Write all the fields!';
        $query = "UPDATE Users SET first_name='{$record['first_name']}',second_name='{$record['second_name']}',
        age='{$record['age']}', date_of_birth='{$record['date_of_birth']}' WHERE id='{$record['id']}'";
        $q = mysqli_query($link, $query);
        return $q ? 'Success!' : 'Does not exist!';
    }
?>