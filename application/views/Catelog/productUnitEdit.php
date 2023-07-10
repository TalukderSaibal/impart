<div class="container">
    <h3>Product Unit Update</h3>

    <?php
        foreach($units as $unit){
        }
    ?>

    <div id="alertDiv" style="color:red;"></div>
    <form action="" method="post" id="myForm">
        <input type="hidden" value="<?= $unit->unit_group ?>" name="unitGroupId">
        <div id="tabs" style="height:150px;">
            <ul>
                <?php
                    foreach($languages as $key =>  $lang){ ?>
                        <li><a href="#tabs-<?= $key?>"><?= $lang->language_name ?></a></li>
                    <?php }
                ?>
            </ul>
            <?php
            
            foreach($languages as $key => $lang){ ?>
                <div id="tabs-<?= $key ?>">
                <div id=""  class="testingDiv">
                    <input type="hidden" value="<?= $lang->id ?>" name="languageId_<?= $lang->language_name ?>"> <br>
                    <label for="">Unit name : <span id="languageName" style="color:red;">*</span> </label>
                    <input type="text" name="unit_<?= $lang->language_name ?>" value="<?= $unit->unit_name ?>" class="form-control">
                </div>
            </div>
            <?php }
            
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>


</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    $( function() {
        $( "#tabs" ).tabs();
    } );
</script>

<script>
    $(document).ready(function(){
    $('#myForm').submit(function(event) {
        event.preventDefault();

        
        var isMissingField = false;
        var languageFields = [];

        $('input[name^="unit_"]').each(function() {
            var fieldValue = $(this).val();
            if ($(this).val() === '') {
                isMissingField = true;
                return false; // Exit the loop early
            }

            if (fieldValue === '') {
                isMissingField = true;
                return false;
            }

            var language = $(this).attr('name').split('_')[1];
            var languageId = $('input[name="languageId_' + language + '"]').val();
            var unitGroupId = $('input[name="unitGroupId"]').val();

            languageFields.push({
                unitGroupId: unitGroupId,
                languageId: languageId,
                language: language,
                fieldValue: fieldValue
            });
        });

        if(isMissingField){
            $('#alertDiv').text('Please select for language');
        }else{
            var formData = {
                languageFields: languageFields
            };


            $.ajax({
            url: '<?= base_url('unit_edit'); ?>',
            type: 'POST',
            data: JSON.stringify(formData),
            dataType: 'json',
            success: function(response) {
                alert(response);
            }
        })
        }
        $('#myForm')[0].reset();
    });
    });
</script>