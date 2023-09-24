<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= EE ?>app/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= EE ?>app/plugins/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= EE ?>app/plugins/css/owl.carousel.css">
  <script src="<?= EE ?>app/plugins/js/jquery.min.js"></script>
  <script src="<?= EE ?>app/plugins/js/swal.all.js"></script>
  <script src="<?= EE ?>app/plugins/js/all.js"></script>
  <link rel="stylesheet" href="<?= EE ?>app/plugins/css/customCarousel.css?t=<?= time() ?>">
  <link rel="stylesheet" href="<?= EE ?>app/plugins/template/css/adminlte.min.css">
  <link href="<?= EE ?>dist/output.css" rel="stylesheet">

  <!-- cdn plugins -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

      <?= $content ?>
    

  <!-- REQUIRED SCRIPTS -->
  <!-- AdminLTE App -->
  <script src="<?= EE ?>app/plugins/template/js/adminlte.min.js" defer></script>

  <!-- jQuery -->
  <script src="<?= EE ?>app/plugins/template/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= EE ?>app/plugins/template/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= EE ?>app/plugins/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= EE ?>app/plugins/template/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= EE ?>app/plugins/template/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= EE ?>app/plugins/template/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= EE ?>app/plugins/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= EE ?>app/plugins/template/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= EE ?>app/plugins/template/plugins/moment/moment.min.js"></script>
  <script src="<?= EE ?>app/plugins/template/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= EE ?>app/plugins/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= EE ?>app/plugins/template/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= EE ?>app/plugins/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= EE ?>app/plugins/template/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= EE ?>app/plugins/template/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= EE ?>app/plugins/template/dist/js/pages/dashboard.js"></script>

</body>

</html>