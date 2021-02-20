<?php
$linkReload = URL::createLink($module, $controller, $action);
$linkAddNew = URL::createLink($module, $controller, 'form');

// Select Muti
$arrMuti  = array('default' => "--Bulk Action--", "multi-active" => "Multi Active", 'multi-inactive' => 'Multi Inactive', 'multi-delete' => 'Multi Delete');
$Muti     = Helper::creatStatus('bulk-action', 'custom-select custom-select-sm mr-1', $arrMuti, $this->arrParam["bulk-action"], 'width: unset', "bulk-action");

// Colum
$ID             = Html::creatFill('ID', 'ID', $this->arrParam['sort_field'], $this->arrParam['sort_order']);
$Name           = Html::creatFill('Name', 'name', $this->arrParam['sort_field'], $this->arrParam['sort_order']);
$Picture        = Html::creatFill('Picture', 'picture', $this->arrParam['sort_field'], $this->arrParam['sort_order']);
$Category_name  = Html::creatFill('Category_name', 'category_name', $this->arrParam['sort_field'], $this->arrParam['sort_order']);
$Status         = Html::creatFill('Status', 'status', $this->arrParam['sort_field'], $this->arrParam['sort_order']);

$colum = $ID . $Name .$Category_name . $Picture .   $Status . $ShowHome ;

?>
<div class="card card-info card-outline">
    <div class="card-header">
        <h4 class="card-title">Danh sách phim</h4>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
       

        <!-- List Content -->
        <form action="" method="post" class="table-responsive" id="form-table">
            <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="check-all">
                                <label for="check-all" class="custom-control-label"></label>
                            </div>
                        </th>
                        <?php echo $colum; ?>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $xhtml; ?>
                </tbody>
            </table>
        </form>
    </div>
</div>