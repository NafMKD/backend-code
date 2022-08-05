<?php

use App\Controller\Quotation;

if(! isset($f) || ! isset($s)){
    echo 'Invalid API Endpoint!';
    exit;
}

if($f == null || $s == null){
    echo 'Invalid API Endpoint!';
    exit;
}

if($f == 'quotaions'){
    if($s == 'agent'){
        $data = [];
        $call = new Quotation();
        $all = $call->countAllByAgent();
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
    }else if ($s == 'status'){
        $data = [];
        $call = new Quotation();
        $all = $call->countAllStatus();
        
        $data['status'] = 200;
        if($all){
            $data['count'] = 1;
            $data['data'] = $all;
        }else{
            $data['count'] = 0;
            $data['data'] = '';
        }
    
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }else if ($s == 'value'){
        $data = [];
        $call = new Quotation();
        $all = $call->countAllByAgentValue();
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
    }
}