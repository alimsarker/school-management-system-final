
    <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>&copy; 2021          <a href="" target="_blank">ALIM SARKER</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="">ALIM SARKER</a></span></div>
      </div>
    </footer>
    <script src="{{ asset('backend/app-assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/chartist-js/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/data-tables/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('backend/app-assets/vendors/chartist-js/chartist.min.js') }}"></script>
    <script src="{{ asset('backend/app-assets/vendors/chartjs/chart.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('backend/app-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/search.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/custom/custom-script.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/customizer.js') }}"></script>
    <script src="{{ asset('backend/app-assets/js/scripts/dashboard-modern.js') }}"></script>
    
    <!-- END THEME  JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/page-account-settings.js') }}"></script>
      <!-- BEGIN PAGE VENDOR JS-->
     
    <!-- END PAGE VENDOR JS--
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/dashboard-ecommerce.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('backend/app-assets/js/scripts/data-tables.js') }}"></script>

    <!-- END PAGE LEVEL JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!---- BEGIN PAGE SweetAlert   ------>
    <script type="text/javascript">
      $(function(){
        $(document).on('click','#delete',function(e){
          e.preventDefault();
          var link = $(this).attr("href");


                  Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link 
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  }
                })

        });
      });
      



    </script>


    <!---- End SweetAlert   ------>


    <!---- Start Toaster   ------>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
@if(Session::has('message')) 
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
                case 'info':
                toastr.info("{{Session::get('message') }}");
                    
                    break;

                    case 'success':
                toastr.success("{{Session::get('message') }}");
                    
                    break;

                case 'warning':
                toastr.warning("{{Session::get('message') }}");
                    
                    break; 

                    case 'error':
                        toastr.error("{{Session::get('message') }}");
                            
                            break;
                default:
                    break;
            }
    @endif
    </script>
  </body>
</html>


 