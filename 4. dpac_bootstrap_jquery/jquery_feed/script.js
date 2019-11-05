var rssurl ="https://cors-anywhere.herokuapp.com/https://www.abc.net.au/news/feed/51120/rss.xml";

$.get (rssurl, function(data) {
   var i=0;
    $(data).find("item").each(function() {
        i=i+1;
        var $this = $(this),
            item = {
                title: $this.find("title").text(),
                link: $this.find("link").text(),
                description: $this.find("description").text(),
                pubDate: $this.find("pubDate").text(),
                image: $this.find("[url]:first")
        }

        
//load this content into a div and make it display nicely

var tit=item.title;
var lin=item.link;
var des=item.description;
var pub=item.pubDate;
var img=item.image;
var img2=img.attr("url");


$('#testDiv').append("<img src="+img2+" style='width:200px;height:150px'><br><a href='"+lin+"' target='view_window'>"+tit+"</a><br>"+pub+"<br>"+des);

      if(i==5){   
    return false;}
console.log(img2);

    });
});





