<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<head>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/Viewusers.css">
</head>

<?php
class OldCust extends view
{

    public function output()
    {

        require APPROOT . '/views/inc/header.php';

        $action = URLROOT . 'pages/Order';
        $text = <<<EOT
    <form action="$action" method="post">
         
    EOT;
?>
        <div class="container" style="max-width:50%;">
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" id="live_search" placeholder="Search For a Customer">
                </div>
            </div>
        </div>
        <div class="result">
            <div id="searchresult"></div>
        </div>

<?php
        <<<EOT
      </form>
    
      EOT;
        echo $text;
        require APPROOT . '/views/inc/footer.php';
    }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#live_search").keyup(function() {

            var input = $(this).val();
            //alert(input);


            $.ajax({

                url: "livesearchcust",
                method: "POST",
                data: {
                    input: input
                },

                success: function(data) {
                    $("#searchresult").html(data);
                }
            });


        });
        $("#live_search").ready(function() {

            var input = $(this).val();
            //alert(input);


            $.ajax({

                url: "livesearchcust",
                method: "POST",
                data: {
                    input: input
                },

                success: function(data) {
                    $("#searchresult").html(data);
                }
            });


        });
    });
</script>