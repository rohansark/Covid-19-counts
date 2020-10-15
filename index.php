 <?php

 /**   $url = 'https://api.covid19india.org/v2/state_district_wise.json';
    $jsonCont = file_get_contents($url);
    $sum = 0;
    $content = json_decode($jsonCont, true);

    foreach($content as $states)
    {
        
        echo $states["state"] . '<br>';

        foreach($states as $districts)
        {

            if(is_array($districts) || is_object($districts))
            {
                foreach($districts as $data)
                {
                  echo $data["district"] . '<br>';
                  echo $data["confirmed"] . '<br>';
                  $sum=$sum+$data["confirmed"]; 
                }
            }
            
        }
        echo 'Total confirmed case :' . $sum . '<br>';
        $sum=0;
    }

    $json = '
{
    "foo": "foo value",
    "bar": "bar value",
    "baz": "baz value"
}';

$assoc = json_decode($json, true);
foreach ($assoc as $key => $value) {
    echo "The value of key '$key' is '$value'", PHP_EOL;
}
error_reporting (E_ALL ^ E_NOTICE);
  $url = 'https://api.covid19india.org/data.json';
  $jsonCont = file_get_contents($url);
  $content = json_decode($jsonCont, true);
  foreach($content as $value)
  {
   #  "The value of key '$key' is '$value'", PHP_EOL;
    foreach($value as $data)
    {
      echo $data["state"].'<br>';
    }
  }
  
  */
  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
    <title>Covid19 | India Cases</title>
        
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;>
        <a class="navbar-brand" href="#"><strong>Sarkar Corp.</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Hospital</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
              </li>
            </li>
          </ul>
        </div>
    </nav>
    <div class="jumbotron">
        <h2>CORONAVIRUS COVID19 INDIA COUNT</h2>
        <p class="lead">INDIA COVID-19 TRACKER - 
            A SOUVIK SARKAR INITIATIVE
            </p>
    </div>
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-sm-3 blue ">
          <h5>Total Confirmed Cases</h5>
          <p class="lead">
            <?php
               # error_reporting (E_ALL ^ E_NOTICE);
                $url = 'https://api.covid19india.org/data.json';
                $jsonCont = file_get_contents($url);
                $content2 = json_decode($jsonCont, true);
                        echo $content2['statewise'][0]['confirmed'].'<br>';
                        echo '['.'+'.$content2['statewise'][0]['deltaconfirmed'].']';
                  
            ?>
          </p>
        </div>
        <div class="col-sm-3">
          <h5 class="title has-text-info">Active Cases</h5>
          <p class="lead">
          <?php
                error_reporting (E_ALL ^ E_NOTICE);
                $url = 'https://api.covid19india.org/data.json';
                $jsonCont = file_get_contents($url);
                $content2 = json_decode($jsonCont, true);
                echo $content2['statewise'][0]['active'].'<br>';
          
            ?>
          </p>
        </div>
        <div class="col-sm-3 green">
          <h5>Recovered</h5>
          <p class="lead">
          <?php
                error_reporting (E_ALL ^ E_NOTICE);
                $url = 'https://api.covid19india.org/data.json';
                $jsonCont = file_get_contents($url);
                $content2 = json_decode($jsonCont, true);
                echo $content2['statewise'][0]['recovered'].'<br>';
                echo '['.'+'.$content2['statewise'][0]['deltarecovered'].']';
          
            ?>
          </p>
        </div>
        <div class="col-sm-3 red">
          <h5>Death</h5>
          <p class="lead">
          <?php
                error_reporting (E_ALL ^ E_NOTICE);
                $url = 'https://api.covid19india.org/data.json';
                $jsonCont = file_get_contents($url);
                $content2 = json_decode($jsonCont, true);
                echo $content2['statewise'][0]['deaths'].'<br>';
                echo '['.'+'.$content2['statewise'][0]['deltadeaths'].']';
          
            ?>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">State</th>
            <th scope="col">Confirmed Cases</th>
            <th scope="col">Active Cases</th>
            <th scope="col">Recovered</th>
            <th scope="col">Death</th>
          </tr>
        </thead>
        <tbody>
          <?php
               error_reporting (E_ALL ^ E_NOTICE);
               $url = 'https://api.covid19india.org/data.json';
               $jsonCont = file_get_contents($url);
               $content = json_decode($jsonCont, true);
               $i=1;
               $content=$content["statewise"];
               foreach($content as $value)
               {
                  
                   echo '<tr>';
                   echo '<td>'.$i++.'</td>';
                   echo '<td>'.$value["state"].'</td>';
                   echo '<td>'.$value["confirmed"].' '.'['.'+'.$value["deltaconfirmed"].']'.'</td>';
                   echo '<td>'.$value["active"].'</td>';
                   echo '<td>'.$value["recovered"].' '.'['.'+'.$value["deltarecovered"].']'.'</td>';
                   echo '<td>'.$value["deaths"].' '.'['.'+'.$value["deltadeaths"].']'.'</td>';
                   echo '</tr>';
                   
                 
               }
            ?>
        </tbody>
      </table>    
    </div>
    <div class="footer text-center">
      <p>@Souvik Sarkar 2020</p>
    </div>
    
    


</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>