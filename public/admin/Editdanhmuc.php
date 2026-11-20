<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA NHÓM | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}


if(isset($_POST['LuuChuyenMuc']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    
    }
    $CMSNAV->update("danh_muc_tai_khoan", array(
         'noidung'   => check_string($_POST['chitiet']),
        'name'     => check_string($_POST['title']),
       
        'status'   => check_string($_POST['display'])
        
    ), " `id` = '".$row['id']."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-label"></i> Chỉnh sửa nhóm <?=$row['name'];?>
            </h1>
        
                <nav>
                    <ol class="breadcrumb mb-0">
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Chỉnh sửa danh mục 
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên nhóm</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" value="<?=$row['name'];?>" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                           
                            
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="display" required>
                                        <option value="<?=$row['status'];?>"><?=$row['status'];?></option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                                                        
                            <button type="submit" name="LuuChuyenMuc" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a type="button" href="<?=BASE_URL('Admin/Danhmuc');?>" 
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>

                            </a>
                        </form>
                    </div>
                </div>
            </div>
            </div>
                </div>
            </div>
           







<?php 
    require_once(__DIR__."/Footer.php");
?>