
  <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="http://adminlte.io">SIMEC System LTD</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>

      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <!-- jQuery UI 1.11.4 -->
    <script src="asset/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="asset/plugins/select2/js/select2.full.min.js"></script>
    <script src="asset/dist/js/adminlte.js"></script>
    <script src="asset/dist/js/ajax_script.js"></script>
    <script src="asset/dist/js/demo.js"></script>
     <!-- datatable -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">

        $(document).ready( function () {
            $('.mydatatable').dataTable();
            $('.storedatatable').dataTable({
                 'autoWidth': false,
                  // 'scrollX': 'true',
                  "ordering": false
            });
        });

    </script>
    <!-- datatable -->
    <script type="text/javascript">
        $(document).ready(function () {
        $( '.select2' ).select2();
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 5000);
        });
    </script>
    <script>
        $(document).ready(function() {
            update();
            function update() {
              $("#notice_div").html('Loading..'); 
              $.ajax({
                  type: 'GET',
                  url: 'data/dashboard.php',
                  timeout: 2000,
                  success: function(data) {
                    var json = JSON.parse(data);
                    $('.user_total_req').text(json["user_total_req"]); 
                    $('.user_approved').text(json["user_approved"]); 
                    $('.user_pending').text(json["user_pending"]); 
                    $('.user_rejected').text(json["user_rejected"]);
                    $('.div_total_req').text(json["div_total_req"]);
                    $('.div_approved').text(json["div_approved"]);
                    $('.dip_approved').text(json["dip_approved"]);
                    $('.chk_approved').text(json["chk_approved"]);
                    $('.div_pending').text(json["div_pending"]);
                    $('.dip_pending').text(json["dip_pending"]);
                    $('.chk_pending').text(json["chk_pending"]);
                    $('.div_rejected').text(json["div_rejected"]);
                    $('.dip_rejected').text(json["dip_rejected"]);
                    $('.total_div_users').text(json["total_div_users"]);
                    $('.store_total_req').text(json["store_total_req"]);
                    $('.store_delivered').text(json["store_delivered"]);
                    $('.store_pending').text(json["store_pending"]);
                    $('.par_delivered').text(json["par_delivered"]);
                    $('.t_req_item').text(json["t_req_item"]);
                    $('.users_req_item').text(json["users_req_item"]);
                    $('.st_req_item').text(json["st_req_item"]);
                    $('.dip_total_req').text(json["dip_total_req"]);
                    $('.chk_total_req').text(json["chk_total_req"]);

                    window.setTimeout(update, 3000);
                  },
                  error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $("#notice_div").html('Timeout contacting server..');
                    window.setTimeout(update, 3000);
                  }
              });
            }
        });
      </script>
    <!-- DataTables -->
    <script src="asset/plugins/datatables/jquery.dataTables.js"></script>
    <script src="asset/plugins/datatables/dataTables.bootstrap4.js"></script>
  </body>
</html>
