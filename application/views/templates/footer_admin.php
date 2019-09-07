      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="mb-2" style="display:block">Copyright &copy; Herbarium - Departemen Silvikultur,</span> 
            <span style="display:block">Fakultas Kehutanan, Institut Pertanian Bogor</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> 

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>


  <script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
     // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('.view_data').click(function(){
         // Get the id of selected phone and assign it in a variable called phoneData
            var id_herbarium = $(this).attr('id');
            // Start AJAX function
            $.ajax({
             // Path for controller function which fetches selected phone data
                url: "<?= base_url('Herbarium/getHerbariumById') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {id_herbarium:id_herbarium},
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data){
                 // Print the fetched data of the selected phone in the section called #phone_result 
                 // within the Bootstrap modal
                //  console.log(data);
                    $('#viewHerbById').html(data);
                    // // Display the Bootstrap modal
                    // Display the Bootstrap modal
                    $('#viewHerbModal').modal('show');
                }
            });
             // End AJAX function
        });
        $('.view_user').click(function(){
         // Get the id of selected phone and assign it in a variable called phoneData
            var id_user = $(this).attr('id');
            // Start AJAX function
            $.ajax({
             // Path for controller function which fetches selected phone data
                url: "<?= base_url('User/getUserById') ?>",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {id_user:id_user},
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data){
                 // Print the fetched data of the selected phone in the section called #phone_result 
                 // within the Bootstrap modal
                    $('#viewUserById').html(data);
                    // // Display the Bootstrap modal
                    // Display the Bootstrap modal
                    $('#editUser').modal('show');
                }
            });
             // End AJAX function
            $('username').bind('keypress',function(evt){
                var key = String.fromCharCode(evt.which || evt.charCode);
                if(/[a-z]/i.test(key) === false) evt.preventDefault();
            })
        });
    });
    function previewImage(imageType) {
      console.log(imageType)
      if(imageType==1){ 
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("herbarium_image").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("preview_herbarium_image").src = oFREvent.target.result;
        };
      }
      else if(imageType==2){
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("real_image").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("preview_real_image").src = oFREvent.target.result;
        }; 
      }         
    }
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap4'
    });
    function banUserConfirm(url){
      $('#ban-user').attr('href', url);
      $('#banUserModal').modal();
    }
    function activeUserConfirm(url){
      $('#active-user').attr('href', url);
      $('#activeUserModal').modal();
    }
    function deleteUserConfirm(url){
      $('#delete-user').attr('href', url);
      $('#deleteUserModal').modal();
    }
    function editFamilia(id_familia,familia){
      $('#for-id_familia').attr('value', id_familia);
      $('#for-familia').attr('value', familia);
      $('#editFamiliaModal').modal();
    }
    function deleteHerbariumConfirm(url){
      $('#delete-herbarium').attr('href', url);
      $('#deleteHerbariumModal').modal();
    }
  </script> 

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>


</body>

</html>