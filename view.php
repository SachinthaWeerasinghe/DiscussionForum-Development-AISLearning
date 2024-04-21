<?php
include 'conn.php';
$data = array();
$sql = "SELECT * FROM `discussion` ORDER BY id DESC";
$result = $conn->query($sql);
while($row = $result->fetch()){
    $data[] = array(
        'id' => $row['id'],
        'parent_comment' => $row['parent_comment'],
        'student' => $row['student'],
        'post' => $row['post'],
        'date' => $row['date'],  
    );
}

echo json_encode($data);
$conn = null;
exit();

?>
