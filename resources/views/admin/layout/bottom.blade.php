 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; samCZ Corps 2022</span>
         </div>
     </div>
 </footer>

 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->

 <script src="{{url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}">
 </script>


 <!-- Core plugin JavaScript-->
 <script src="{{url('backend/vendor/jquery-easing/jquery.easing.min.js')}}">
 </script>

 <script src="{{url('backend/vendor/datatables/jquery.dataTables.min.js')}}">
 </script>

 <script src="{{url('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}">
 </script>

 <!-- select 2 -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{url('backend/js/sb-admin-2.min.js')}}">
 </script>

 <script src="{{url('backend/js/demo/datatables-demo.js')}}"></script>

 <script>
     $(document).ready(function() {
         $('.search_select_box select').selectpicker();
     })
 </script>