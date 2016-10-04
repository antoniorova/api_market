<?php
    // var_dump($_FILES);

    $url = "upload\images\\"; // e.g. http://localhost/myuploader/upload.php // request URL
    $numFiles = count($_FILES['uploads']["name"]);
    $nameFiles = array();
    $errmsg="Doesn't uploaded!";
    for($i=0; $i < $numFiles; $i++){
        $filename = $_FILES['uploads']["name"][$i];
        $nameFiles[] = array( "name"=> $filename);
        $filedata = $_FILES['uploads']['tmp_name'][$i];
        $filesize = $_FILES['uploads']['size'][$i];

        $putdata = @fopen($filedata, "r");
        $fp = @fopen($url.$filename, "w");

        while ($data = fread($putdata, 1024))
        {
            fwrite($fp, $data);
        }


        $a = fclose($fp);
        $b = fclose($putdata);

       /* if ($filedata != '')
        {
            $headers = array("Content-Type:multipart/form-data"); // cURL headers for file uploading
            $postfields = array("filedata" => "@$filedata", "filename" => $filename);
            $ch = curl_init();
            $options = array(
                CURLOPT_URL => $url,
                CURLOPT_HEADER => true,
                CURLOPT_POST => 1,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POSTFIELDS => $postfields,
                CURLOPT_INFILESIZE => $filesize,
                CURLOPT_RETURNTRANSFER => true
            ); // cURL options
            curl_setopt_array($ch, $options);
            curl_exec($ch);
            if(!curl_errno($ch))
            {
                var_dump(curl_getinfo($ch));
                $info = curl_getinfo($ch);
                if ($info['http_code'] == 200)
                    $errmsg = "File uploaded successfully";
            }
            else
            {
                $errmsg = curl_error($ch);
            }
            curl_close($ch);
        }
        else
        {
            $errmsg = "Please select the file";
        }*/
    }
    echo json_encode(array("data" => $nameFiles));  
/*// Correct: /Users/john/Sites/....
// Incorrect: http://localhost/...
$image = fopen($file_on_dir_not_url, "rb");

$curl = curl_init();
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $url);

curl_setopt($curl, CURLOPT_PUT, 1);
curl_setopt($curl, CURLOPT_INFILE, $image);
curl_setopt($curl, CURLOPT_INFILESIZE, filesize($file_on_dir_not_url));

$result = curl_exec($curl);
curl_close($curl); */
?>