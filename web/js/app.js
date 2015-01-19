function loadPages(editionId){
    $.getJSON( "/api/edition/"+editionId+".json", function( data ) {
        var items = [];
        $.each( data, function( key, val ) {
            items.push( "<div class='printpage' id='" + key + "'><img src='" + val.path_thumb + "'/></div>" );
        });

        $( "<div/>", {
            "class": "page-list hidden",
            html: items.join( "" )
        }).appendTo( "body").show().addClass("animated pulse");
    });
}