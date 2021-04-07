<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการข้อมูลพนักงาน</h1>
                </div>
            

               
                
            <!-- /.col -->
            <div  class="col-sm-6" align="right"><button name="add" id="add" class="btn btn-primary " 
            data-toggle="modal" data-target="#addModal">เพิ่มข้อมูลพนักงาน</button></div>

            </div><!-- /.row -->
            
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="row">
        <div class="col">
            <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body p-0">

                    <?php
                    $sql = "SELECT * FROM  member a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp";
                    $query = mysqli_query($conn, $sql);
                    $i=1;
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ตำแหน่งงาน</th>
                                <th>ประเภทผู้ใช้งาน</th>
                                <th>*</th>
                            </tr>
                        </thead>

                        <?php
                        if ($query) {
                            foreach ($query as $row) {
                        ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $i ;?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['fname'] ," ", $row['lname']; ?></td>
                                        <td><?php echo $row['position']; ?></td>
                                        <td><?php echo $row['role']; ?></td>
                                        <td>
                                            <button type="button" name="view" value="view" 
                                             class="btn btn-info btn-xs view_data" 
                                             id="<?php echo $row['id_emp']?>" >รายละเอียด</button>

                                            <a href="update_modal.php?id=<?php echo $row['id_emp']?>" class="btn btn-success btn-xs">แก้ไขข้อมูล</a>

                                             <button type="button" name="view" value="view" 
                                             class="btn btn-danger btn-xs delete_data" 
                                             id="<?php echo $row['id_emp']?>" >ลบข้อมูล</button>
                                        </td>
                                    </tr>
                                    <?php  $i++; ?>
                                    

                                </tbody>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }

                        ?>

                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            
            <?php require 'view_modal.php' ?>
            <?php require 'insert_modal.php' ?>
            
            <!-- /.content -->
        </div>
    </div>
</div>

