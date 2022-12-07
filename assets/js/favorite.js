function addtofav(id){
    console.log('add' + id);
    $.ajax({
        async: false,
        type: "POST",
        url: "/php/fav.php",
        data: 'action=add&id=' + id,
        error: function (){
            alert("Ошибка добавления!");
        },
        success: function (reponse){
            alert("Добавленно в избанное!");
        }
    });
}