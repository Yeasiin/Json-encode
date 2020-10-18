<?php
require_once __DIR__ . '/config.php';
class API{
    function Select(){
        $db = new Connect;
        $users = array();
        $sql = "SELECT * FROM api_user ORDER BY id";
        $data = $db->prepare($sql);
        $data->execute();

        while( $output = $data->fetch(PDO::FETCH_ASSOC)){
            $users[$output['id']] = array(
                'id'    => $output['id'],
                'name'  => $output['name'],
                'age'   => $output['age']
            );
        }

        return json_encode($users);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();

?>