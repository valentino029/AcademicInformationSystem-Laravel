<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="/home">
                    <i class="fa fa-fw fa-home"></i> <span>Home</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-book"></i>
                <span>Academic</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="/AcademicYears"><i class="fa fa-circle-o"></i> Academic Years</a></li>
                    <li><a href="/Semesters"><i class="fa fa-circle-o"></i> Semesters</a></li>
                    <li><a href="/Grades"><i class="fa fa-circle-o"></i> Grades</a></li>
                    <li><a href="/Majors"><i class="fa fa-circle-o"></i> Majors</a></li>
                    <li><a href="/AcademicSubjects"><i class="fa fa-circle-o"></i> Academic Subject</a></li>
                    <li><a href="/Classrooms"><i class="fa fa-circle-o"></i> Classroom Management</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-desktop"></i>
                <span>Teacher</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="/TeacherData"><i class="fa fa-circle-o"></i> Teacher Data</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-desktop"></i>
                <span>Student</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="/StudentData"><i class="fa fa-circle-o"></i> Student Data</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-group"></i>
                <span>Classroom</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="/ClassroomDetails"><i class="fa fa-circle-o"></i> Classroom Data</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-graduation-cap"></i>
                <span>Study Results</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="/Value"><i class="fa fa-circle-o"></i> Value</a></li>
                    <li><a href="/ValueByAdmin"><i class="fa fa-circle-o"></i> Value By Admin</a></li>
                    
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-lock"></i>
                <span>User Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="/TeacherAccount"><i class="fa fa-circle-o"></i> Teacher Account</a></li>
                    <li><a href="/StudentAccount"><i class="fa fa-circle-o"></i> Student Account</a></li>
                </ul>
            </li>
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>