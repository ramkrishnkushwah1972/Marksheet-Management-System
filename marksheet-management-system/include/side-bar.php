
<div class="left-sidebar box-shadow">
                        <div class="sidebar-content ">
                            
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                     <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li> 
                                    <li>
                                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                     
                                    </li>

                                    <!-- <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li> -->
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bank"></i> <span>Classes</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create_class.php"><i class="fa fa-bars"></i> <span>Add Class</span></a></li>
                                            <li><a href="manage_class.php"><i class="fa fa fa-server"></i> <span>Manage Classes</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add_subject.php"><i class="fa fa-bars"></i> <span>Add Subject</span></a></li>
                                            <li><a href="manage_subject.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                                           </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add_student.php"><i class="fa fa-bars"></i> <span>Add Student</span></a></li>
                                            <li><a href="manage_student.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>
                                           
                                        </ul>
                                    </li>
<li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Result</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add_result.php"><i class="fa fa-bars"></i> <span>Add Results</span></a></li>
                                            <li><a href="manage_result.php"><i class="fa fa fa-server"></i> <span>Manage Results</span></a></li>
                                           
                                        </ul>
                                        <li><a href="change_password.php"><i class="fa fa fa-server"></i> <span> Admin Change Password</span></a></li>
                                        
                                        <li><a href="#" data-toggle="modal" data-target="#student_information"><i class="fa fa fa-search"></i> <span> Search Student Information</span></a></li>
                                           
                                </ul>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div> 
<div class="modal fade" id="student_information">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <p>Search Student Information</p>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="std_info.php" method="POST">
<div class="form-group">
<label for="rollid">Student Roll no.</label>
<input type="text" class="form-control" id="rollid" placeholder="Enter Student Roll no." autocomplete="off" name="rollNo" required="required">
</div>
   
<div class="form-group mt-20">    
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          
<button type="submit" name="register" class="btn btn-success btn-labeled pull-right">Search</button>
     <div class="clearfix"></div>
</div>
</form>
        </div>
        
      </div>
    </div>
  </div>                   