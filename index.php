<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Strategic Accounts Management</title>
        <script src="./js/jquery.min.js"></script>
        <script src="./js/jquery.validate.min.js"></script>
        <script src="./js/jquery.maskedinput.min.js"></script>
        <script src="./js/custom_script.js"></script>
        <link href="./css/style.css" rel="stylesheet">
    </head>
    <body>
        <h2>Sales Sample Requests - Form A</h2>
        <div id="loading" style="display: none;"><center style="margin-top: 30%;"><img src="css/loading.gif"/><center></div>
        <div id="iframeloading"><iframe style="width:50%;height:54px;border:none;" name="iframeUploader" id="iframeUploader"></iframe> </div>
        <form id="qdbform" name="qdbform" method="POST"  encType='multipart/form-data' action="./process.php">
            <input type="hidden" name="fform" value="1">
            <!-- date of submission -->
            <input type="hidden" name="_fid_6" id="_fid_6" value="<?php echo date("m-d-Y");?>">
            <div id="part-a">
                <dl>
                    <dt>Strategic Accounts Manager</dt>
                    <dd>
                        <select class="inputA" id="_fid_7" name="_fid_7">
                            <option value="">Select Manager</option>
                            <option value="-58245491">Lispi, Lee</option>
                            <option selected="" value="-57450810">Sales, Sonny</option>
                        </select>
                        <!-- <input type=text size=40 name=_fid_7 > -->
                    </dd>

                    <dt class=m>PO Number</dt>
                    <dd class=m><input class="inputA" type=text size=40 name="_fid_8" id ="_fid_8" ></dt>

                    <dt class=m>Ship Address</dt>
                    <dd class=m><input class="inputA" type=text size=60 name="_fid_9" id = "_fid_9" ></dd>

                    <dt class=m>Street 1</dt>
                    <dd class=m><input class="inputA" type=text size=60 name="_fid_10" id ="_fid_10"></dd>

                    <dt class=m>Street 2</dt>
                    <dd class=m><input type=text size=60 name="_fid_11" id = "_fid_11" ></dd>

                    <dt class=m>City</dt>
                    <dd class=m><input class="inputA" type=text size=60 name="_fid_12" id = "_fid_12" ></dd>

                    <dt class=m>State/Region</dt>
                    <dd class=m>
                        <select class="inputA"  name="_fid_13" id = "_fid_13" >
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>Arizona</option>
                            <option>Arkansas</option>
                            <option>California</option>
                            <option>Colorado</option>
                            <option>Connecticut</option>
                            <option>Delaware</option>
                            <option>District of Columbia</option>
                            <option>Florida</option>
                            <option>Georgia</option>
                            <option>Hawaii</option>
                            <option>Idaho</option>
                            <option>Illinois</option>
                            <option>Indiana</option>
                            <option>Iowa</option>
                            <option>Kansas</option>
                            <option>Kentucky</option>
                            <option>Louisiana</option>
                            <option>Maine</option>
                            <option>Maryland</option>
                            <option>Massachusetts</option>
                            <option>Michigan</option>
                            <option>Minnesota</option>
                            <option>Mississippi</option>
                            <option>Missouri</option>
                            <option>Montana</option>
                            <option>Nebraska</option>
                            <option>Nevada</option>
                            <option>New Hampshire</option>
                            <option>New Jersey</option>
                            <option>New Mexico</option>
                            <option>New York</option>
                            <option>North Carolina</option>
                            <option>North Dakota</option>
                            <option>Ohio</option>
                            <option>Oklahoma</option>
                            <option>Oregon</option>
                            <option>Pennsylvania</option>
                            <option>Rhode Island</option>
                            <option>South Carolina</option>
                            <option>South Dakota</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Utah</option>
                            <option>Vermont</option>
                            <option>Virginia</option>
                            <option>Washington</option>
                            <option>West Virginia</option>
                            <option>Wisconsin</option>
                            <option>Wyoming</option>
                        </select>
                    </dd>

                    <dt class=m>Postal Code</dt>
                    <dd class=m><input class="inputA" type=text size=60 name="_fid_14" id = "_fid_14" ></dd>

                    <dt class=m>Country</dt>
                    <dd class=m><input class="inputA" type=text size=60 name=_fid_15 id = "_fid_15"></dd>

                    <dt class=m>Contact</dt>
                    <dd class=m><input class="inputA" type=text size=40 name=_fid_16 id = "_fid_16"></dd>

                    <dt class=m>Phone</dt>
                    <dd class=m><input class="inputA" type=text size=40 name=_fid_17 id = "_fid_17"></dd>

                    <dt class=m>Purpose of Sample Size</dt>
                    <dd class=m><textarea class="inputA" name=_fid_18 id = "_fid_18" rows=6 cols=60></textarea></dd>
                </dl>
            </div>
            <div id="part-b">
                <input type=hidden name=fform value=1>
                <dl>
                    <dt>Qty</dt>
                    <dd><input type=text size=40 name="f2_fid_7" id="f2_fid_7"></dd>
                    <!-- <dt>Related Product</dt>
                    <dd><input type=text size=40 name="f2_fid_8" ></dd> -->
                    <dt>Sku</dt>
                    <dd>
                        <!--<input type=text size=40 name="f2_fid_9" >-->
                        <div id="rel-product">
                            <select name="f2_fid_8" id="prod-sel">
                                <option value=""> Select a product </option>
                            </select>
                        </div>
                        <input type=hidden size=40 name="f2_fid_9" id="f2_fid_9">
                    </dd>
                    <dt>Description</dt>
                    <dd><input type=text size=40 name="f2_fid_10" id="f2_fid_10"></dd>
                    <dt>List</dt>
                    <dd><input type=text size=40 name="f2_fid_11" id="f2_fid_11"></dd>
                    <!-- <dt>Related Sales Sample Request</dt>
                    <dd><input type=text size=40 name="f2_fid_12" id="f2_fid_12"></dd> -->
                </dl>
                <div class="form_submit"><input type=submit value=Save></div>
            </div>


            <input type=hidden name=rdr value='http://'>
        </form>
    </body>
</html>
