<div class="container">
    <div class="content_div">

        <div class="page_title">
            <h2>Product List</h2>

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

                        <!-- Product Basic Form  -->
                        <div class="all_form" id="basic_form">
                            <h4>Basic Information</h4>
                            <form action="" method="POST" id="basic_form">
                                <div class="row_body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleFormControlFile1">Add Media</label>
                                            <input type="file" class="form-control-file">
                                        </div>
                                        <div class="col">
                                            <label for="exampleFormControlSelect1">Categories</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option value="" disabled selected>Select Categories</option>
                                                <?php
                                                
                                                foreach($catgories as $category){ ?>
                                                    <option><?= $category->category_name ?></option>
                                                <?php }
                                                
                                                ?>
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

                        <!-- Product Advance Form -->
                        <div class="all_form" id="advance_form" style="display:none;">
                            <h4>Advanced Information</h4>
                            <form action="" method="POST" enctype="multipart/form-data" id="advanceForm">

                                <div class="form-group">
                                <label for="exampleInputEmail1">Product ID</label>
                                <input type="text" class="form-control" name="productId" value="" id="productId">
                                <span style="color:red;" id="weightErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Product Type</label>
                                    <select class="form-control" name="productType">
                                        <option value="" disabled selected>Select Product Type</option>
                                        <option value="simple">Simple</option>
                                        <option value="variable">Variable</option>
                                    </select>
                                    <span style="color:red;" id="typeErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Is Active ?</label>
                                    <select class="form-control" name="isActive">
                                        <option value="" disabled selected>Select Product Status</option>
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                    <span style="color:red;" id="activeErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Is Point ?</label>
                                    <select class="form-control" name="isPoint">
                                        <option value="" disabled selected>Select Product Point</option>
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                    <span style="color:red;" id="pointErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Is Feature ?</label>
                                    <select class="form-control" name="isFeature">
                                        <option value="" disabled selected>Select Product Feature</option>
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                    <span style="color:red;" id="featureErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Units</label>
                                    <select class="form-control" name="unitName">
                                        <option value="" disabled selected>Select Product Unit</option>
                                    </select>
                                    <span style="color:red;" id="unitErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Brands</label>
                                    <select class="form-control" name="brandName">
                                        <option value="" disabled selected>Select Product Brand</option>
                                    </select>
                                    <span style="color:red;" id="brandErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Weight</label>
                                    <input type="text" class="form-control" name="productWeight" placeholder="Enter weight">
                                    <span style="color:red;" id="weightErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="number" class="form-control" name="productPrice" placeholder="Enter price">
                                    <span style="color:red;" id="priceErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Discount Price</label>
                                    <input type="number" class="form-control" name="discountPrice" placeholder="Enter price">
                                    <span style="color:red;" id="discountErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Minimum Order</label>
                                    <input type="text" class="form-control" name="minOrder" min="1" placeholder="1">
                                    <span style="color:red;" id="minErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Maximum Order</label>
                                    <input type="text" class="form-control" name="maxOrder" max="5" placeholder="5">
                                    <span style="color:red;" id="maxErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">SKU</label>
                                    <input type="text" class="form-control" name="sku" placeholder="Enter sku">
                                    <span style="color:red;" id="skuErr"></span>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <img id="loadingImage1" style="width: 140px; height:40px; display:none;" src="https://cdn.dribbble.com/users/2973561/screenshots/5757826/loading__.gif" alt="loading gif">
                            </form>
                        </div>

                        <!-- SEO information form -->
                        <div class="all_form" id="seo_form" style="display:none;">
                            <h4>SEO Information</h4>
                            <form action="" method="POST" enctype="multipart/form-data" id="seoForm">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product ID</label>
                                    <input type="text" class="form-control" name="seoProductId" value="" id="seoProductId">
                                    <span style="color:red;" id="weightErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Seo Meta Tags</label>
                                    <input type="text" class="form-control" name="metaTags" placeholder="Seo meta tags">
                                    <span style="color:red;" id="tagsErr"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Seo Description</label>
                                    <input type="text" class="form-control" name="seoDescription" placeholder="Seo Description">
                                    <span style="color:red;" id="seoDesErr"></span>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <img id="loadingImage2" style="width: 140px; height:40px; display:none;" src="https://cdn.dribbble.com/users/2973561/screenshots/5757826/loading__.gif" alt="loading gif">
                            </form>
                        </div>

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

<script>
    $(document).ready(function() {
        $('#basicBtn').click(function() {
            $('#basic_form').show();
            $('#advance_form').hide();
            $('#seo_form').hide();
        });

        $('#advanceBtn').click(function() {
            $('#advance_form').show();
            $('#basic_form').hide();
            $('#seo_form').hide();
        });
        $('#seoBtn').click(function() {
            $('#seo_form').show();
            $('#advance_form').hide();
            $('#basic_form').hide();
        });
    });
</script>