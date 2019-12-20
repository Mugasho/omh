<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/19/2019
 * Time: 6:09 PM
 */

$db=new omh\database\DB();
$assetTypes=$db->getAssetTypes();
?>


<!-- Apply form -->
<div class="card">
    <form method="post">

        <div class="card-body">
            <a href="<?php echo BASE_PATH .'assets/' ?>"
               class="btn btn-primary"><i class="icon-list-ordered"></i> All Assets </a>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Asset type:</label>
                        <select name="asset_type" data-placeholder="Choose an option..."
                                class="form-control form-control-select2" data-fouc>
                            <option>--select asset type--</option>
	                        <?php
	                        foreach ($assetTypes as $asset_type){
		                        echo '<option value="'.$asset_type['id'].'"  >'.$asset_type['asset_name'].'</option>';
	                        }
	                        ?>

                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Asset name: <span class="text-danger">*</span></label>
                        <input type="text" name="asset_name" class="form-control" placeholder="Enter asset name">
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <div class="content-divider text-muted">
                    <span class="px-2"><i class="icon-circle-down2"></i></span>
                </div>
            </div>
            <h6 class="font-weight-semibold mb-3">Asset value </h6>

            <div class="form-repeater">
                <div data-repeater-list="repeater-list">
                    <div data-repeater-item>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Current Value: <span class="text-danger">*</span></label>
                                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Value amount">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Period: <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input name="date_valued" id="date_valued"  class="form-control date-picker"
                                                   placeholder="Valuation date">
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-warning" data-repeater-delete><i class="icon-bin"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <button type="button" class="btn bg-blue" data-repeater-create > <i class="icon-plus2"></i> Add row
                </button>
            </div>

            <span class="form-text text-muted">For physical assets like equipment, you can use the rows to show the depreciated value over time.</span>

            <div class="mb-3">
                <div class="content-divider text-muted">
                    <span class="px-2"><i class="icon-circle-down2"></i></span>
                </div>
            </div>

            <h6 class="font-weight-semibold mb-3">Only valid for tangible (physical) assets </h6>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>supplier:</label>
                        <select name="supplier" data-placeholder="Choose an option..."
                                class="form-control form-control-select2" data-fouc>
                            <option></option>
                            <option value="netherlands">Riham</option>
                            <option value="hungary">Cocacola</option>
                            <option value="uk">United Kingdom</option>
                            <option value="germany">Germany</option>
                            <option value="other">...</option>
                            <option value="spain">Spain</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Serial No: </label>
                        <input type="text" name="serial" class="form-control" placeholder="Enter Serial Number">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Purchase Price: <span class="text-danger">*</span></label>
                        <input type="number"  name="pprice" class="form-control " placeholder="Enter purchase price">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Purchase Date: <span class="text-danger">*</span></label>
                        <input  name="pdate" class="form-control date-picker" placeholder="Purchase date">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Replacement Value: </label>
                        <input type="number"  name="rprice" class="form-control" placeholder="Replacement value">
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Replacement Date: </label>
                        <input type="text"  name="rdate" class="form-control date-picker" placeholder="Replacement date">
                    </div>

                </div>
            </div>
        </div>

        <fieldset class="card-body">
            <h6 class="font-weight-semibold mb-3">Upload files</h6>

            <div class="form-group">
                <label>Upload your asset files: </label>
                <input type="file" class="form-input-styled" data-fouc>
                <span class="form-text text-muted">Accepted formats: doc, docx, pdf. Max file size 2Mb</span>
            </div>

        </fieldset>

        <fieldset class="card-body">
            <h6 class="font-weight-semibold mt-1 mb-3">Other information</h6>

            <div class="form-group mb-0">
                <label>Additional information:</label>
                <textarea name="notes" rows="4" cols="4"
                          placeholder="If you want to add any info, do it here." class="form-control"></textarea>
            </div>
        </fieldset>

        <fieldset class="card-body">
            <button type="submit" class="btn bg-blue">Submit form <i class="icon-paperplane ml-2"></i></button>
            <button class="btn btn-light ml-3">Cancel</button>
        </fieldset>
    </form>
</div>
<!-- /apply form -->