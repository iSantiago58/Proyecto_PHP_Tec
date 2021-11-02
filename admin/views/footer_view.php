
	</div>
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '<?=PROJECT?>assets/plugins/';</script>
		<script type="text/javascript" src='<?=PROJECT?>assets/plugins/jquery/jquery-2.2.3.min.js'></script>
		<script type="text/javascript" src="<?=PROJECT?>assets/js/jquery-ui.js"></script>
		<script type="text/javascript" src="<?=PROJECT?>/assets/js/app.js"></script>
		<script type="text/javascript" src="<?=PROJECT?>assets/js/slim/slim.kickstart.js?1.2"></script>
		<script type="text/javascript" src="<?=PROJECT?>assets/js/alert.js"></script>
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){
					if (jQuery().dataTable) {
						var table = jQuery('#datatable_sample');
						table.dataTable({
							"lengthMenu": [
								[10, 20, -1],
								[10, 20, "Todos"] // change per page values here
							],
							// set the initial value
							"pageLength": 10,            
							"pagingType": "bootstrap_full_number",
							"order": [],
							"language": {
								"lengthMenu": "_MENU_ registros",
								"paginate": {
									"previous":"",
									"next": "",
									"last": "",
									"first": ""
								},
								"emptyTable": "No hay datos disponibles en la tabla",
								"info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
								"infoEmpty": "Mostrando 0 a 0 de 0 entradas",
								"infoFiltered": "(filtrado de _MAX_ entradas totales)",
								"loadingRecords": "Cargando...",
							    "processing": "Procesando...",
							    "search": "Buscar:",
							    "zeroRecords": "No se encontraron registros coincidentes"
							}
						});
					}
				});
			});
		</script>
		<!-- Latest compiled and minified JavaScript -->
		<script type="text/javascript" src="<?=PROJECT?>assets/js/select-multiple.min.js"></script>
		<!-- Mios -->
		<script type="text/javascript" src="<?=PROJECT?>assets/js/categories.js"></script>
		<script type="text/javascript" src="<?=PROJECT?>assets/js/product.js"></script>
		<script type="text/javascript" src="<?=PROJECT?>assets/js/users.js"></script>
	</body>
</html>