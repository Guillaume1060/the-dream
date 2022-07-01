<?PHP
$countriesWithCurrency = [
            [
                'country' => 'Thailand',
                'localCurrency' => 'Bath',
                'ratePerOneEuro' => 37.24,
            ],
            [
                'country' => 'Colombia',
                'localCurrency' => 'Peso',
                'ratePerOneEuro' => 4339.55,
            ],
            [
                'country' => 'USA',
                'localCurrency' => 'US dollar',
                'ratePerOneEuro' => 1.05,
            ],
            [
                'country' => 'England',
                'localCurrency' => 'Livre Sterling',
                'ratePerOneEuro' => 0.86,
            ],
            [
                'country' => 'Albania',
                'localCurrency' => 'Lek',
                'ratePerOneEuro' => 118.99,
            ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The dream</title>
</head>

<!-- CCS PART  -->
<style type="text/css">
    html, body { margin: 0.3rem; font-family: Georgia; font-size: 1.2rem;}
    header { text-align: center; color: white; background-color: green; height: auto; font-size: 3rem}
    .contener { width: 500px; margin: auto;}
    article { margin-top: 50px; background: #6ca4da;
        border : solid 0.3rem;
        box-shadow: 8px 8px 0px #aaa; }
    #bouton {
        font-style:oblique;
        background-color: green;
        display: block;
        margin-left: auto;
        margin-right: auto;
        color:white;
        width: 10rem;
        height: 10rem;
        border-radius: 80%;
        font-size: 1.5rem;
        border : solid;
        box-shadow: 8px 8px 0px #aaa; 
    
    }
    h2, h1 {text-align: center; font-size: 2.5rem; margin-top: 0;}
    #result {   text-align: center;
                font-family: Georgia, 'Times New Roman', Times, serif;
                font-size: 2rem;            
    }
    h3 { text-align: center;}
    form{ margin-left: 0.5rem;}

    #texte, .select-style select {
        width: 70%;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;}

    @media screen and (max-width: 600px)
    {
        html, body { font-size: 1rem;}
        .contener { width: auto; margin: 0;}
    }

</style>
  <!-- END CSS -->

<body>

    <header>
        <h2> THE DREAM</h2>
    </header>

<div class="contener">
    <article>
        <h1>
            Currency Converter
        </h1>
        <h3>DESTINATION</h3>

<form action="" method="post">
    <label for="countryChoosed">Where are (or will) you ?</label>
    <div class="select-style">
    <select name="countryChoosed" id="countryChoosed">
    <option value="">Thailand or --Please choose a country--</option>
<?PHP
    foreach ($countriesWithCurrency as $country)
    {
        echo '<option value='.$country['country'].'>'.$country['country'].'</option>';
    }

echo '</select>';
echo '</div>';
echo '<form/>';
$countryChoosed = $_POST['countryChoosed'];
$indexOfcountryChoosed = array_search ($countryChoosed,array_column($countriesWithCurrency,'country'));
?>
<br/>

<form action="theDream.php" method="post">
<div class="select-style">
 <p>How many <?PHP echo $walletAmount.' '.$countriesWithCurrency[$indexOfcountryChoosed]['localCurrency'] ?> do you have ? <br/><input type="text" id="texte" name="wallet" /></p><br/>
 <p><input type="submit" id= "bouton" value="AM I RICH ?"></p>
</div>
</form>

<?PHP
if (!isset($_POST['wallet']))
{
	echo('Nothing in your pocket ?');
    return;
}	

$walletAmount = htmlspecialchars($_POST['wallet']);
$changewalletAmount = $walletAmount / $countriesWithCurrency[$indexOfcountryChoosed]['ratePerOneEuro'];
?>
<br/>
<p id="result"> So you have <?PHP echo $walletAmount.' '.$countriesWithCurrency[$indexOfcountryChoosed]['localCurrency'] ?><br/><br/> You own <?PHP echo $changewalletAmount ?> EUROS in your pocket ! </p>
    </article>
</div>
</body>
</html>

