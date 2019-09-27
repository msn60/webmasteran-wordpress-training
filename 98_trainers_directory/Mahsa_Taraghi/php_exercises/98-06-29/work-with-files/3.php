<?php
 $message='';
 $flag=false;
 $submit_clicked=0;
if(isset($_POST['submit'])){
//    var_dump($_POST);
    if(isset($_POST['name']) && !empty($_POST['name']) && ($_POST['name']!='' )&& isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['age']) && !empty($_POST['age']) && isset($_POST['gridRadios']) && !empty($_POST['gridRadios']) &&
        !empty($_POST['most-like-fcc']) && isset($_POST['most-like-fcc']) && isset($_POST['gridcheck']) && !empty($_POST['gridcheck'])
        && isset($_POST['comments']) && !empty($_POST['comments'] )  ){
//        var_dump($_POST);

        $file_handler=getcwd().'/Files-to-save-data/freecodecamp.txt';
        $handle = fopen($file_handler, 'a+') or die('Cannot open file:  '.$file_handler); //implicitly creates file
        foreach ($_POST as $key=>$value){
            if($key!='submit' && !is_array($value)){
                fwrite($handle,$key.' : '.$value.PHP_EOL);

            }
            elseif (is_array($value)){
                fwrite($handle,$key.' : ');
                foreach ($value as $key_check => $value_check){
                    fwrite($handle,$value_check." ");
                }
                fwrite($handle,PHP_EOL);
            }
        }
        fwrite($handle,'Date:'.getDateSystem().PHP_EOL.PHP_EOL);
        $flag=true;
        $submit_clicked=1;
        $message='Your data successfully saved!';
//        getDateSystem();
    }
    else{
        $message= 'Please fill all fields ! ';
        $flag=false;
        $submit_clicked=1;

    }
}
function getDateSystem(){
$mydate=getdate(date("U"));
return "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

}


?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Get path from user and delete directory</title>
    <!--    <link rel="stylesheet" href="bulma-0.7.5/css/bulma.min.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyle.css">

</head>
<html>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Get path from user and delete directory</title>
    <!--    <link rel="stylesheet" href="bulma-0.7.5/css/bulma.min.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/3.css">

</head>
<html>

<body>
<?php include 'sidebar.php'; ?>
<h1 id="title">Survey Form</h1>
<div id="message" style="margin: 10px; color:<?php echo $flag ?  'green': 'red';?>"><?php if($submit_clicked==1){echo $message; $submit_clicked=0;} ?></div>
<div class="myform">
    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ) ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-4 col-sm-offset-2">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" style="width: 26rem;">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-4 col-sm-offset-2">
                <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" style="width: 26rem;">
            </div>
        </div>
        <div class="form-group row">
            <label for="age" class="col-sm-4 col-form-label">Age</label>
            <div class="col-sm-4 col-sm-offset-2">
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" style="width: 26rem;">
            </div>
        </div>
        <div class="form-group row">
            <label for="selection-box-1" class="col-sm-4 col-form-label">Which option best describes your current role?</label>
            <div class="col-sm-4 col-sm-offset-2">
                <select class="custom-select custom-select-sm" name="discription-role">
                    <option disabled value>Select an option</option>
                    <option value="Student">Student</option>
                    <option value="Full Time Job">Full Time Job</option>
                    <option value="Full Time Learner">Full Time Learner</option>
                    <option value="Prefer not to say">Prefer not to say</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <legend  class="col-sm-4 col-form-label">How likely is that you would recommend freeCodeCamp to a friend?</legend>
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-check" >
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Definitely" >
                    <label class="form-check-label" for="gridRadios1">
                        Definitely
                    </label>
                </div>
                    <div class="form-check" >
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Maybe" >
                    <label class="form-check-label" for="gridRadios2">
                        Maybe
                    </label>
                    </div>
                    <div class="form-check" >
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="Not sure" >
                    <label class="form-check-label" for="gridRadios3">
                        Not sure
                    </label>
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label for="selection-box-2" class="col-sm-4 col-form-label">What do you like most in FCC:</label>
            <div class="col-sm-4 col-sm-offset-2">
                <select class="custom-select custom-select-sm" name="most-like-fcc">
                    <option disabled selected value>Select an option</option>
                    <option value="Challenges">Challenges</option>
                    <option value="Projects">Projects</option>
                    <option value="Community">Community</option>
                    <option value="Open Source">Open Source</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <legend  class="col-sm-4 col-form-label">Things that should be improved in the future(Check all that apply):</legend>
            <div class="col-sm-4 col-sm-offset-2">
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox1" value="Front-end Projects" >
                    <label class="form-check-label" for="checkbox1">
                        Front-end Projects
                    </label>
                </div>
                <div class="form-check" >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox2" value="Back-end Projects" >
                    <label class="form-check-label" for="checkbox2">
                        Back-end Projects
                    </label>
                </div>
                <div class="form-check" >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox3" value="Data Visualization" >
                    <label class="form-check-label" for="checkbox3">
                        Data Visualization
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox4" value="Challenges" >
                    <label class="form-check-label" for="checkbox4">
                        Challenges
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox5" value="Open Source Community" >
                    <label class="form-check-label" for="checkbox5">
                        Open Source Community
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox6" value="Gitter help rooms" >
                    <label class="form-check-label" for="checkbox6">
                        Gitter help rooms
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox7" value="Videos" >
                    <label class="form-check-label" for="checkbox7">
                        Videos
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox8" value="City Meetups" >
                    <label class="form-check-label" for="checkbox8">
                        City Meetups
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox9" value="Wiki" >
                    <label class="form-check-label" for="checkbox9">
                        Wiki
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox10" value="Forum" >
                    <label class="form-check-label" for="checkbox10">
                        Forum
                    </label>
                </div>
                <div class="form-check " >
                    <input class="form-check-input" type="checkbox" name="gridcheck[]" id="checkbox11" value="Additional Courses" >
                    <label class="form-check-label" for="checkbox11">
                        Additional Courses
                    </label>
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label for="suggestion" class="col-sm-4 col-form-label">Any Comments or Suggestions?</label>
            <div class="col-sm-4 col-sm-offset-2">
                <textarea  class="form-control" name="comments" id="suggestion" rows="3" placeholder="Enter your comment here..." style="width: 26rem;"></textarea>
            </div>
        </div>
        <br>
        <br>
        <div style="text-align: center">

            <button type="submit" class="btn btn-primary" id="submit-button" name="submit">Submit</button>

        </div>

    </form>

</div>




</body>
</html>
