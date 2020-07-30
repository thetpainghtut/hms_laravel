"use strict";
var IgniteSource = function() {

	// initial data table
	var initTable1 = function() {
		var table = $('#dataTableHMS');

		// begin first table
		table.DataTable({
			responsive: true,

			// DOM Layout settings
			dom: `<'row'<'col-sm-12'tr>>
			<'row  pl-3 pr-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			lengthMenu: [5, 10, 25, 50],

			pageLength: 10,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [
				[0, 'asc']
			],
		});


		// search 
		$('#searchDataTable').on('keyup', function() {
			$('#dataTableHMS').dataTable().fnFilter(this.value);
		});
	};


	var initDateTimePicker = function() {
		$('#kt_datetimepicker_1').datetimepicker({
			todayHighlight: true,
			autoclose: true,
			// format: 'yyyy.mm.dd hh:ii'
			minuteStep: 1
		});
	};

	return {

		//main function to initiate the module
		initDataTables: function() {
			initTable1();
		},

		initDateTimePicker: function() {
			initDateTimePicker();
		},

	};

}();

jQuery(document).ready(function() {
	IgniteSource.initDataTables();
	IgniteSource.initDateTimePicker();
});