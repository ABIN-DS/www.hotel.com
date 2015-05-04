
$(function(){
    $(".searForm>li:odd").addClass("oddColor");
    $(".table1>tbody>tr:odd").addClass("oddColor");
    $(".table1>tbody>tr").hover(
        function(){
            $(this).addClass("overColor");
        },
        function(){
            $(this).removeClass("overColor");
        }
    );



})