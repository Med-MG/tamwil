<?php 

require __DIR__ . '/vendor/autoload.php';


if(isset($_POST['phone'])){
    //making a connection to the api
    $client = new \Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    $client->setAuthConfig(__DIR__ . '/tamwil.json');
    $client->setAccessType('offline');
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = "1fE_S_CtdaziHOmqcUmSxuG0UcPrJpzvKv_BMF4QdM2s";
    //making a connection to the api

    $phone = trim($_POST['phone']);
    $fullName= trim($_POST['full_name']);
    $area= trim($_POST['area']);
    $email= trim($_POST['email']);
    $loan= trim($_POST['loan']);

   

    //getting the last inserted row id
    $range = "tamwilsheet!A2:F";
    $response = $service->spreadsheets_values->get($spreadsheetId,$range);
    $values = $response->getValues();
    if (empty($values)) {
        $inc = 1;
    } else {
        // $mask = "%10s %-10s %s\n";
        $id = end($values)[0];
        $inc = $id + 1;
    }



    $range = "tamwilsheet!A2:F";
    $values = [
        [$inc, $fullName,  $phone, $email, $area, $loan],
    ];

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];

    $insert = [
        "insertDataOption" => "INSERT_ROWS"
    ];

    $result = $service->spreadsheets_values->append(
        $spreadsheetId,
        $range,
        $body,
        $params,
        $insert
    );

    echo json_encode(['code'=>200, 'msg'=>"La demande a été enregistrée"]);
}


function showpixles(){
    //making a connection to the api
    $client = new \Google_Client();
    $client->setApplicationName('Google Sheets API PHP Quickstart');
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $client->setAccessType('offline');
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = "1R_tbrlbR-k7haT_HW9C_Yy3J75QnKCURUxuU113AtEM";

    //getting the last inserted row id
    $rangepix = "ste!T2:U";
    $response = $service->spreadsheets_values->get($spreadsheetId,$rangepix);
    $values = $response->getValues();
    if (empty($values)) {
        print "No data found.\n";
    } else {
        // foreach ($values as $row) {
        //     // Print columns A and E, which correspond to indices 0 and 4.
        // echo  $row[0];
        // }
        var_dump($values);
    }
}


?>
