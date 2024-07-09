<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   @php
       
 
       $a= 0;
$data = [];
$data['holter_id'] ='H-15161651';
$data['paciente_id'] ='P-5151';
$data['medico_id'] ='M-1565';

    while ($a <= 100) {
        $data['hora'] = random_int(0,24);
        $data['fc_min'] = random_int(60,100);
        $data['rc_medio'] = random_int(0,180);
        $data['fc_max'] = random_int(0,180);
        $a++;

        
    }
   $data = json_encode($data);
    
   
    @endphp

    
</body>
</html>