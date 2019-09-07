      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container-fluid mb-4">
          <div class="row">
            <div class="col-lg-4">
              <h6 class="font-weight-bold mb-2 text-gray-800">Contact</h6>
              <hr class="bg-gradient-primary mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <table class="font-small">
                <tr>
                  <td><i class="fas fa-home mr-2"></i></td>
                  <td>Departemen Silvikultur, Fakultas Kehutanan, Kampus IPB Dramaga, Dramaga, Bogor, Jawa Barat 16680</td>
                </tr>
                <tr>
                  <td><i class="fas fa-phone mr-2"></i></td>
                  <td>+6285 8230 03952 <br> (Fifi Gus Dwiyanti, Ph.D)</td>
                </tr>
              </table>
            </div>
            <div class="col-lg-4">
              <h6 class="font-weight-bold mb-2 text-gray-800">Map</h6>
              <hr class="bg-gradient-primary mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.719368820894!2d106.72833341431344!3d-6.557067065922623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4ae6bedb0e7%3A0x21c336dc956d508a!2sDepartemen%20Silvikultur%20Fahutan%20IPB!5e0!3m2!1sid!2sid!4v1567845651745!5m2!1sid!2sid&z=15" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
              </p>
            </div>
            <div class="col-lg-4">
              <h6 class="font-weight-bold mb-2 text-gray-800">Links</h6>
              <hr class="bg-gradient-primary mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <ul class="list-unstyled">
                <li class="mb-1">
                  <a class="font-small" href="http://silvikultur.fahutan.ipb.ac.id">Department of Silviculture</a>
                </li>
                <li class="mb-1">
                  <a class="font-small" href="http://www.fahutan.ipb.ac.id/">Faculty of Forestry</a>
                </li>
                <li class="mb-1">
                  <a class="font-small" href="https://www.ipb.ac.id/">IPB University</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
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
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <script type="text/javascript">
    // Start jQuery function after page is loaded
    $(document).ready(function(){
     // Start jQuery click function to view Bootstrap modal when view info button is clicked
        $('.view_data').click(function(){
         // Get the id of selected phone and assign it in a variable called phoneData
            var id_herbarium = $(this).attr('id');
            // Start AJAX function
            $.ajax({
             // Path for controller function which fetches selected phone data
                url: "<?= base_url('Cari/getHerbariumById') ?>",
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
                    $('#editHerb').modal('show');
                }
            });
             // End AJAX function
        });
    });
  </script> 

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

</body>

</html>