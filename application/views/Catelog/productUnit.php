<div class="container">
    <div class="content_div">

    <div class="page_title">
        <h2>Unit List</h2>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>

    <!-- Bootstrap Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alertDiv" style="color:red;"></div>
                    <form action="" method="POST" id="myForm">

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
                                    <input type="text" name="unit_<?= $lang->language_name ?>" class="form-control">
                                </div>
                            </div>
                            <?php }
                            
                            ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                        
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="base_table">

    <!-- Delete Modal -->
    <div id="deleteDiv" style="display: none;">
        <p style="color: #fff;">Are you sure want to delete ?</p>
        <div class="deleteButton">
            <button id="okBtn">Ok</button>
            <button id="cancelBtn">Cancel</button>
        </div>
    </div>

        <div class="search_form">
            <form action="" method="post">
                <input type="text">
                <button type="submit">Search</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach($units as $key => $unit){ ?>
                        <tr>
                            <th scope="row"><?= $unit->unit_group ?></th>
                            <td><?= $unit->unit_name ?></td>
                            <td>Active</td>
                            <td>
                                <a href="<?= base_url('unit_edit/'. $unit->unit_group) ?>">Edit</a> / <a class="deleteBtn" data-id=<?= $unit->unit_group ?> href="">Delete</a>
                            </td>
                        </tr>
                <?php }
                
                ?>
            </tbody>
        </table>
    </div>
    </div>
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
            languageFields.push({
                languageId: languageId,
                language: language,
                fieldValue: fieldValue
            });
        });

        if(isMissingField){
            $('#alertDiv').text('Please select for all language');
        }else{
            var formData = {
                languageFields: languageFields
            };

            $.ajax({
            url: '<?= base_url('unit_create'); ?>',
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

<script>
    $(document).ready(function(){
        $('.deleteBtn').click(function(){
            $('#deleteDiv').show();
            var id = $(this).data('id');
                $('#okBtn').click(function(){
                    $.ajax({
                        url: "<?= base_url('unit_delete') ?>",
                        type: "POST",
                        data: 'id=' + id,
                        dataType: "json",
                        success: function(response) {
                            if(response.status && response.status == 'success'){
                                $('#successDiv').text(response.message).show();
                                location.reload();
                            }else{
                                $('#successDiv').text(response.message).show();
                            }
                        }
                    });
                    $('#deleteDiv').hide();
                });
            return false;
        });

        $('#cancelBtn').click(function(){
            $('#deleteDiv').hide();
        });
    });
</script>

