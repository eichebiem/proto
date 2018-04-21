<aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
          <div class="pull-left image">
          <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{ $year->year }} | {{ $year->semester }}</a>
          </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
               </span>
          </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>


          <li>
          <a href="/home">
               <i class="fa fa-home"></i>
               <span>Home</span>
               <span class="pull-right-container">
               </span>
          </a>
          </li>


          <li class="treeview">
          <a href="#">
               <i class="fa fa-bank"></i>
               <span>Enrollment</span>
               <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
               </span>
          </a>
          <ul class="treeview-menu">

               <li><a href="#">Enroll New Student</a></li>

               <li><a href="#">Add Student Subject</a></li>

               <li><a href="#">Drop Subject</a></li>

               <li><a href="#">Change Subject</a></li>

               <li><a href="#">Student Record</a></li>

          </ul>
          </li>


          <li class="treeview">
          <a href="#">
               <i class="fa fa-bell"></i> <span>Reminders</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
          </a>
          <ul class="treeview-menu">

               <li><a href="/reminders/create">Create Reminder</a></li>

               <li><a href="/reminders">Reminder's Panel</a></li>

          </ul>
          </li>


          <li>
          <a href="/acadyear">
               <i class="fa fa-bar-chart-o"></i>
               <span>Academic Year</span>
               <span class="pull-right-container">
               </span>
          </a>
          </li>


          <li>
          <a href="#">
               <i class="fa fa-money"></i>
               <span>Fees</span>
               <span class="pull-right-container">
               </span>
          </a>
          </li>


          <li class="treeview">
          <a href="#">
               <i class="fa fa-gears"></i> <span>Settings</span>
               <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
               </span>
          </a>
          <ul class="treeview-menu">

               <li><a href="/settings/room">Room</a></li>

               <li><a href="/settings/program">Program</a></li>

               <li><a href="/settings/curriculum">Curriculum</a></li>

               <li><a href="#">Grade</a></li>

          </ul>
          </li>
          

          </ul>
     </section>
     <!-- /.sidebar -->
</aside>