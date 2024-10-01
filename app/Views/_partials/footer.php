
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecione "Sair" abaixo se estiver pronto para encerrar sua sessão atual.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <a class="btn btn-primary" href="<?=base_url('login/logout')?>">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
        <script src="<?=base_url('assets/bootstrap5/js/bootstrap.bundle.min.js')?>"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>
        <!-- Page level plugins -->

        <!-- datatable2 -->
        <script src="<?= base_url('assets/datatable2/datatables.min.js')?>"></script>

        <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="<?=base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?=base_url('assets/js/sb-admin-2.min.js')?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?=base_url('assets/js/demo/datatables-demo.js')?>"></script>
        <!-- mostrar senha -->
        <script src="<?=base_url('assets/jquery/olho.js')?>"></script>

        <script src="<?=base_url('assets/jquery/datatable2.js')?>"></script>

        <!-- máscara -->
        <script src="<?=base_url('assets/mask/jquery.mask.js')?>"></script>
        <script src="<?=base_url('assets/mask/mask.js')?>"></script>

        <!-- input quantidade -->
        <script src="<?=base_url('assets/jquery/input-qtd.js')?>"></script>
    </footer>
    </body>

</html>