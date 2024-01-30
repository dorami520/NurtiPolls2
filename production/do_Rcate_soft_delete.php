<?php

require_once "../db_connect.php";

if (isset($_POST["Recipe_cate_ID"])) {
    $id = $_POST["Recipe_cate_ID"];

    $sql = "UPDATE recipe_categories SET valid=0 WHERE Recipe_cate_ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "刪除成功";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

header("Location: categories_recipe_edit.php");