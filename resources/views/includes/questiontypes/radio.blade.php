<script>

    $(document).ready(function(){


            var i = 0;

            $('#theButton').click(addAnotherTextBox);

            function addAnotherTextBox() {
                $("#theForm").append("<br><label>Option:</label>" +
                    "<input type='text' name='option" + i + "' >");
            }



    });


</script>

<form method='GET'>
    <input id='theButton' type='button' value='Add Option'>
    <div id='theForm'></div>
</form>
