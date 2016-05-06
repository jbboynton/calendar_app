<!-- navbar.php
  HTML and/or Bootstrap code for the navbar, which should be displayed on every
  page. Contains the opening <body> tag, and the <nav> element. -->

  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#global-navbar" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand">Admin Toolkit</span>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="global-navbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href= <?php echo ABS_PATH."dashboard"; ?> >Home<span class="sr-only">(current)</span></a></li>
            <li><a href= <?php echo ABS_PATH."calendar"; ?> >Calendar</a></li>
            <li class="dropdown">
              <a "href=""?" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator Tools<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href= <?php echo ABS_PATH."manage/pending"; ?> >Needs attention</a></li>
                <li role="separator" class="divider"></li>
                <li><a href= <?php echo ABS_PATH."manage/master"; ?> >Manage global options</a></li>
                <li><a href= <?php echo ABS_PATH."manage/accounts"; ?> >Manage accounts</a></li>
                <li role="separator" class="divider"></li>
                <li><a href= <?php echo ABS_PATH."tools/reporting"; ?> >Reporting</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href= <?php echo ABS_PATH."options/account"; ?> >Account options</a></li>
                <li><a href= <?php echo ABS_PATH."options/calendar"; ?> >Calendar options</a></li>
              </ul>
            </li>
            <li><a href= <?php echo ABS_PATH."dashboard/logout"; ?> >Log out</a></li>
          </ul>
        </div><!-- End of .navbar-collapse -->
      </div><!-- End of .container-fluid -->
    </nav>
    <div class="render">
