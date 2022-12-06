function calc_value(){
    var date_start = new Date(document.getElementById("start").value);
    var date_end = new Date(document.getElementById("end").value);
    console.log(date_end.toISOString().slice(0, 10));

    var Difference_In_Time = date_end.getTime() - date_start.getTime();

    if(Difference_In_Time < (60 * 60 * 24)){
        date_end.setTime(date_start.getTime() + (60 * 60 * 24 * 2));
        document.getElementById("end").value = date_end.toISOString().slice(0, 10);
    }
      
    var days_diff = Difference_In_Time / (1000 * 3600 * 24);

    var value = document.getElementById("value").value;
    var end_value = 0;
    if(days_diff == 1){
        end_value = value / 30 * 6;
    }
    else if(days_diff == 2){
        end_value = value / 30 * 4;
    }
    else if(days_diff <= 6){
        end_value = value / 30 * 2;
    }
    else if(days_diff <= 30){
        end_value = value / 30 * 1.5;
    }
    else {
        end_value = value / 30;
    }
    document.getElementById("end_value").innerHTML = Math.ceil(end_value * days_diff) + " ₽";
    console.log(end_value);
}
calc_value();