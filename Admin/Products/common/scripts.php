
  <!--   Core JS Files   -->
  <script src="../Products/Edit_product/popper.min.js"></script>
  <script src="../Products/Edit_product/bootstrap.min.js"></script>
  <script src="../Products/Edit_product/perfect-scrollbar.min.js"></script>
  <script src="../Products/Edit_product/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="../Products/Edit_product/dragula.min.js"></script>
  <script src="../Products/Edit_product/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="../Products/Edit_product/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Products/Edit_product/material-dashboard.min.js?v=3.20."></script>
</body>

</html>
