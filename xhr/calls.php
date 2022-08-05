<?php

use App\Controller\Call;

if(! isset($f) || ! isset($s)){
    echo 'Invalid API Endpoint!';
    exit;
}

if($f == null || $s == null){
    echo 'Invalid API Endpoint!';
    exit;
}

if($f == 'calls'){
    if($s == 'all'){
        $data = [];
        $call = new Call();
        $all = $call->countAllByDate();
        $count = $call->countAll();
        
        $data['status'] = 200;
        if($all){
            $data['count'] = $count;
            $data['data'] = $all;
        }else{
            $data['count'] = 0;
            $data['data'] = '';
        }
    
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }else if ($s == 'meaning'){
        $data = [];
        $call = new Call();
        $all = $call->countMeaningfullByDate();
        $count = $call->countMeaningfull();
        
        $data['status'] = 200;
        if($all){
            $data['count'] = $count;
            $data['data'] = $all;
        }else{
            $data['count'] = 0;
            $data['data'] = '';
        }
    
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
}