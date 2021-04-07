<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-2">สถานะการมาทำงาน</h1>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <?php $timenow = date('H:i:s');
                                $datenow = date('y-m-d');


                                ?>

                                <h3 class="card-title">
                                    <?php $strDate = $datenow;
                                    echo "ข้อมูลพนักงานที่มาทำงาน วันที่ " . DateThai($strDate); ?> </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">

                                <?php
                                include 'connection.php';
                                $sql = "SELECT * FROM  member a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp 
                                   LEFT JOIN timework c on b.id_emp = c.id_emp 
                                    where a.status = 0 AND a.role = 'employee'";

                                $query = mysqli_query($conn, $sql);
                                $i = 1;

                                ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อพนักงาน</th>
                                            <th>ตำแหน่ง</th>
                                            <th>สถานะ</th>


                                        </tr>
                                    </thead>

                                    <?php
                                    if ($query) {
                                        foreach ($query as $row) {
                                    ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['fname'], " ", $row['lname']; ?></td>
                                                    <td><?php echo $row['position']; ?></td>
                                                    <td><button type="button" class="btn btn-danger">ออฟไลน์</button></td>


                                                </tr>
                                                <?php $i++; ?>

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


                        <!-- /.content -->
                    </div>
                </div>



                <!-- /.col -->


            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->