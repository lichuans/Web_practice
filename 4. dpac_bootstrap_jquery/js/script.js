var rssurl ="https://cors-anywhere.herokuapp.com/https://www.abc.net.au/news/feed/51120/rss.xml";

$.get(rssurl, function(data) {
    var $xml = $(data);
    var i=0;
    $xml.find("item").each(function() {
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

$('#paneltwo').append("<div id='rss'><img src="+img2+" class='m-auto' style='width:100%;padding:10px'><br><a href='"+lin+"' target='view_window'>"+tit+"</a><br>"+pub.substr(0,17)+"<br>"+des.substr(0,150)+"...</div><hr style='display:block'>");


      if(i==5){   
    return false;}

    });
});





