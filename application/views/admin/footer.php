</div>
    <!-- Edit Modal Starts -->
    
        <div class="modal fade ad_modal " id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                   <div class="row">
                        <div class="col-12" id="editContent">
                            
                        </div>
                   </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="ad_btn ad_hollowBtn" data-dismiss="modal">Close</button>
                    <button type="button" class="ad_btn bg-blue editPopupBtn">Save changes</button>
                </div>
            </div>
            </div>
        </div>

    <!-- Edit Modal Ends -->
        <script>window.baseurl = "<?= base_url() ?>"</script>
        <script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/select2/select2.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/toastr/toastr.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/datatable/datatables.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/datatable/responsive/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/js/custom.js?q=<?= date('his') ?>"></script>
    </body>
</html>