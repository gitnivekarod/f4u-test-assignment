<?php


session_start();

# Initiate function

$result = $_POST['fn']($_POST);

function tag_add($post)
{
    extract($post);

    # Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("../data/shippinginfo.txt");
    # Convert to array 
    $array = json_decode($strJsonFileContents, true);

    foreach($array as $key => $entry)
    {
        
        if($entry['client_id'] == $clientid)
        {
            #update all the address first for this client
            $array[$key]['status']  = 0;

            $newJsonString = json_encode($array);
            file_put_contents('../data/shippinginfo.txt', $newJsonString);

        }      

    }

    # Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("../data/shippinginfo.txt");
    # Convert to array 
    $array = json_decode($strJsonFileContents, true);

    foreach($array as $key => $entry)
    {

        if($entry['id'] == $id)
        {
            #update the JSON
            $array[$key]['status']  = 1;

            $newJsonString = json_encode($array);
            file_put_contents('../data/shippinginfo.txt', $newJsonString);

        }      

    }

    $res['status'] = true;

    echo json_encode($res);


}

function delete_add($post)
{
    extract($post);

    # Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("../data/shippinginfo.txt");
    # Convert to array 
    $array = json_decode($strJsonFileContents, true);

    foreach($array as $key => $entry)
    {
        
        if($entry['id'] == $id)
        {
            unset($array[$key]);

            $newJsonString = json_encode($array);
            file_put_contents('../data/shippinginfo.txt', $newJsonString);

        }  
        

    }


     $res['status'] = true;

     echo json_encode($res);

}

function add_data($post)
{
    extract($post);

     # Get the contents of the JSON file 
     $strJsonFileContents = file_get_contents("../data/shippinginfo.txt");
     # Convert to array 
     $array = json_decode($strJsonFileContents, true);

     $count  = 0;
     $ctrall = 0;
     foreach($array as $key => $entry)
     {
        
        if($entry['client_id'] == $id)
        {
            $count++;

        }  
        
        $ctrall++;

     }

     if($count < 3)
     {
        if($count == 0)
        {
            $status = 1;
        }
        else
        {
            $status = 0;
        }
        
        $additionalArray = array(
            'id'        => $ctrall+1,
            'client_id' => $id,
            'street'    => $street,
            'city'      => $city,
            'zip'       => $zip,
            'country'   => $country,
            'status'    => $status
        );

        # Get the contents of the JSON file 
        $strJsonFileContents = file_get_contents("../data/shippinginfo.txt");
        # Convert to array 
        $array = json_decode($strJsonFileContents, true);

        //append additional json to json file
        $array[] = $additionalArray ;
        $jsonData = json_encode($array);

        file_put_contents('../data/shippinginfo.txt', $jsonData); 

        $res['status'] = true;
        $res['msg'] = 'Successfully added';
        
     }
     else
     {
        $res['status'] = false;
        $res['msg'] = 'Maximum of 3 Address only';
     }

     echo json_encode($res);

}

function update_data($post)
{
    extract($post);

    # Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("../data/shippinginfo.txt");
    # Convert to array 
    $array = json_decode($strJsonFileContents, true);

    foreach($array as $key => $entry)
    {

        if($entry['id'] == $id)
        {
            #update the JSON
            $array[$key]['street']  = $street;
            $array[$key]['city']    = $city;
            $array[$key]['zip']     = $zip;
            $array[$key]['country'] = $country;

            $newJsonString = json_encode($array);
            file_put_contents('../data/shippinginfo.txt', $newJsonString);

        }      

    }

    $res['status'] = true;

    echo json_encode($res);


}


function get_client_data($post)
{
    extract($post);
    # Get the contents of the JSON file 
    $strJsonFileContents = file_get_contents("../data/shippinginfo.txt");
    # Convert to array 
    $array = json_decode($strJsonFileContents, true);

    $res = array("iTotalRecords"=>0,"iTotalDisplayRecords"=>0,"aaData"=>array());

    $rec_array = array();
    $i = 0;

    // var_dump($array);
    foreach($array as $records)
    {
        
        if($records['client_id'] == $client_id)
        {
            $rec_array[$i]['id']          = $records['id'];
            $rec_array[$i]['street']      = $records['street'];
            $rec_array[$i]['city']        = $records['city'];
            $rec_array[$i]['zip']         = $records['zip'];
            $rec_array[$i]['country']     = $records['country'];
            $rec_array[$i]['status']      = $records['status'];

            $i++;
        }


    }
    $res['aaData'] = $rec_array;	


    echo json_encode($res);
}


function cleanData($str) 
{
    $str = mb_detect_encoding($str, "UTF-8") == "UTF-8" ? $str : utf8_encode($str);
    $str = trim(preg_replace('/\s+/',' ',htmlspecialchars_decode(strip_tags($str))));
    return $str;
}

?>