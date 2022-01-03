<!-- IMAGE SCRAPPER -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<div class="mypage">
AN EMPTY DIV TO FETCH YOUR DESIRED WEBSITE SO THAT YOU CAN USE JQUERY SELECTORS TO PROCEED
</div>

<script>
    $.get("http://desiredwebsite.com/", function(webpage_html) {

        $('.mypage').append(webpage_html);

        var load_tag = $('tag/class/id/orAnyThing');


        var imageID = [];

        load_tag.each(function(e) {
            if ($(this).attr('id/name/orAnyThing') !== undefined) {
                imageID.push($(this).attr('id'));
            }
        });
        $.ajax({
            type: "POST",
            data: {
                'imageID': imageID
            },
            success: function() {
            
            }
        });
    });
</script>

<?php
    
$success_count = $failed_count = 0;
    if(isset($_POST['imageID'])){

        foreach($_POST['imageID'] as image){
            $map = 'https://desiredwebsite/image/'.image.'.jpg';
            $filename = 'yourFolder/'.image.'.jpg';
            if (file_put_contents($filename , file_get_contents($map))){
                $success_count++;
            }else{
                $failed_count++;
            }
        }
        echo "Success: ".$success_count;
        echo "<br>Failed : ".$failed_count;
    }
?>


