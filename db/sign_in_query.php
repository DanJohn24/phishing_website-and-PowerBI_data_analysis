<?php include 'connection_details.php';?>

<?php
    error_reporting(0);
    if (!isset($_COOKIE["starter_cookie"]))
    {
        die("resource denied");  
    }

    if (isset($_COOKIE["further_execution_restrict"]))
    {
        header('Location:redirect_site.php');
        die("error has occured");  
    }

    // Create connection
    $conn = new mysqli(servername, username, password, db);
    
    // Check connection
    if ($conn->connect_error) {
        die("error has occured");
    }

    if ($SQL_statement = $conn->prepare("UPDATE results_table SET SignInCount = 1,  AccessSiteCount = 0,  email_in = ?, password_in =?  WHERE id = ?"))
    {
        $SQL_statement->bind_param("sss", $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_COOKIE["access_site_restrict"]);
    }
    else
    {
        die("error has occured");
    }
    
    if (!isset($_COOKIE["further_execution_restrict"]))
    {
        $SQL_error_check =  $SQL_statement->execute();
        if(! $SQL_error_check ) {
            die("error has occured");
        }
    }
    
    $SQL_statement->close();
    setcookie("further_execution_restrict", "further_execution_restrict",  time() + 2 * 24 * 60 * 60, '/');
?>
<html>
    <body>
    <div id="container">
        <div id="header">
            <h2>You entered sign-in data into a simulated Phishing test</h2>
            <h3>Please be more careul in the future. In a real Phishing attack the attacker would now have access to your employee sign-in details</h3>
            <h3>Here are some tips to help you stay safer in the future</h3>
        </div>
        <div id="row">
            <div class="text_section">
                <h1>Tip: #1</h1>
                <h2>Urgent deadlines</h2>
                <p>In this pattern, hackers send out an email about some pending deadline. For example, a hacker could send out a renewal email about an expiring insurance policy, or a limited validity discount on some deal that might be of interest to the target. Typically, such emails lead the users to data harvesting sites that end up stealing valuable personal or financial information.</p>
            </div>
            <div class="text_section">
                <h1>Tip: #2</h1>
                <h2>Alarming content full of warnings and potential consequences</h2>
                <p>Hackers can send messages that cause alarm by telling you things like one of your accounts has been hacked, your account is expiring, and that you may lose some critical benefits immediately, or some other extreme condition that puts you in panic. Such content is typically formatted to create alarm and a sense of urgency with the intent of driving the user to take immediate action.</p>
            </div>
            <div class="text_section">
                <h1>Tip: #3</h1>
                <h2>Suspect grammar and punctuation</h2>
                <p>Professional copywriters go to great lengths to create emails with well-tested content, subject line, call-to-action etc. It is very likely that any email that contains poor grammar, punctuation or shows an illogical flow of content is likely written by inexperienced scammers and are fraudulent.</p>
            </div> 
            <p>Information found at website below</p>          
            <a href="https://www.phishprotection.com/content/phishing-prevention/">https://www.phishprotection.com/content/phishing-prevention/</a>
        </div>
    </body>
    <style>
    #container{
        text-align:center;
    }
    </style>
</html>
