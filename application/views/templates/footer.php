			</div>
		</main>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/default.js?<?=time()?>"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#student_number').autocomplete({
                        source: "<?php echo site_url('borrowed/get_autocomplete');?>",

                        select: function (event, ui) {
                            $('[name="student_number"]').val(ui.item.label);
                            $('[name="cutomer_name"]').val(ui.item.description);
                        }
                    });

                });
            </script>
	</body>
	
</html>