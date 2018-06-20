 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
   
   

 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('public/admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{url('public/admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <!-- <meta name="_token" content="{{ csrf_token() }}"/> -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">



  
   
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
<script type="text/javascript">
    // These variables are created here so that they can be used inside .js files
    var APP_URL = {!! json_encode(url('/')) !!}
    
  </script> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  
  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('public/admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
             
              <!-- Menu Body -->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
              <!-- Menu Footer-->
              
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('public/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          
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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> Dashboard
           
          </a>
          
        <!-- About Us -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>About Us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
            
            <li><a href="{{url('see-about-our-company')}}"><i class="fa fa-book"></i> <span>Our Company</span></a></li>
            <li><a href="{{url('see-all-team-member')}}"><i class="fa fa-book"></i> <span>Our Team</span></a></li>
            <li><a href="{{url('see-our-missionandvalue')}}"><i class="fa fa-book"></i> <span>Our Mission And Values</span></a></li>
            <li><a href="{{url('see-our-story')}}"><i class="fa fa-book"></i> <span>Our Story</span></a></li>
            <li><a href="{{url('see-partner')}}"><i class="fa fa-book"></i> <span>Our Partner</span></a></li>
            
         
           
            
           
            
            
            
</ul>
</li>
        <!-- end -->
          
        <li><a href="{{url('see-all-business')}}"><i class="fa fa-book"></i> <span>Our Business</span></a></li>
        <li><a href="{{url('see-all-what-we-do')}}"><i class="fa fa-book"></i> <span>What We Do</span></a></li>
        <li><a href="{{url('see-all-where-we-work')}}"><i class="fa fa-book"></i> <span>Where We Work</span></a></li>
        <li><a href="{{url('see-our-service')}}"><i class="fa fa-book"></i> <span>Our Services</span></a></li>
        <li><a href="{{url('see-all-blogs')}}"><i class="fa fa-book"></i> <span>Blog</span></a></li>
        <li><a href="{{url('see-all-news')}}"><i class="fa fa-book"></i> <span>News</span></a></li>
        <li><a href="{{url('see-all-jobs')}}"><i class="fa fa-book"></i> <span>Add a Job</span></a></li>
        <li><a href="{{url('see-all-research')}}"><i class="fa fa-book"></i> <span>Research</span></a></li>
        <li><a href="{{url('see-all-event')}}"><i class="fa fa-book"></i> <span>Events</span></a></li>
        <li><a href="{{url('see-all-case-study')}}"><i class="fa fa-book"></i> <span>Case Studies</span></a></li>
        <li><a href="{{url('see-all-slider-image')}}"><i class="fa fa-book"></i> <span>Slider Image</span></a></li>
        <li><a href="{{url('see-all-books')}}"><i class="fa fa-book"></i> <span>Books</span></a></li>
        <li><a href="{{url('see-all-video')}}"><i class="fa fa-book"></i> <span>Videos</span></a></li>
        @if(Auth::user()->power==1)
        <li><a href="{{url('see-all-admins')}}"><i class="fa fa-book"></i> <span>Admins</span></a></li>
      
      @endif

      

        
        
        
        
        
        
        

        

        
       
        
        
        
        
        
      </ul>
    </section>

    <!-- /.sidebar -->
  </aside>


 <!-- Content Content-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    
    @yield('dashboard')
    
   <section class="content"> 
    @yield('addcontent')

   
    <div class="row">
      @yield('index')
   
     <section class="col-lg-7 connectedSortable">


     </section>
      <section class="col-lg-5 connectedSortable">
      
      </section>
    </div>
   </section>
  </div>



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('public/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('public/admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{url('public/admin/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url('public/admin/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('public/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('public/admin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('public/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- FastClick -->
<script src="{{url('public/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{url('public/admin/dist/js/custom.js')}}"></script>
<script src="{{url('public/admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('public/admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script src="{{url('public/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('public/admin/dist/js/pages/dashboard.js')}}"></script>
<script src="{{url('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('public/admin/dist/js/demo.js')}}"></script>

<script src="{{url('public/admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{url('public/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{url('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>




<script>
  $(function () {
    $('#news-table').DataTable()
     $('#example2').DataTable({
       'paging'      : true,
      'lengthChange': false,
       'searching'   : true,
       'ordering'    : true,
       'info'        : true,
       'autoWidth'   : false
     })
   })

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

  $(document).ready(function(){ 
     $(".alertDismissible").fadeTo(2000, 500).slideUp(500, function(){
         $(".alertDismissible").slideUp(600);
       });
  });
</script>
<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script> 
</body>
</html>
