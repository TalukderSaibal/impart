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
                    <div id="alertDiv"></div>
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
                                    <label for="">Unit name : <span id="languageName" style="color:red;">*</span> </label>
                                    <input type="text" id="languageId" name="unit_<?= $lang->language_name ?>" class="form-control">
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
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>                                                                               
                </tr>
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
        // $('.languageSelect').on('click', function() {
        //     var language = $(this).text();
        //     $('#languageName').text(language);
        // });

    $('#myForm').submit(function(event) {
        event.preventDefault();

        var formData = $('#myForm').serializeArray();
        var isMissingField = false;
        var languageFields = {};

        $('input[name^="unit_"]').each(function() {
            var fieldName = $(this).attr('name');
            var fieldValue = $(this).val();
            if ($(this).val() === '') {
                isMissingField = true;
                return false; // Exit the loop early
            }

            if (fieldValue === '') {
                isMissingField = true;
                return false;
            }

            var language = fieldName.split('_')[1];
            languageFields[language] = fieldValue;
        });

        if(isMissingField){
            $('#alertDiv').text('Please select for language');
        }else{
            console.log(formData);
            $.ajax({
            url: '<?= base_url('unit_create'); ?>',
            type: 'POST',
            data: formData,
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

