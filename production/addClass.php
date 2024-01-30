<?php
require_once("/xampp/htdocs/project/php_connect/db_connect.php");

//join class and speaker
$sql = "SELECT * FROM speaker";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>營養大選NutriPolls | 新增課程</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

  <!-- Bootstrap 5.3.2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <style>
    .form-content {
      width: 800px;
      margin-inline: auto;
    }

    .classDescription {
      width: 100%;
      height: 80px;
    }

    /* .fullPage {
      height: calc(100vh - 50px);
    } */
  </style>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><span>營養大選NutriPolls</span></a>
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
                <!-- <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li> -->
                <!-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li> -->
                <!-- <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li> -->
                <li><a href="tables_dynamic.php"><i class="fa fa-table"></i> 會員管理 <span class="fa fa-chevron-down"></span></a>
                </li>
                <li><a href="tables_dynamic.php"><i class="fa fa-table"></i>商品管理 <span class="fa fa-chevron-down"></span></a>
                </li>
                <li><a href="tables_dynamic.php"><i class="fa fa-table"></i>分類管理<span class="fa fa-chevron-down"></span></a>
                </li>
                <li><a href="tables_dynamic.php"><i class="fa fa-table"></i>食譜管理<span class="fa fa-chevron-down"></span></a>
                </li>
                <li><a href="tables_dynamic.php"><i class="fa fa-table"></i>講師管理<span class="fa fa-chevron-down"></span></a>
                </li>
                <li><a><i class="fa fa-table"></i> 課程管理 <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li class="<?php if ($Class_cate_ID == "") echo "active" ?>"><a href="class_new.php?Class_cate_ID=">所有類別</a></li>
                    <?php foreach ($rowsClassCategories as $rowClassCategories) : ?>
                      <li class="<?php if ($rowClassCategories["Class_cate_ID"] == $Class_cate_ID) echo "active" ?>"><a href="class_new.php?Class_cate_ID=<?= $rowClassCategories["Class_cate_ID"] ?>"><?= $rowClassCategories["Class_cate_name"] ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </li>
                <li><a href="tables_dynamic.php"><i class="fa fa-table"></i>優惠卷管理<span class="fa fa-chevron-down"></span></a>
                </li>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a> -->
            <!-- <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
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

            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col fullPage" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h1>新增課程 <!-- <small>Users</small> --> </h1>
                <div class="clearfix"></div>
              </div>

              <!-- 表單內容 -->
              <div class="form-content row g-2 ">
                <div class="col-12 mb-3">
                  <label for="className" class="form-label">課程名稱</label>
                  <input type="text" class="form-control" id="className" name="className">
                </div>


                <div class="col-6 mb-3">
                  <!-- <label for="classCategory" class="form-label">課程類別</label>
                    <input type="text" class="form-control" id="classCategory" name="classCategory" required> -->
                  <label for="classCategory" class="form-label">課程類別</label>
                  <select name="classCategory" id="classCategory" class="form-select" required>
                    <option value="">請選擇類別</option>
                    <option value="1">台式料理</option>
                    <option value="2">中式料理</option>
                    <option value="3">西式料理</option>
                    <option value="4">異國料理</option>
                    <option value="5">健康養生/素食</option>
                    <option value="6">烘焙/點心</option>
                  </select>

                </div>

                <div class="col-6 mb-3">
                  <label for="speaker" class="form-label">講師名稱</label>
                  <!-- <input type="text" class="form-control" id="speaker" name="speaker" required> -->
                  <select name="speaker" id="speaker" class="form-select" required>
                    <option value="">請選擇講師</option>
                    <?php foreach ($rows as $row) : ?>
                      <option value="<?= $row["Speaker_ID"] ?>"><?= $row["Speaker_name"] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-6 mb-3">
                  <label for="classPrice" class="form-label">課程價格</label>
                  <input type="number" class="form-control" id="classPrice" name="classPrice" required>
                </div>
                <div class="col-6 mb-3">
                  <label for="personLimit" class="form-label">名額限制</label>
                  <input type="number" class="form-control" id="personLimit" name="personLimit" required>
                </div>

                <div class="col-4 mb-3">
                  <label for="startDate" class="form-label">報名起始</label>
                  <input type="date" class="form-control" id="startDate" name="startDate" required>
                </div>

                <div class="col-4 mb-3">
                  <label for="endDate" class="form-label">報名截止</label>
                  <input type="date" class="form-control" id="endDate" name="endDate" required>
                </div>

                <div class="col-4 mb-3">
                  <label for="classDate" class="form-label">開課日期</label>
                  <input type="date" class="form-control" id="classDate" name="classDate" required>
                </div>

                <div class="col-12 mb-3">
                  <label for="classDescription" class="form-label">課程敘述</label>
                  <textarea class="classDescription" name="classDescription" id="classDescription" required></textarea>
                </div>

                <div class="col-6 mb-3">
                  <label for="fileUpload" class="form-label">課程圖片</label>
                  <div></div>
                  <input type="file" id="fileUpload" name="fileUpload" required>
                </div>

                <div class="col-12"></div>

                <div class="col-3 m-auto">
                  <button type="submit" class="btn btn-info text-light" id="submit">
                    送出
                  </button>
                  <a href="class_new.php?Class_cate_ID=&status=1&min=0&max=99999" class="btn btn-danger text-white">
                    取消
                  </a>
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

  <script>
    const submit = document.querySelector("#submit");
    const className = document.querySelector("#className");
    const classCategory = document.querySelector("#classCategory");
    const speaker = document.querySelector("#speaker");
    const classPrice = document.querySelector("#classPrice");
    const personLimit = document.querySelector("#personLimit");
    const startDate = document.querySelector("#startDate");
    const endDate = document.querySelector("#endDate");
    const classDate = document.querySelector("#classDate");
    const classDescription = document.querySelector("#classDescription");
    const fileUpload = document.querySelector("#fileUpload");



    submit.addEventListener("click", function() {
      // console.log("click");
      classNameVal = className.value;
      classCategoryVal = classCategory.value;
      speakerVal = speaker.value;
      classPriceVal = classPrice.value;
      personLimitVal = personLimit.value;
      startDateVal = startDate.value;
      endDateVal = endDate.value;
      classDateVal = classDate.value;
      classDescriptionVal = classDescription.value;
      fileUploadVal = fileUpload.value;


      $.ajax({
          method: "POST", //or GET
          url: "doAddClass.php", //url放要串的api的檔案位置
          dataType: "json",
          data: {
            className: classNameVal,
            classCategory: classCategoryVal,
            speaker: speakerVal,
            classPrice: classPriceVal,
            personLimit: personLimitVal,
            startDate: startDateVal,
            endDate: endDateVal,
            classDate: classDateVal,
            classDescription: classDescriptionVal,
            fileUpload: fileUploadVal
          }
        })
        .done(function(response) {
          console.log(response);
          // status = response.status;
          // message = response.message;
          if (response.status == 0) {
            alert(response.message);
            return;
          }

          console.log(response);
          // alert("課程ID: " + response.id + " , 名稱: " + response.className + " 新增成功");
          // alert("課程ID: " + response.id + " 新增成功");


        }).fail(function(jqXHR, textStatus) {
          console.log("Request failed: " + textStatus);
        });

    });
  </script>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>