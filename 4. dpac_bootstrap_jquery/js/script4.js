var jsonurl ="https://cors-anywhere.herokuapp.com/https://samples.openweathermap.org/data/2.5/weather?q=London&appid=b6907d289e10d714a6e88b30761fae22";

$.ajax ({
    url:jsonurl,
    dataType: 'json',
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.status);
            alert(XMLHttpRequest.readyState);
            alert(textStatus);
        },

success:function(data){
//console.log(data);
var item=data.weather;
//console.log(item);
var item2=data.main;
var item3=data.wind;

console.log(item3);

$("#testDiv").append(item[0].main+"<br>");
$("#testDiv2").append(item2.temp+"<br>");
$("#testDiv3").append(item3.speed+"<br>");




}//success end
});//ajax end

