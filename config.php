<?php

ob_start();
define('DEBUG', 'False');

include('credentials.php');

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));


date_default_timezone_set('America/Los_Angeles');
if (isset($_GET['today'])) {
    $currentDay = $_GET['today'];
} else {
    $currentDay =  Date('l');
}

//Navbar 

$nav['index.php'] = 'Home';
$nav['./daily.php'] = 'City of the Day';
$nav['./cities.php'] = 'Top 7 Cities';
$nav['./contact.php'] = 'Contact Us';
$nav['./about.php'] = 'About';


function makeLinks($nav)
{
    $myReturn = '';
    foreach ($nav as $key => $value) {
        if (THIS_PAGE == $key) {
            $myReturn .= '<li><a href=" ' . $key . ' " class = "active"> ' . $value . ' </a></li>';
        } else {
            $myReturn .= '<li><a href=" ' . $key . ' "> ' . $value . ' </a></li>';
        }
    }

    return $myReturn;
}


//Form
$name = '';
$email = '';
$tel = '';
$privacy = '';
$bank = '';
$city = '';


$nameErr = '';
$emailErr = '';
$telErr = '';
$privacyErr = '';
$bankErr = '';
$cityErr = '';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['name'])) {
        $nameErr = 'Please fill out your Complete Name';
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $emailErr = 'Please fill out your email!';
    } else {
        $email = $_POST['email'];
    }
    if ($_POST['bank'] == 'NULL') {
        $bankErr = 'Please pick a banking institution!';
    } else {
        $bank = $_POST['bank'];
    }
    if (empty($_POST['city'])) {
        $cityErr = 'What, no Cities?';
    } else {
        $city = $_POST['city'];
    }
    if (empty($_POST['tel'])) {
        $telErr = 'Please right your cellphone';
    } else {
        $tel = $_POST['tel'];
    }
    if (empty($_POST['privacy'])) {
        $privacyErr = 'Please agree to our Privacy Rules';
    } else {
        $privacy = $_POST['privacy'];
    }

    function myCities()
    {
        $myReturn = '';
        if (!empty($_POST['city'])) {
            $myReturn = implode(',', $_POST['city']);
        }
        return $myReturn;
    }

    if (empty($_POST['tel'])) {  // if empty, type in your number
        $telErr = 'Your phone number please!';
    } elseif (array_key_exists('tel', $_POST)) {
        if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['tel'])) { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
            $telErr = 'Invalid format!';
        } else {
            $tel = $_POST['tel'];
        }
    }

    if (isset($_POST['name'],
    $_POST['bank'],
    $_POST['city'],
    $_POST['tel'],
    $_POST['privacy'])) {
        $to = 'szemeo@mystudentswa.com';
        $subject = 'Test Email' . date('m/d/y');
        $body = '' . $name . ' has filled out your form ' . PHP_EOL . '';
        $body .= 'Email: ' . $email . ' ' . PHP_EOL . '';
        $body .= 'Your phone number: ' . $tel . ' ' . PHP_EOL . '';
        $body .= 'Your Cities ' . myCities() . ' ' . PHP_EOL . '';
        $body .= 'Bank: ' . $bank . ' ' . PHP_EOL . '';

        $headers = array(
            'From' => 'admin@example.com',
            'Reply-to' => ' ' . $email . ''
        );

        mail($to, $subject, $body, $headers);
        header('Location: thx.php');
    }
}

//Switch 

switch (THIS_PAGE) {
    case 'index.php':
        $spreadSheet = "<link rel='stylesheet' href='css/styles.css' />";
        $title = 'Best cities to retire';
        $body_class = "<body class='$currentDay' id='home'>";
        $wrapper_class = "<main class='wrapper'>";
        $headLine = "<img src='images/logo.png' alt='Logo'>";
        $image = "<img src='./images/$currentDay.jpg' class='day' alt='City of the Day' />";
        break;

    case 'daily.php':
        $spreadSheet = "<link rel='stylesheet' href='./css/styles.css' />";
        $title = 'City of the Day';
        $body_class = "<body class='$currentDay' id='daily'>";
        $image = "<img src='./images/$currentDay.jpg' class='day' alt='City of the Day' />";
        switch ($currentDay) {
            case "Monday":
                $wrapper_class = "<main class='wrapper'>";
                $headLine = "<img src='images/logo.png' alt='Logo'>";
                $message = "<h2>Brevard, a hidden jewel in North Carolina</h2>";
                $quotes = "
                <p>Varied town of waterfalls and mountains with 8,000 persons, south of Asheville in state’s western panhandle.. </p>
                </br>

            <p> It has a Median home price $218,000, 13% below national median. </p>
            </br>
            
                <p>The Cost of living is 1% below national average</p>";

                break;
            case "Tuesday":
                $wrapper_class = "<main class='wrapper'>";
                $headLine = "<img src='images/logo.png' alt='Logo'>";
                $message = "<h2>Charlotte, the perfect urban lifestyle</h2>";
                $quotes = "
                <p>Robust banking center of 860,000 in the Piedmont Plateau center of the Carolinas.  </p>
                </br>

            <p> Median home price $224,000, 10% below national median.  </p>
            </br>
            
                <p>Cost of living 7% above national average and an advantage that is good weather</p>";

                break;
            case "Wednesday":
                $wrapper_class = "<main class='wrapper'>";
                $headLine = "<img src='images/logo.png' alt='Logo'>";
                $message = "<h2>Nature at it's finest, meet Winchester</h2>";
                $quotes = "
                    <p>Verdant city of 28,000 in Shenandoah Valley, located 75 miles west of Washington D.C.</p>
                        </br>

                    <p> It has a Median home price $247,000, 1% below national median, and a affordable cost of living 8% above national average. </p>
                    </br>
                    
                        <p>A big advantage it's is  good ratio of doctor's in the city.</p>";

                break;
            case "Thursday":
                $wrapper_class = "<main class='wrapper'>";
                $headLine = "<img src='images/logo.png' alt='Logo'>";
                $message = "<h2 >Enjoy Clearwater's delicious beaches</h2>";
                $quotes = "                
                <p>Sunny city of 116,000 wedged between Gulf of Mexico and Tampa Bay.  Cost of living 5% above national average.</p>
                </br>

            <p> Median home price $211,000, 15% below national median. </p>
            </br>
            
                <p>Cost of living 5% above national average. It has a high amount of doctors and good air quality</p>";

                break;
            case "Friday":
                $wrapper_class = "<main class='wrapper'>";
                $headLine = "<img src='images/logo.png' alt='Logo'>";
                $message = "<h2 >Enjoy Delray, a warm ocean breeze</h2>";
                $quotes = "
                <p>Festive Atlantic Ocean beach city of 69,000, north of Fort Lauderdale.  </p>
                </br>

            <p>  Median home price $205,000, 18% below national median. </p>
            </br>
            
                <p>Cost of living 10% above national average however it has an abundance doctors per capita.</p>";

                break;
            case "Saturday":
                $wrapper_class = "<main class='wrapper'>";
                $headLine = "<img src='images/logo.png' alt='Logo'>";
                $message = "<h2 >Looking for a quiet retirement? Maryville it is</h2>";
                $quotes = "
                <p>Great Smoky Mountains foothills town of 29,000, 18 miles south of Knoxville in eastern Tennessee. </p>
                </br>

            <p>Median home price $182,000, 27% below national median.</p>
            </br>
            
                <p>Cost of living 1% below national average.</p>";

                break;
            case "Sunday":
                $wrapper_class = "<main class='wrapper'>";
                $headLine = "<img src='images/logo.png ' alt='Logo'>";
                $message = "<h2 >Sun city will remind you the flavor of paradise</h2>";
                $quotes = "
                <p>Age-restricted Phoenix suburb of 40,000.  </p>
                </br>

            <p> Median home price $180,000, 28% below national average. </p>
            </br>
            
                <p> Cost of living 3% above national average. Good ratio of physicians per capita</p>";

                break;
        }


    case 'cities.php':
        $spreadSheet = "<link rel='stylesheet' href='css/styles.css' />";
        $title = 'Top Cities';
        $body_class = "<body class='$currentDay' id='cities'>";
        $wrapper_class = "<main class='wrapper'>";
        $headLine = "<img src='images/logo.png' alt='Logo'>";
        $image = "<img src='./images/$currentDay.jpg' class='day' alt='City of the Day' />";
        break;

    case 'contact.php':
        $spreadSheet = "<link rel='stylesheet' href='css/styles.css' />";
        $title = 'Email Us';
        $body_class = "<body class='$currentDay'>";
        $wrapper_class = "<main class='wrapper'>";
        $headLine = "<img src='images/logo.png' alt='Logo'>";
        $image = "<img src='./images/$currentDay.jpg' class='day' alt='City of the Day' />";
        break;

    case 'about.php':
        $spreadSheet = "<link rel='stylesheet' href='css/styles.css' />";
        $title = 'Get to know us';
        $body_class = "<body class='$currentDay' id='about'>";
        $wrapper_class = "<main class='wrapper'>";
        $headLine = "<img src='images/logo.png' alt='Logo'>";
        break;
    case 'thx.php':
        $spreadSheet = "<link rel='stylesheet' href='css/styles.css' />";
        $title = 'Thank you';
        $body_class = "<body class='$currentDay' id='home'>";
        $wrapper_class = "<main class='wrapper'>";
        $headLine = "<img src='images/logo.png' alt='Logo'>";
        $image = "<img src='./images/$currentDay.jpg' class='day' alt='City of the Day' />";
        break;

    default:
        $spreadSheet = "<link rel='stylesheet' href='css/styles.css' />";
        $title = 'City Details';
        $body_class = "<body class='$currentDay'>";
        $wrapper_class = "<main class='wrapper'>";
        $headLine = "<img src='images/logo.png' alt='Logo'>";
        $image = "<img src='./images/$currentDay.jpg' class='day' alt='City of the Day' />";
        break;
}

//Errors 

function myerror($myFile, $myLine, $errorMsg)
{

    if (defined('DEBUG') && DEBUG) {

        echo 'Error in file: <b> ' . $myFile . ' </b> on line: <b> ' . $myLine . ' </b>';
        echo 'Error message: <b> ' . $errorMsg . '</b>';
        die();
    } else {
        echo ' Houston, we have a problem!';
    }
}
