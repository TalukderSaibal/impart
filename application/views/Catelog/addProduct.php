<div class="container">
    <div class="content_div">

    <div class="page_title">
        <h2>Product List</h2>

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
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="form_button">
                    <button id="basicBtn">Basic Info</button>
                    <button id="advanceBtn">Advanced Info</button>
                    <button id="seoBtn">SEO Info</button>
                </div>

                <div class="modal-body">
                    <div id="alertDiv" style="color:red;"></div>
                    <form action="" method="POST" id="myForm">

                    <div class="row_body">
                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlFile1">Add Media</label>
                                <input type="file" class="form-control-file">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>

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
                                        <label for="">Product name : <span id="languageName" style="color:red;">*</span> </label>
                                        <input type="text" name="unit_<?= $lang->language_name ?>" class="form-control">
                                    </div>
                                </div>
                            <?php }
                            
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Video Embeded Code</label>
                            <input type="text" class="form-control">
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
                <tr>
                    <th scope="row">1</th>
                    <td>Sayabean Oil</td>
                    <td>Active</td>
                    <td>
                        <a href="">Edit</a> / <a class="deleteBtn" data-id="" href="">Delete</a>
                    </td>
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