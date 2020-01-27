
jQuery(function($) {
$(document).ready(function() {
	//On pageload getting current date, format and load data for current date
	var date = new Date();
	var year = date.getFullYear();
	var month = ("0" + (date.getMonth() + 1)).slice(-2);
	var currentDate = month + year;
	var data = obj[currentDate];
	console.log("data", data);

	//Main render function which is reponsible to fill cost table
	(function () {
		$(".narDues").html("0.00");
		$(".narDues").html("0.00");
		$(".carDues").html("0.00");
		$(".carInit").html("0.00");
		$(".bayEastDues").html("0.00");
		$(".realtorInit").html("0.00");
		$(".mls").html("0.00");
		$(".mlsInit").html("0.00");
		$(".eKey").html("0.00");
		$(".supraInit").html("0.00");
		$(".education").html("0.00");
		$(".foundation").html("0.00");
		$(".raf").html("0.00");
		$('.inst1').html("0.00");
		$('.inst2').html("0.00");
		$('.inst3').html("0.00");
		$('.inst4').html("0.00");
	}) ();

	function optionalFee (inst1) {
		var rafVal = Number($('.raf').html());
		var foundationVal = Number($('.foundation').html());
		var educationVal = Number($('.education').html());
		inst1 += rafVal + foundationVal + educationVal;
		return inst1;
	}

	function installment (data) {
		console.log("installment data:", data);
		// R
		if ($("#mls").prop("checked") && (! $("#mlsAccess").is(':checked')) && (! $("#eKey").is(':checked'))) {
			var inst1 = Number(data[7].R[0]);
			var inst2 = Number(data[7].R[1]);
			var inst3 = Number(data[7].R[2]);
			var inst4 = Number(data[7].R[3]);

			console.log(inst1);

			var inst1 = optionalFee(inst1);
			$(".inst1").html(inst1.toFixed(2));
			$(".inst2").html(inst2.toFixed(2));
			$(".inst3").html(inst3.toFixed(2));
			$(".inst4").html(inst4.toFixed(2));
			console.log("R", inst1);

		// RMLS
		}	else if ($("#mls").prop("checked") && $("#mlsAccess").prop("checked") && (! $("#eKey").is(':checked'))) {
			var inst1 = Number(data[8].RMLS[0]);
			var inst2 = Number(data[8].RMLS[1]);
			var inst3 = Number(data[8].RMLS[2]);
			var inst4 = Number(data[8].RMLS[3]);

			var inst1 = optionalFee(inst1);
			$(".inst1").html(inst1.toFixed(2));
			$(".inst2").html(inst2.toFixed(2));
			$(".inst3").html(inst3.toFixed(2));
			$(".inst4").html(inst4.toFixed(2));
			console.log("RMLS", inst1);
		}

		// RMLSEKEY
		else if ($("#mls").prop("checked") && $("#mlsAccess").prop("checked") && $("#eKey").prop("checked")) {
			console.log("RMLSEKEY");
			var inst1 = Number(data[9].RMLSEKEY[0]);
			var inst2 = Number(data[9].RMLSEKEY[1]);
			var inst3 = Number(data[9].RMLSEKEY[2]);
			var inst4 = Number(data[9].RMLSEKEY[3]);

			var inst1 = optionalFee(inst1);
			$(".inst1").html(inst1.toFixed(2));
			$(".inst2").html(inst2.toFixed(2));
			$(".inst3").html(inst3.toFixed(2));
			$(".inst4").html(inst4.toFixed(2));
			console.log("RMLSEKEY", inst1);
		// MLSEKEY
		} else if ($("#mls2").prop("checked") || $("#mlsAccess").prop('checked')) {
				if ($("#eKey").prop("checked")) {
					var inst1 = Number(data[11].MLSEKEY[0]);
					var inst2 = Number(data[11].MLSEKEY[1]);
					var inst3 = Number(data[11].MLSEKEY[2]);
					var inst4 = Number(data[11].MLSEKEY[3]);

					var inst1 = optionalFee(inst1);
					$(".inst1").html(inst1.toFixed(2));
					$(".inst2").html(inst2.toFixed(2));
					$(".inst3").html(inst3.toFixed(2));
					$(".inst4").html(inst4.toFixed(2));

					console.log("MLSEKEY", inst1);
				} else {
			var inst1 = Number(data[10].MLS[0]);
			var inst2 = Number(data[10].MLS[1]);
			var inst3 = Number(data[10].MLS[2]);
			var inst4 = Number(data[10].MLS[3]);

			var inst1 = optionalFee(inst1);
			$(".inst1").html(inst1.toFixed(2));
			$(".inst2").html(inst2.toFixed(2));
			$(".inst3").html(inst3.toFixed(2));
			$(".inst4").html(inst4.toFixed(2));
			console.log("MLS", inst1);
				}

			}
		// MLS
		// else if ($("#mls2").prop("checked") || $("#mlsAccess").prop('checked') && (! $("#eKey").is(":checked"))) {
		// 	var inst1 = Number(data[10].MLS[0]);
		// 	var inst1 = optionalFee(inst1);
		// 	$(".inst1").html(inst1.toFixed(2));
		// 	console.log("MLS", inst1);
		// }

	}

	function render (data) {
		console.log("render data", data);
		if ($("#mls").prop("checked")) {
				var narDues = Number(data[0].realtor[0].narDues);
				var carDues = Number(data[0].realtor[1].carDues);
				var bayEastDues = Number(data[0].realtor[2].bayEastDues);
				var realtorInit = Number(data[0].realtor[3].realtorInit);
				var carInit = Number(data[0].realtor[4].carInit);
				$(".narDues").html(narDues.toFixed(2));
				$(".carDues").html(carDues.toFixed(2));
				$(".bayEastDues").html(bayEastDues.toFixed(2));
				$(".realtorInit").html(realtorInit.toFixed(2));
				$(".carInit").html(carInit.toFixed(2));
				$('.mls').html("0.00");
				$('.mlsInit').html("0.00");
				console.log("Net data:", data);
				installment (data);

			} else if ($("#mls2").prop("checked")) {
				var mlsFee = Number(data[1].mls[0].mls[0]);
				var mlsInit = Number(data[1].mls[1].mlsInit[0]);
				$('.mls').html(mlsFee.toFixed(2));
				$('.mlsInit').html(mlsInit.toFixed(2));
				$(".narDues").html("0.00");
				$(".carDues").html("0.00");
				$(".bayEastDues").html("0.00");
				$(".realtorInit").html("0.00");
				$(".carInit").html("0.00");
				installment (data);
			}

		if ($("#mlsAccess").prop("checked")) {
				var mlsFee = Number(data[1].mls[0].mls[0]);
				var mlsInit = Number(data[1].mls[1].mlsInit[0]);
				$('.mls').html(mlsFee.toFixed(2));
				$('.mlsInit').html(mlsInit.toFixed(2));
				installment (data);
		}	else if ($("#mlsAccess2").prop("checked")) {
					if ( ! $("#mls2").is(':checked')) {
						var mlsFee = Number(data[1].mls[0].mls[1]);
						var mlsInit = Number(data[1].mls[1].mlsInit[1]);
						$('.mls').html(mlsFee.toFixed(2));
						$('.mlsInit').html(mlsInit.toFixed(2));
					}
				installment (data);
		}

		if ($("#mlsAccess2").prop("checked")) {
			$('#eKey').attr('disabled', true);
			$('#eKey').next().addClass('disabled');
			console.log("Disabled....");
		} else {
			$('#eKey').attr('disabled', false);
			$('#eKey').next().removeClass('disabled');
			console.log("Enabled....");
		}

		if ($("#eKey").prop("checked")) {
				var eKey = Number(data[2].eKey[0]);
				var eKey2 = Number(data[2].eKey[1]);
				var supraInit = Number(data[3].supraInit);
				$(".eKey").html(eKey.toFixed(2));
				$(".supraInit").html(supraInit.toFixed(2));
				installment (data);

		}	else if ($("#eKey2").prop("checked")) {
				$(".eKey").html("0.00");
				$(".supraInit").html("0.00");
				installment (data);
		}

		if ($("#raf").prop("checked")) {
				var raf = Number(data[4].raf[0]);
				$(".raf").html(raf.toFixed(2));
				installment (data);
		}	else if ($("#raf2").prop("checked")) {
				$(".raf").html(data[4].raf[1]);
				installment (data);
		}

		if ($("#education").prop("checked")) {
				var education = Number(data[6].education[0]);
				$(".education").html(education.toFixed(2));
				installment (data);
		}	else if ($("#education2").prop("checked")) {
				$(".education").html("0.00");
				installment (data);
		}

		if ($("#foundation").prop("checked")) {
				var foundation = Number(data[5].foundation[0]);
				$(".foundation").html(foundation.toFixed(2));
				installment (data);
		}	else if ($("#foundation2").prop("checked")) {
				$(".foundation").html(data[5].foundation[1]);
				installment (data);
		}
		// getting value of selected radio button and calculating total cost
		function calculate() {
			const narDues = Number($('.narDues').html());
			const carDues = Number($('.carDues').html());
			const bayEastDues = Number($('.bayEastDues').html());
			const realtorInit = Number($('.realtorInit').html());
			const carInit = Number($('.carInit').html());

			const mls = Number($('.mls').html());
			const mlsInit = Number($('.mlsInit').html());

			const eKey =  Number($('.eKey').html());
			const supraInit = Number ($('.supraInit').html());

			const raf = Number($('.raf').html());
			const education = Number($('.education').html());
			const foundation = Number($('.foundation').html());

			//$('.total').html( parseFloat(mls + access + key + fund + education + contribution + narDues + carDues + raa + iaf).toFixed(2) );
			var total =
				narDues +
				carDues +
				bayEastDues +
				realtorInit +
				carInit +
				mls +
				mlsInit +
				eKey +
				supraInit +
				raf +
				education +
				foundation;
			$(".total").html('$' + parseFloat(total).toFixed(2));
		}

		 calculate();
	};

		$("input:radio[name=mls]").change(function() {
				render(data);
		});

		$("input:radio[name=mlsAccess]").change(function() {
				render(data);
		});

		$("input:radio[name=eKey]").change(function() {
			render(data);
		});

		$("input:radio[name=raf]").change(function() {
			render(data);
		});

		$("input:radio[name=education]").change(function() {
			render(data);
		});

		$("input:radio[name=foundation]").change(function() {
			render(data);
		});

	// get current date and on change get updated data from object and call render function	with new data

		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();

		function formatDate(date) {
		    var d = new Date(date),
		        month = '' + (d.getMonth() + 1),
		        day = '' + d.getDate(),
		        year = d.getFullYear();

		    if (month.length < 2) month = '0' + month;
		    if (day.length < 2) day = '0' + day;

		    return [month, day, year].join('/');
		}
		var latestDate = formatDate(date);
		$('#datepicker').val(latestDate);

		$("#datepicker").datepicker({
				minDate: new Date(currentYear, currentMonth, currentDate),
				maxDate: new Date(currentYear, currentMonth+2, currentDate)
		});
		$("#datepicker").on("change", function(e) {
			console.log("datepicker changed...");
			e.preventDefault();
			var selected = $(this)
				.val()
				.replace(/\//g, "");
			var date = selected.split("").filter(function(item, i) {
				if (i <= 1 || i >= 4) {
					return item;
				}
			});
			var selectedDate = date.toString().replace(/,/g, "");
			data = obj[selectedDate];
			console.log("dated data:", data);
			render(data);
		});
		data = data;
});

});
