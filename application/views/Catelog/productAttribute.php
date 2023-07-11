<div class="container">
    <div class="content_div">

    <div class="page_title">
        <h2>Attribute List</h2>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Attribute</h5>
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
                                <div id="" class="testingDiv">
                                    <input type="hidden" value="<?= $lang->id ?>" name="languageId_<?= $lang->language_name ?>"> <br>
                                    <label for="">Attribute name : <span id="languageName" style="color:red;">*</span> </label>
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
                
                foreach($attributes as $index => $attribute){ ?>
                    <tr>
                        <th scope="row"><?= $attribute->attribute_group ?></th>
                        <td><?= $attribute->attribute_name ?></td>
                        <td>Active</td>
                        <td>
                            <button data-id="<?= $attribute->attribute_group ?>" class="create-user">Edit</button> / <a class="deleteBtn" data-id="" href="">Delete</a>
                        </td>
                    </tr>
                <?php }
                
                ?>
                
            </tbody>
        </table>
    </div>
    </div>
</div>

<div id="dialog-form" title="Create new user">
    <p class="validateTips">All form fields are required.</p>

    <form>
        <fieldset>
            <div id="tabs1" style="height:150px;">
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
                    <div id="" class="testingDiv">
                        <input type="hidden" value="<?= $lang->id ?>" name="languageId_<?= $lang->language_name ?>"> <br>
                        <label for="">Attribute name : <span id="languageName" style="color:red;">*</span> </label>
                        <input type="text" name="atrribute_<?= $lang->language_name ?>" id="attributeName" class="form-control">
                        <input type="hidden" name="attributeId" id="attributeId">
                    </div>
                </div>
                <?php }
                
                ?>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    $(document).ready(function(){
    $('#myForm').submit(function(event) {
        event.preventDefault();

        var isMissingField = false;
        var formFields = [];

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
            formFields.push({
                languageId: languageId,
                language: language,
                fieldValue: fieldValue
            });
        });

        if(isMissingField){
            $('#alertDiv').text('Please select for all language');
        }else{
            var formData = {
                formFields: formFields
            };
            console.log(formData);
            $.ajax({
            url: '<?= base_url('attribute_create'); ?>',
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
    $( function() {
    var dialog, form,

    // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
    name = $( "#name" ),
    email = $( "#email" ),
    password = $( "#password" ),
    allFields = $( [] ).add( name ).add( email ).add( password ),
    tips = $( ".validateTips" );

    function updateTips( t ) {
        tips
        .text( t )
        .addClass( "ui-state-highlight" );
        setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
        }, 500 );
    }

    function checkLength( o, n, min, max ) {
        if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
            min + " and " + max + "." );
        return false;
        } else {
        return true;
        }
    }

    function checkRegexp( o, regexp, n ) {
        if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
        } else {
        return true;
        }
    }

    function addUser() {
        var valid = true;
        allFields.removeClass( "ui-state-error" );

        valid = valid && checkLength( name, "username", 3, 16 );
        valid = valid && checkLength( email, "email", 6, 80 );
        valid = valid && checkLength( password, "password", 5, 16 );

        valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
        valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
        valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

        if ( valid ) {
        $( "#users tbody" ).append( "<tr>" +
            "<td>" + name.val() + "</td>" +
            "<td>" + email.val() + "</td>" +
            "<td>" + password.val() + "</td>" +
        "</tr>" );
        dialog.dialog( "close" );
        }
        return valid;
    }

    dialog = $( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
        "Create an account": addUser,
        Cancel: function() {
            dialog.dialog( "close" );
        }
        },
        close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
        }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        addUser();
    });

    $( ".create-user" ).button().on( "click", function() {
        var attributeGroupId = $(this).data('id');
        if(attributeGroupId != null){
            $('#attributeId').val(attributeGroupId);

            $.ajax({
                url: '<?= base_url('attribute_update') ?>',
                type: "POST",
                data: 'attributeId=' + attributeGroupId,
                dataType: 'json',
                success: function(response){
                    console.log(response);
                }
            })
        }
        
        dialog.dialog( "open" );
    });
});
</script>



<script>
    $( function() {
        $( "#tabs" ).tabs();
    } );
</script>

<script>
    $( function() {
        $( "#tabs1" ).tabs();
    } );
</script>

<script>
    $( function() {
        $("#dialog" ).dialog({
            modal: true,
        });
    } );
</script>

<!-- Delete Modal -->
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

