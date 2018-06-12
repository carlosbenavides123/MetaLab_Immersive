$(document).ready(function(){
    $("img").click(function(event) {
        //alert(event.target.id+" and "+$(event.target).attr('class'));
        if(event.target.attr('class') === "upvote")
        {
            // $post->votes +=1;
        }
    });
});
