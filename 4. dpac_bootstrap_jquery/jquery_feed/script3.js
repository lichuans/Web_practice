var jsonurl ="json/entries.json";

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
var item=data.Animals;
//console.log(item);


var htm = "";

for(var i=0;i<item.length;i++){
//console.log(item[i]);

htm =item[i].API;
$("#testDiv").append(htm+"<br>");
            }// for


}//success end
});//ajax end

