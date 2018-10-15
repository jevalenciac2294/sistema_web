$("#empleado").change(event => {
	$.get(`empleadoVehiculo/${event.target.value}`, function(res, sta){
		$("#empleadoVehiculo").empty();
		res.forEach(element => {
			$("#empleadoVehiculo").append(`<option value=${element.id}> ${element.name} </option>`);
		});
	});
});