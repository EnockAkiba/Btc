<style>
  * a{
    text-decoration: none;
  }
</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-green-400 font-bold" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= EE ?>Actualites" class="nav-link  ">Actualites</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= EE ?>Messages" class="nav-link">  <span class="badge badge-danger navbar-badge" id='countMessage'></span> Nouveau Message</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu 
        <li class="nav-item dropdown">
          <a class="nav-link text-green" data-toggle="dropdown" href="<?= EE?>Messages">
            <i class="far fa-comments"></i>
          
          </a>
        add all message -->
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
         <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-user"></i>
              En ligne
        </a>
      </li>  
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar bg-light elevation-4">
      <!-- Brand Logo -->
      <a href="<?= EE ?>Actualites" class="brand-link">
        <img src="<?= EE ?>app/public/photos/img/logo.png" alt="btcLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BTC Management</span>
      </a>

      <?php require_once 'navigation.blade.php' ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-body p-4" style=" height: 85vh; overflow: auto;">

    <script>
        // $('#countMessage').addClass("d-none");

        // setInterval(() => {
        //     checkNewMessage();
        // }, 4000);

        // function checkNewMessage() {
        //     $.ajax({
        //         type: "get",
        //         url: "<?=EE?>Messages/checkNewMessage",
        //         dataType: "json",
        //         success: function(response) {
        //             $.each(response, function(key, value) {
        //                 $('#countMessage').html(value.messages + "+");
        //                 if (value.messages >= 1) {
        //                     $('#countMessage').removeClass("d-none");
        //                 } else {
        //                     $('#countMessage').addClass("d-none");
        //                 }
        //             });
        //         }
        //     });
        // }
        </script>