

<div class="modal fade mt-5" id="AddStudentModal" tabindex="-1" role="dialog" 
    aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header bg-secondary">
                <h5 class="modal-title text-light" id="exampleModalLabel">Add New Student</h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- end of modal header -->
            <form action="../database/addrecord/registerstudent.db.php" method="post">
                <!-- modal body -->
                <div class="modal-body">
                    <!-- text box student id -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="studentid" autocomplete="off"
                            placeholder="Student Id" required>
                    </div>
                    <!-- end student id -->
                    
                    <!-- text box first name -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" autocomplete="off"
                            placeholder="Name" required>
                    </div>
                    <!-- end first name -->

                    <!-- selection for gender -->
                    <div class="form-group">
                        <select name="gender" id="gender" class="form-control" required>
                            <option>Gender</option>
                            <option value="male" >Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <!-- end of selection gender -->
                   
                    <!-- text box contact-->
                    <div class="form-group">
                        <input type="tel" class="form-control" name="contact" autocomplete="off"
                            placeholder="Cellphone #"  pattern="[0-9]{11}" required>
                    </div>
                    <!-- end of contact -->
                    <!-- text box address -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" autocomplete="off"
                            placeholder="Address" required>
                    </div>
                    <!-- end address -->
                    <!-- selection of course -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="course" autocomplete="off"
                            placeholder="Coure" required>
                    </div>         
                    <!-- end of course selection -->
                </div>
                <!-- end of modal body -->

                <!-- modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" name="ok">Add</button>
                </div>
                    <!-- end of modal footer -->
            </form>
        </div>
    </div>
</div>
