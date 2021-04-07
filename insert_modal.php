<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>บันทึกข้อมูลพนักงาน</h3>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="post" action="insert.php">
                    <input type="hidden" id='id_check' name='id_check' />
                    <label>รหัสพนักงาน</label>
                    <input type="text" name='id_emp' id='id_emp' class="form-control" required />
                    <label>ชื่อผู้ใช้งาน</label>
                    <input type="text" id='username' name='username' class="form-control" required />
                    <label>รหัสผ่าน</label>
                    <input type="password" id='password' name='password' class="form-control" required />

                    <label>ตำแหน่งงาน</label>
                    <select class="form-select" aria-label="Default select example" name="position">
                        <option selected>โปรดเลือก...</option>
                        <option value="ช่างเชื่อม">ช่างเชื่อม</option>
                        <option value="สถาปัตยกรรม">สถาปัตยกรรม</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="บัญชี">บัญชี</option>
                        <option value="ผู้บริหาร">ผู้บริหาร</option>
                    </select>

                    <label>คำนำหน้า</label>
                    <select class="form-select" aria-label="Default select example" name="perfix">
                        <option selected>โปรดเลือก...</option>
                        <option value="นาย">นาย</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="นาง">นาง</option>

                    </select>
                    <label>ชื่อเล่น</label>
                    <input type="text" id='nname' name='nname' class="form-control" required />
                    <label>ชื่อ</label>
                    <input type="text" id='fname' name='fname' class="form-control" required />
                    <label>นามสกุล</label>
                    <input type="text" id='lname' name='lname' class="form-control" required />
                    <label>เบอร์โทรศัพท์</label>
                    <input type="tel" maxlength="10" id='tel' name='tel' class="form-control"  placeholder="094XXXXXXX" OnKeyPress="return chkNumber(this)" required />
                    <hr>

                    <div class="form-group">
                        <label for="inputAddress">ที่อยุ่ *</label>
                        <input type="text" class="form-control" id="hose" name="hose" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">ตำบล *</label>
                            <input type="text" class="form-control" id="supdistrict" name="supdistrict" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">อำเภอ *</label>
                            <input type="text" class="form-control" id="district" name="district" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">จังหวัด *</label>
                            <input type="text" class="form-control" id="province" name="province" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress">ไปรษณีย์ *</label>
                        <input type="text" class="form-control" id="PostalCode" maxlength="5" name="PostalCode" OnKeyPress="return chkNumber(this)" required>
                    </div>


                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">วันเกิด</label>

                        <input class="form-control" type="date" id="b_date" name='b_date'>

                    </div>

                    <label>ประเภทผู้ใช้งาน</label>
                    <div class="row">
                        <div class="col-3">
                            <div class="icheck-primary">
                                <input class="form-check-input" type="radio" name="role" value="admin" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    ผู้ดูแลระบบ
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icheck-primary">
                                <input class="form-check-input" type="radio" name="role" value="employee" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    พนักงาน
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icheck-primary">
                                <input class="form-check-input" type="radio" name="role" value="ceo" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    ผู้บริหาร
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <input type="submit" id="insert" class="btn btn-success"  />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>

</div>