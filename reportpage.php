<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการปฏิบัติงาน</h1>


                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php $datenow = date('Y-m-d'); ?>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <form method="post">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-2 col-form-label">ตั้งแต่</label>
                                            <div class="col-10">
                                                <input class="form-control" type="date" value="<?php echo $datenow ?>" id="example-date-input" name="ftime">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-2 col-form-label">ถึง</label>
                                            <div class="col-10">
                                                <input class="form-control" type="date" value="<?php echo $datenow ?>" id="example-date-input" name="ctime">
                                            </div>
                                        </div>
                                    </div>
                                 

                                    <div class="col-4"><input type="submit" name="submit" value="ค้นหา" class="btn btn-success ">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                            ส่งออกไฟล์
                                        </button>

                                    </div>

                                </div>

                            </form>

                            <?php

                            if (isset($_POST["submit"])) {
                                $ftime = $_POST["ftime"];
                                $ctime = $_POST["ctime"];
                                $sql = "SELECT * FROM timework a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp WHERE workdate between '$ftime' and '$ctime'";
                                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                $i = 1;
                            ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อพนักงาน</th>
                                            <th>ตำแหน่ง</th>
                                            <th>วันที่ทำงาน</th>
                                            <th>ชั่วโมงการทำงาน</th>


                                        </tr>
                                    </thead>


                                    <?php if ($query) {
                                        foreach ($query as $row) {
                                    ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['fname'], " ", $row['lname']; ?></td>
                                                    <td><?php echo $row['position']; ?></td>
                                                    <td><?php echo $row['workdate']; ?></td>
                                                    <td><?php echo $row['ttime']; ?> ชั่วโมง</td>
                                                </tr>
                                                <?php $i++; ?>

                                            </tbody>
                                    <?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                } else {
                                    $sql = "SELECT * FROM timework a LEFT JOIN emp_standard b ON a.id_emp = b.id_emp WHERE a.workdate < '$datenow' order by a.workdate desc";
                                    $query = mysqli_query($conn, $sql);
                                    $i = 1;
                                    ?>


                                    <table class="table table-hover">
                                        <thead class="font-effect-outline ">
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อพนักงาน</th>
                                                <th>ตำแหน่ง</th>
                                                <th>วันที่ทำงาน</th>
                                                <th>ชั่วโมงการทำงาน</th>


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
                                                        <td><?php echo $row['workdate']; ?></td>
                                                        <td><?php echo $row['ttime']; ?> ชั่วโมง</td>
                                                    </tr>
                                                    <?php $i++; ?>

                                                </tbody>
                                    <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                    }
                                    ?>

                                    </table>

                        </div>
                        <!--  /.card-body -->

                    </div>


                    <!-- /.content -->
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เลือกข้อมูลที่จะทำการส่งออก</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="pdf.php" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleSelect1">แผนก</label>
                                        <select class="form-control" id="exampleSelect1" name="position">
                                            <option value="">ทั้งหมด</option>
                                            <option value="ช่างเชื่อม">ช่างเชื่อม</option>
                                            <option value="สถาปัตยกรรม">สถาปัตยกรรม</option>
                                            <option value="การตลาด">การตลาด</option>
                                            <option value="บัญชี">บัญชี</option>
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-3 col-form-label">ตั้งแต่</label>
                                            <div class="col-9">
                                                <input class="form-control" type="date" value="<?php echo $datenow ?>" name="ftime" id="example-date-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-2 col-form-label">ถึง</label>
                                            <div class="col-10">
                                                <input class="form-control" type="date" value="<?php echo $datenow ?>" name="ctime" id="example-date-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>









            <!-- /.col -->