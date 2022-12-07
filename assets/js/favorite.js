function addtofav(id){
    console.log('add' + id);
    $.ajax({
        async: false,
        type: "POST",
        url: "/fav.php",
        data: 'action=add&id=' + id,
        error: function (){
            alert("Ошибка добавления!");
        },
        success: function (response){
            alert("Добавленно в избанное!");
            if(response == "1"){
                $("#"+id).text('В избранное');
            }
            else{
                $("#"+id).text('Из избранного');
            }
        }
    });
}