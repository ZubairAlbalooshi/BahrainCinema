<script language="javascript"><!--
    function report1(p1)
{
        $.ajax({
            url: 'process1.php?mid=' + p1;
            success: function(data) {
                $("#aid").html(data);
            }
        });
    }
</script>