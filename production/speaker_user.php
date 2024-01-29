<?php
require_once("../db-connect.php");
if (!isset($_GET["id"])) {
    $id = 0;
    echo "請由正常管道進入";
} else {
    $id = $_GET["id"];
}

// http://localhost/小專/production/speaker.php?id=5 (id=後面可以帶參數)
$sql = "SELECT * FROM speaker WHERE Speaker_ID=$id";
$result = $conn->query($sql);

//確定只有一筆資料(可使用fetch_assoc() 一維陣列)
$row = $result->fetch_assoc();

$rowCount = $result->num_rows; //result裡面有幾筆(num_rows)


?>


<!doctype html>
<html lang="en">

<head>
    <title>Speaker_user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- icon連結 https://cdnjs.com/libraries/font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .object-fit-cover {
            width: 100%;
            height: 100%;
            border: 2px solid #aaa;
            border-radius: 5%;
        }

        .box {
            width: 18rem;
            height: 22rem;
        }

        .card {
            width: 18rem;
            height: 22rem;
            overflow-y: overlay;
        }
    </style>
</head>

<body>
    <!-- 導入 https://getbootstrap.com/docs/5.3/components/modal/ 做確認刪除對話框 更改 id="confirmModal" -->

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">警示</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    確認刪除教師資料?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <a role="button" class="btn btn-danger" href="doDeleteSpeaker.php?id=<?=$row["Speaker_ID"]?>">確認</a>
                    <!-- 確認刪除連到 href="doDeleteSpeaker.php 做刪除動作 -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="h2 text-center">教師 <?= $row["Speaker_name"] ?> 個人資訊</div>
            <div class="box">
                <img src="Speaker_pic/<?= $row["Image"] ?>" class="object-fit-cover" alt="...">
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">姓名: <?= $row["Speaker_name"] ?></h5>
                    <p class="">
                    <h5>簡介: </h5><?= $row["Speaker_description"] ?></p>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-center py-3">
                <a name="" id="" class="btn btn-outline-secondary" href="speaker.php" role="button">返回教師列表</a>
                <!--button modal 做刪除-->
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">刪除 <i class="fa-solid fa-trash fa-fw"></i></button>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- 讀取jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>