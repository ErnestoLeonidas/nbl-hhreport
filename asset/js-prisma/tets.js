$(document).ready(function() {
    $('#select_fecha').datepicker({
        language: 'es',
        ignoreReadonly: true,
        
        _onSelectDate: function (date, cellType) {
            var currentDate = date.getDate();
            console.log(currentDate);
            console.log("caca");
            $("#12").attr('class', 'datepicker--cell datepicker--cell-day rojo');
        },
        onChangeView: function onSelect(fd, date) {
            $("#12").attr('class', 'datepicker--cell datepicker--cell-day rojo');
        }
    
    });


    $("#12").attr('class', 'datepicker--cell datepicker--cell-day rojo');


});


