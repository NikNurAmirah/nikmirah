<script>

    $(document).ready(function(){


            var i = 0;

            $('#theButton').click(addAnotherTextBox);

            function addAnotherTextBox() {
                $("#theForm").append("<br><label>Option:<input type='text' name='teilnehmer_" + i + "' >");
            }



    });


</script>

<form method='post'>
    <input id='theButton' type='button' value='Add Option' class="button">
    <div id='theForm'></div>
    <input type='submit' value='Submit'>
</form>
