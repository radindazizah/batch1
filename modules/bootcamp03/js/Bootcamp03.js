var select = false;
var grid_selector = $("#userKaryawan");
var pager_selector = "#userKaryawanPager";

grid_selector.jqGrid({
	jsonReader: {
		root: "rows",
		page: "page",
		total: "total",
		records: "records",
		repeatitems: true,
		cell: "cell",
		id: "id",
		userdata: "userdata",
		subgrid: {
			root: "rows",
			repeatitems: true,
			cell: "cell"
		}
	},
	url: 'bootcamp03/getKaryawan/?id=' + USER_ID,
	mtype: "post",
	datatype: "json",
	height: 394,
	colNames: ['NIK', 'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Umur', 'Alamat', 'Telp', 'Jabatan', 'Created By', 'Created Time'],
	colModel: [
		{ name: 'nik', width: 150, sortable: false },
		{ name: 'nama', width: 150, sortable: false, editable: true, editrules: { required: true }, editoptions: { maxlength: 50 } },
		{ name: 'tempat_lahir', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'tanggal_lahir', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'umur', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'alamat', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'telp', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'jabatan', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'created_by', width: 150, sorttype: false, editable: false },
		{ name: 'created_time', width: 150, sorttype: false, editable: false },

	],

	shrinkToFit: false,
	viewrecords: true,
	rowNum: 10,
	rowList: [10, 20, 30],
	pager: pager_selector,
	altRows: true,
	//toppager: true,

	//multiselect: true,
	//multikey: "ctrlKey",
	multiboxonly: true,
	onSelectRow: function (data) {
		select = true;
	},
	loadComplete: function () {
		var table = this;
		setTimeout(function () {
			styleCheckbox(table);
			updateActionIcons(table);
			updatePagerIcons(table);
			enableTooltips(table);
		}, 0);
	},


	caption: "Data Karyawan",


	autowidth: true

});

function getSelectedRow() {
	var selRowId = grid_selector.jqGrid('getGridParam', 'selrow');
	var celValue = grid_selector.jqGrid('getCell', selRowId, 'nik');

	// if (selRowId) {
	// 	$("#delButton").attr("data-toggle", "modal");
	// 	$("#delButton").attr("data-target", "#exampleModalLong");
	// } else {
	// 	alert('NO ROW SELECTED');
	// }

	if (selRowId) {
		console.log("Selected row primary key is: " + celValue);
		// $( "#dialog-confirm" ).append( "<p>Test</p>" );
		$("#dialog-confirm").html(
			'<p class="modal-delete"><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Data with nik ' + celValue + 'will be permanently deleted and cannot be recovered. Are you sure?</p>'
		);
		$("#dialog-confirm").dialog({
			resizable: false,
			height: "auto",
			width: 400,
			modal: true,
			buttons: {
				"Delete all items": function () {
					window.location = "www.example.com/index.php?id=" + celValue;
					$(this).dialog("close");
				},
				Cancel: function () {
					$(this).dialog("close");
				}
			}
		});
	}
	else {
		alert("No rows are selected");
	}
}

// Jquery UI Modal
// $(function () {
// 	$("#dialog-confirm").dialog({
// 		resizable: false,
// 		height: "auto",
// 		width: 800,
// 		modal: true,
// 		buttons: {
// 			"Delete all items": function () {
// 				$(this).dialog("close");
// 			},
// 			Cancel: function () {
// 				$(this).dialog("close");
// 			}
// 		}
// 	});
// });