<!-- IMAGE SCRAPPER -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<div class="mypage">

</div>

<script>
    $.get("http://localelection.ekantipur.com/", function(webpage_html) {

        $('.mypage').append(webpage_html);

        var load_tag = $('g path ');


        var districts = [];

        load_tag.each(function(e) {
            if ($(this).attr('id') !== undefined) {
                districts.push($(this).attr('id'));
            }
        });
        $.ajax({
            type: "POST",
            data: {
                'districtList': districts
            },
            success: function() {
            
            }
        });
    });
</script>

<?php
    
$success_count = $failed_count = 0;
    if(isset($_POST['districtList'])){

        foreach($_POST['districtList'] as $district){
            $map = 'https://assets-cdn.ekantipur.com/images/election/og-image/'.$district.'.jpg';
            $filename = 'maps/'.$district.'.jpg';
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


