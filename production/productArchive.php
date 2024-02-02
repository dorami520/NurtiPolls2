<?php
require_once "../db_connect.php";

// 初始化 WHERE 子句和 ORDER BY 子句
$whereClause = "WHERE product_image.sort_order = 0 AND product.valid=0";
$orderBY = "ORDER BY product.id ASC"; // 預設排序方式

// 檢查是否有分類過濾參數
if (isset($_GET['category']) && $_GET['category'] != '') {
    $category_id = $conn->real_escape_string($_GET['category']);
    $whereClause .= " AND product.category_id = '$category_id'";
}

// 檢查是否有排序參數
// if (isset($_GET["sort_by"])) {
//   $sortBy = $_GET["sort_by"];

//   switch ($sortBy) {
//     case 'id_asc':
//       $orderBY = "ORDER BY product.id ASC";
//       break;
//     case 'id_desc':
//       $orderBY = "ORDER BY product.id DESC";
//       break;
//     case 'price_asc':
//       $orderBY = "ORDER BY product.price ASC";
//       break;
//     case 'price_desc':
//       $orderBY = "ORDER BY product.price DESC";
//       break;
//     case 'date_asc':
//       $orderBY = "ORDER BY product.upload_date ASC";
//       break;
//     case 'date_desc':
//       $orderBY = "ORDER BY product.upload_date DESC";
//       break;
//   }
// }

// 構建 SQL 查詢
$sql = "SELECT
    product.*,
    product.id AS product_id,
    product.name AS product_name,
    (SELECT image_url FROM product_image WHERE F_product_id = product.id AND sort_order = 0 LIMIT 1) AS single_image_url,
    product_categories.Product_cate_ID AS category_id,
    product_categories.Product_cate_name AS category_name
FROM product
JOIN product_image ON product.id = product_image.F_product_id
JOIN product_categories ON product.category_id = product_categories.Product_cate_ID
{$whereClause}
{$orderBY}";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rowsCount = $result->num_rows;

// 取得所有分類
$sqlCategories = "SELECT Product_cate_ID, Product_cate_name FROM product_categories";
$resultCategories = $conn->query($sqlCategories);
$categories = $resultCategories->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>營養大選 Nutripoll</title>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- icon連結 https://cdnjs.com/libraries/font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="member.php"><i class="fa fa-table"></i> 會員管理
                                        <span class="fa fa-chevron-down"></span></a>
                                </li>
                                <li>
                                    <a href="product.php"><i class="fa fa-table"></i>商品管理
                                        <span class="fa fa-chevron-down"></span></a>
                                </li>
                                <li>
                                    <a><i class="fa fa-table"></i>分類管理<span class="fa fa-chevron-down"></span>
                                        <ul class="nav child_menu">
                                            <li><a href="categories_product.php">商品</a></li>
                                            <li><a href="categories_product.php">課程</a></li>
                                            <li><a href="categories_product.php">食譜</a></li>
                                        </ul>
                                    </a>
                                </li>
                                <li>
                                    <a href="recipe-list.php"><i class="fa fa-table"></i>食譜管理<span class="fa fa-chevron-down"></span></a>
                                </li>
                                <li>
                                    <a href="speaker.php"><i class="fa fa-table"></i>講師管理<span class="fa fa-chevron-down"></span></a>
                                </li>
                                <li>
                                    <a href="redirectClass.php"><i class="fa fa-table"></i>課程管理<span class="fa fa-chevron-down"></span></a>
                                </li>
                                <li>
                                    <a href="coupons.php"><i class="fa fa-table"></i>優惠卷管理<span class="fa fa-chevron-down"></span></a>
                                </li>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">

                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt="">John Doe
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title row justify-content-start align-items-center">
                                    <span><a href="product.php" class="btn btn-secondary mt-1 ml-3"><i class="fa-solid fa-house fa-fw"></i></a></span>
                                    <h1 class="col-auto">管理下架商品<small></small></h1>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row  justify-content-between align-items-center">
                                        <div class="d-flex align-items-center m-3">
                                            <form action="" method="get">
                                                <select class="form-select form-select-sm form-control" aria-label="Small select example" name="category" onchange="this.form.submit()">
                                                    <option value="">全部</option>
                                                    <option selected>分類</option>
                                                    <?php foreach ($categories as $category): ?>
                                                        <option value="<?=htmlspecialchars($category["Product_cate_ID"])?>" <?=(isset($_GET['category']) && $_GET['category'] == $category["Product_cate_ID"]) ? 'selected' : ''?>>
                                                            <?=htmlspecialchars($category["Product_cate_name"])?>
                                                        </option>
                                                    <?php endforeach;?>
                                                </select>
                                            </form>
                                            <!-- <div class="col-2">
                                            <div class="input input-group-sm mb-3 ">
                                                <input type="number" name="price_min" class="form-control" placeholder="最低價格">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div>~</div>
                                        </div>
                                        <div class="col-2">
                                            <div class="input input-group-sm mb-3 ">
                                                <input type="number" class="form-control" name="price_max" placeholder="最高價格">
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <button type="submit" class="btn-sm btn-secondary" name="price">
                                                價格篩選
                                            </button>

                                        </div>
                                        <div class="col-auto">

                                            <li class="list-unstyled"><a href="addProduct.php" class="btn btn-sm btn-secondary">
                                                    新增商品
                                                </a></li>

                                        </div>
                                        <div class="col-auto">
                                            <li class="list-unstyled"><a href="addProduct.php" class="btn btn-sm btn-secondary" name="addProduct">
                                                    管理下架商品
                                                </a></li>

                                        </div> -->
                                        </div>
                                        </form>
                                        <div class="col-auto">
                                            <h5>共<?=$rowsCount?> 筆資料</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <!-- <p class="text-muted font-13 m-b-30"></p> -->

                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="h6">編號</th>
                                                    <th class="h6">圖片</th>
                                                    <th class="h6">商品名稱</th>
                                                    <th class="h6">種類</th>
                                                    <th class="h6">最後更新時間</th>
                                                    <th class="h6">價格</th>
                                                    <th class="h6">庫存</th>
                                                    <th class="h6"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($rows as $product): ?>
                                                    <?php $imagePath = './p_image/' . $product['single_image_url'];?>
                                                    <tr>
                                                        <td class="h6"><?=$product["product_id"]?></td>
                                                        <td class="h6"><img src="<?=$imagePath?>" style="width: 100px; height: auto;" alt="<?=$product["product_name"]?> " class="object-fit"></td>
                                                        <td class="h6"><?=$product["product_name"]?></td>
                                                        <td class="h6"><?=$product["category_name"]?></td>
                                                        <td class="h6"><?=$product["upload_date"]?></td>
                                                        <td class="h6">$ <?=$product["price"]?></td>
                                                        <td class="h6"><?=$product["stock_quantity"]?></td>
                                                        <td class="h6">
                                                            <form action="editProduct.php" method="post">
                                                                <input type="hidden" name="product_id" value="<?=$product["product_id"]?>">
                                                                <a href="./productArchiveEdit.php?product_id=<?=$product["product_id"]?>" type=" submit" class="btn btn-secondary"><i class="fa fa-pencil fa-fw"></i></a>
                                                            </form>

                                                            <input type="hidden" name="product_id" value="<?=$product["product_id"]?>">
                                                            <!-- 删除按钮，触发模态框 -->

                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>


    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>
<!-- 模态框 -->



</html>