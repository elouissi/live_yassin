<?php

// function connectDatabase() {
//     $servername = 'localhost';
//     $username = 'root';
//     $password = '';
//     $dbname = 'task_db';

//     $mysqli = mysqli_connect($servername, $username, $password, $dbname);

//     if (!$mysqli) {
//         die("Connection failed: " . mysqli_connect_error());
//     }

//     // Set charset to UTF-8 for proper handling of international characters
//     mysqli_set_charset($mysqli, 'utf8mb4');

//     return $mysqli;
// }

function insertRecord($mysqli, $table, $data) {
    // Use prepared statements to prevent SQL injection
    $columns = implode(',', array_keys($data));
    $values = implode(',', array_fill(0, count($data), '?'));

    $sql = "INSERT INTO $table($columns) VALUES($values)";

    $stmt = mysqli_prepare($mysqli, $sql);

    if (!$stmt) {
        die("Error in prepared statement: " . mysqli_error($mysqli));
    }

    // Bind parameters to the prepared statement
    $types = str_repeat('s', count($data));
    $params = array_values($data);
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $result;
}

function updateRecord($mysqli, $table, $data, $id) {
    // Use prepared statements to prevent SQL injection
    $args = array();

    foreach ($data as $key => $value) {
        $args[] = "$key = ?";
    }

    $sql = "UPDATE $table SET " . implode(',', $args) . " WHERE id = ?";

    $stmt = mysqli_prepare($mysqli, $sql);

    if (!$stmt) {
        die("Error in prepared statement: " . mysqli_error($mysqli));
    }

    // Bind parameters to the prepared statement
    $types = str_repeat('s', count($data) + 1);
    $params = array_values($data);
    $params[] = $id;
    mysqli_stmt_bind_param($stmt, $types, ...$params);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $result;
}

function deleteRecord($mysqli, $table, $id) {
    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM $table WHERE id = ?";

    $stmt = mysqli_prepare($mysqli, $sql);

    if (!$stmt) {
        die("Error in prepared statement: " . mysqli_error($mysqli));
    }

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'i', $id);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $result;
}

function selectRecords($mysqli, $table, $columns = "*", $where = null) {
    // Use prepared statements to prevent SQL injection
    $sql = "SELECT $columns FROM $table";

    if ($where !== null) {
        $sql .= " WHERE $where";
    }

    $stmt = mysqli_prepare($mysqli, $sql);

    if (!$stmt) {
        die("Error in prepared statement: " . mysqli_error($mysqli));
    }

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $result;
}

// Usage example:

// $mysqli = connectDatabase();

// Insert example
// $insertData = array('column1' => 'value1', 'column2' => 'value2');
// insertRecord($mysqli, 'your_table', $insertData);

// // Update example
// $updateData = array('column1' => 'new_value1', 'column2' => 'new_value2');
// updateRecord($mysqli, 'your_table', $updateData, 1);

// // Delete example
// deleteRecord($mysqli, 'your_table', 1);

// // Select example
// $selectResult = selectRecords($mysqli, 'your_table', 'column1, column2', 'column1 = "value1"');

// // Process select result if needed
// while ($row = mysqli_fetch_assoc($selectResult)) {
//     // Process each row
// }

// // Close the connection
// mysqli_close($mysqli);

?>