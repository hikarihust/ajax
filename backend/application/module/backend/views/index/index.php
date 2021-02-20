<?php
//pagination

$linkPa             = URL::createLink('admin','slider','index');
$arrCategoryName    = $this->arrCategoryName;

$xhtml = '';
$searchValue = $this->arrParam['search'] ?? '';
if(!empty($this->items)){
    foreach ($this->items as $item) {
        $checkbox       = Helper::showItemCheckbox($item['id']);
        $id             = Helper::highLight($item['id'], $searchValue);
        $name           = '<textarea class="filmName" id="'.$item['id'].'" cols="30" rows="5">'.$item['title'].'</textarea>';
        $linkStatus     = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'changeStatus', ['id' => $item['id'], 'status' => $item['status']]);
        $status         = Helper::showItemState($linkStatus, $item['status'],$item['id']);
        $linkDelete     = URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'trash', ['id' => $item['id']]);
        $category_name  = Helper::showItemSelect('category_name', $arrCategoryName, $item['category_name'], $id, '180px');
        $img            = Html::createImage($item['image'],$item['image'],'index','',array('width' => 100,'height' => 120));
        $buttonAction   = Html::createButtonAction(array('delete' => "javascript:trashSingle('$linkDelete')"));
        $xhtml .= '
        <tr id="tr-'.$id.'">
            <td class="text-center">
                ' . $checkbox . '
            </td>
            <td class="text-center">' . $id . '</td>
            <td class="text-center text-wrap position-relative" style="min-width: 180px" >' . $name . '</td>
            <td class="text-center position-relative">' . $category_name . '</td>
            <td class="text-center">' . $img . '</td>
            <td class="text-center position-relative">' . $status . '</td>
            <td class="text-center">'.$buttonAction.'</td>
        </tr>
        ';
    }
}else{
    $xhtml = ' <td class="text-center" colspan="9"> Không tìm thấy dữ liệu !!! </td>';
}



?>
<!-- List -->
<?php require_once 'elements/list.php' ?>