<?php 

namespace App\Controller;

use App\Database\DB;

class Call 
{
    /**
     * get all available calls from database by date
     * 
     * @return array
     */
    public function countAllByDate(): array
    {
        $sql = "SELECT * FROM `calls` WHERE `rdate` BETWEEN CURDATE()-7 AND CURDATE() ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $calls = [];
        $data = $stmt->fetchAll();
        foreach ($data as $call) {
            $temp['date'] = (new \DateTime($call['rdate']))->format('D');
            if(isset($calls[$temp['date']])){
                $temp2 = $calls[$temp['date']];
                $temp2++;
                $calls[$temp['date']] = $temp2;
            }else{
                $calls[$temp['date']] = 1;
            }
        }
        return $calls;
    }

    /**
     * get all available Meaningfull calls from database by date
     * 
     * @return array
     */
    public function countMeaningfullByDate(): array
    {
        $sql = "SELECT * FROM `calls` WHERE `status` = '1' AND `rdate` BETWEEN CURDATE()-7 AND CURDATE() ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $calls = [];
        $data = $stmt->fetchAll();
        foreach ($data as $call) {
            $temp['date'] = (new \DateTime($call['rdate']))->format('D');
            if(isset($calls[$temp['date']])){
                $temp2 = $calls[$temp['date']];
                $temp2++;
                $calls[$temp['date']] = $temp2;
            }else{
                $calls[$temp['date']] = 1;
            }
        }
        return $calls;
    }

    /**
     * get count of all available calls from database
     * 
     * @return int
     */
    public function countAll(): int 
    {
        $sql = "SELECT COUNT(*) FROM `calls`";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data[0];
    }

    /**
     * get count of all available Meaningfull calls from database
     * 
     * @return int
     */
    public function countMeaningfull(): int 
    {
        $sql = "SELECT COUNT(*) FROM `calls` WHERE `status` = '1'";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data[0];
    }
}