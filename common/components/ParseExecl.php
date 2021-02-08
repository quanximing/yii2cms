<?php

namespace common\components;

/**
 * 使用PHPEXECL导入
 *
 * @param string $file      文件地址
 * @param int    $sheet     工作表sheet(传0则获取第一个sheet)
 * @param int    $columnCnt 列数(传0则自动获取最大列)
 * @param array  $options   操作选项
 *                          array mergeCells 合并单元格数组
 *                          array formula    公式数组
 *                          array format     单元格格式数组
 *
 * @return array
 * @throws Exception
 */

//excel 方法
class ParseExecl
{

    function importSomeExecl($file, $inputFileType, $sheetname)
    {
        /* 转码 */
//        $file = iconv("utf-8", "gb2312", $file);

        //设置读取的类型
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($file);
        $sheetCount = $spreadsheet->getSheetCount();
        //获取表中数据
        $tableData = self::getTableData($sheetCount, $spreadsheet);
        //把头部信息设置成key值

        return $tableData;
    }

    function importSomeExeclB($file, $inputFileType, $sheetname)
    {
        /* 转码 */
//        $file = iconv("utf-8", "gb2312", $file);

        //设置读取的类型
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        $spreadsheet = $reader->load($file);
        $sheetCount = $spreadsheet->getSheetCount();
        //获取表中数据
        $tableData = self::getTableData($sheetCount, $spreadsheet);
        //把头部信息设置成key值

        return $tableData;
    }

    private function  getTableData( $sheetCount, $spreadsheet){

        $DataAry = array();
        //获取多个表的数据
        if( $sheetCount >1){
            $data = array();
            for ($i = 0; $i < $sheetCount; $i++) {
                $sheet = $spreadsheet->getSheet($i);
                $sheetData = $sheet->toArray(null, true, true, true);
                if($i === 0){
                    $data = $sheetData;
                }else{
                    foreach($data as $dvalue){
                        foreach ($sheetData as  $value) {
                            if(isset($dvalue['E']) && isset($value['F'])){
                                if ($dvalue['E'] === $value['F']) {
                                    array_push($value, $dvalue['F'], $dvalue['N']);
                                    $DataAry[] = $value;
                                }
                            }

                        }
                    }
                }
            }
        }else{
            //只有一个表的时候
            $DataAry = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        }
        return $DataAry;
    }

    private function  AssembleKeyValue($oldData){
        $keyAry =array();
        $DataAry =array();
        foreach( $oldData   as $k=>$subData ){
            if($k == 0){
                $keyAry = $subData;
            }else{
                foreach($subData  as $ke=>$value){
                    if($keyAry){
                        if (array_key_exists($ke, $keyAry)) {
                            $DataAry[$k][ $keyAry[$ke]] = $value;
                        }
                    }
                }
            }
        }
        return $DataAry;
    }
}

