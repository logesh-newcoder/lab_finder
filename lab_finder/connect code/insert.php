<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "lab";
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Error in connection: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO lab_4 (class_id, class_info, update_date) VALUES 
    ('101', 'info about class 101', CURDATE()), 
    ('102', 'info about class 102', CURDATE()), 
    ('103', 'info about class 103', CURDATE()), 
    ('104', 'info about class 104', CURDATE()), 
    ('105', 'info about class 105', CURDATE()), 
    ('106', 'info about class 106', CURDATE()), 
    ('107', 'info about class 107', CURDATE()), 
    ('108', 'info about class 108', CURDATE()), 
    ('109', 'info about class 109', CURDATE()), 
    ('110', 'info about class 110', CURDATE()), 
    ('111', 'info about class 111', CURDATE()), 
    ('112', 'info about class 112', CURDATE()), 
    ('113', 'info about class 113', CURDATE()), 
    ('114', 'info about class 114', CURDATE()), 
    ('115', 'info about class 115', CURDATE()), 
    ('116', 'info about class 116', CURDATE()), 
    ('117', 'info about class 117', CURDATE()), 
    ('118', 'info about class 118', CURDATE()), 
    ('119', 'info about class 119', CURDATE()), 
    ('120', 'info about class 120', CURDATE()), 
    ('121', 'info about class 121', CURDATE()), 
    ('122', 'info about class 122', CURDATE()), 
    ('123', 'info about class 123', CURDATE()), 
    ('124', 'info about class 124', CURDATE()), 
    ('125', 'info about class 125', CURDATE()), 
    ('126', 'info about class 126', CURDATE()), 
    ('127', 'info about class 127', CURDATE()), 
    ('128', 'info about class 128', CURDATE()), 
    ('129', 'info about class 129', CURDATE()), 
    ('130', 'info about class 130', CURDATE());";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>