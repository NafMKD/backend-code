<?php 

declare(strict_types=1);

namespace App\Controller;

use App\Database\DB;

class Quotation 
{
    /**
     * get all available quotations from database by agent
     * 
     * @return array
     */
    public function countAllByAgent(): array
    {
        $sql = "SELECT * FROM `quotation` WHERE `rdate` BETWEEN CURDATE()-7 AND CURDATE() ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $quotations = [];
        $data = $stmt->fetchAll();
        foreach ($data as $quotation) {
            $temp['agent'] = $quotation['agent'];
            if(isset($quotations[$temp['agent']])){
                $temp2 = $quotations[$temp['agent']]['value'];
                $temp2++;
                $quotations[$temp['agent']]['value'] = $temp2;
            }else{
                $quotations[$temp['agent']] = ['name'=> 'Agent '.$temp['agent'],'value'=>1];
            }
        }
        return $quotations;
    }

    /**
     * get all available quotations from database by agent value
     * 
     * @return array
     */
    public function countAllByAgentValue(): array
    {
        $sql = "SELECT * FROM `quotation` WHERE `rdate` BETWEEN CURDATE()-7 AND CURDATE() ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $quotations = [];
        $data = $stmt->fetchAll();
        foreach ($data as $quotation) {
            $temp['agent'] = $quotation['agent'];
            if(isset($quotations[$temp['agent']])){
                $temp2 = $quotations[$temp['agent']]['value'] + $quotation['value'];
                $quotations[$temp['agent']]['value'] = $temp2;
            }else{
                $quotations[$temp['agent']] = ['name'=> 'Agent '.$temp['agent'],'value'=>$quotation['value']];
            }
        }
        return $quotations;
    }

    /**
     * get count of all available quotations from database
     * 
     * @return int
     */
    public function countAll(): int 
    {
        $sql = "SELECT COUNT(*) FROM `quotation`";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data[0];
    }

    /**
     * get count of all available quotations from database by status
     * 
     * @return int
     */
    public function countAllStatus(): int 
    {
        $sql = "SELECT COUNT(*) FROM `quotation` WHERE `status` = '1' ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data[0];
    }
}