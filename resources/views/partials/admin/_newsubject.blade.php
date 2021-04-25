

<div class="modal fade mt-5" id="AddSubjectModal" tabindex="-1" role="dialog" 
    aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header bg-secondary">
                <h5 class="modal-title text-light" id="exampleModalLabel">Add New Subject</h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- end of modal header -->
            <form action="../database/addrecord/registerstudent.db.php" method="post">
                <!-- modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_code" autocomplete="off"
                            placeholder="Subject Code" required>
                    </div>
                   
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_des" autocomplete="off"
                            placeholder="Subject Description" required>
                    </div>
                   
                    <div class="form-group">
                        <input type="text" class="form-control" name="unit" autocomplete="off"
                            placeholder="Unit" required>
                    </div>         
                   
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
