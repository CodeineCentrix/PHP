<!DOCTYPE html>

<html>
    <head>
        <!--<link rel="stylesheet" href="../Resources/Stylesheets/homepage.css">-->
        <link rel="stylesheet" href="../Resources/Stylesheets/myStyles.css">
        <link rel="stylesheet" href="../Resources/Stylesheets/general.css">
        <link rel="icon" href="../Resources/Images/companylogo.ico" type="image/gif">
        <title>Help page</title>
        <style>
            body{
              margin: 0;
              padding: 0;
             
            }
         </style>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--Make white and grey sections for different topics, that way ensuring -->
        <?php include '../Resources/View/base_header.php'; ?>
        <div class="hlp-font">
            <h1>Welcome to Droplit Help page</h1>
            <h2>This page is mostly focused on helping with issues that may arise during the usage of our system, this page has been 
            cut down into different sections to make it a lot easier to read.  </h2>
            <div class="middle"><img src="../Resources/Images/help.gif"  alt="help"/></div>

        </div>
        
        <div class="grey">
            <div id="meter_read">
                <h1>How to record meter readings</h1>
                <p>Requirements</p>
                <ul>
                    <li>You are registered on our site</li>
                    <li>You are either a main resident or have been given recording permissions by your main resident</li>
                    <li>You are logged in</li>
                </ul>
                <p>In order to add your meter readings you need to know how to read your meter (the thing which measures your water), we'll assume that 
                you're on the meter reading page, if not get there by clicking meter readings on your menu bar(top left) then click the "help me read my meter reading" link
                an informative dialog will walk you through it. See image below</p>
                <div class="mid"><img src="../Resources/Images/mr2_LI.jpg"  alt="mr2_LI"/></div>
                <p>The next safe measure would be previewing your records before you decide to add a record because that actually ensures the readings are valid and 
                aren't corrupted thus leading to an error message such as "too small" or "too big". Previewing your recordings is done by the box labeled "Previous readings". Pick a date range and then 
               click the "find readings" button should there be any readings for the selected date range they will appear below the button</p>
                <div class="mid"><img src="../Resources/Images/mr2.png"  alt="mr2_LI"/></div>
                <p>The next step would be actually using the previewed readings if there are any to guide you adding a meter reading. Add the date of the reading and the meter reading in the "Add Reading" section
                then once that's done hit the "submit" button.</p>
                <div class="mid"><img src="../Resources/Images/mr4.png"  alt="mr2_LI"/></div>
                <p>Feedback is provided in the form of a toast, if it is not visible then there was an error that occurred such as a reading not being valid for the requested 
                date the error message will be displayed on the "Add recording" box, if such happens try repeating the above steps this time paying careful attention to previous recordings.
                </p>
                <div class="mid"><img src="../Resources/Images/mr5.png"  alt="mr2_LI"/></div>
                <p>This help topic is now concluded, you may return to the tab you had opened before reaching here if you got here using the context help or <a href="?action="> click here to return to main site</a> </p>
            </div>
        </div>
        
        <div class="white">
            <div>
                <h1>How to use and understand area statistics</h1>
                <p>Requirements</p>
                <ul>
                    <li>You are a registered user</li>
                    <li>You are logged in</li>
                </ul>
                <p>Area statistics is basically an overview of the area you are residing in, by default the system loads your registered location and finds the area statistics 
                such as which dam supplies you and also the dam level in terms of how full the dam is in percentage and also provides information to how much 
                you are charged by the municipality for your water. <br><br>
                
                We will assume that you are on the area statistics page if not head there by clicking the area statistics option on the menu bar(Top right)
                the page should automatically load itself with populated information, your page should look similar to this image below</p>
                <div class="mid"><img src="../Resources/Images/ars1.png"  alt="mr2_LI"/></div>
                
                <p>To understand this page, break it down into two sections. The first section being the area dam information then 
                the section being the prices the municipality is charging you for your water usage. See how we break it down below</p>
            
                <p>The first section tells you what the location(that is the area or suburb) is, then followed by the name of the dam
                and a graphical view of the dam level. Other area's enable you to view the same info but for other areas(we'll get to this)</p>
                <div class="mid"><img src="../Resources/Images/ars1_A.png"  alt="mr2_LI"/></div>
                <p>How you're charged for your water might look really complicated but don't worry it's actually really simple and easy to read and understand
                See municipalities bill for water usage according to what the dam level, each dam level has a state associated with and may vary 
                per municipality. Take the image below "normal state"<br>
                <br> it means that when the dam is categorized as normal then from 0 till 8 kiloliter's you don't pay anything but, <br>
                it's R9 for every kiloliter above the 8 kiloliters. once you've exceeded 16 kiloliter's then the price changes and it's R20 per kiloliter above the 16 kiloliter's.
                It's a little complicated but it's the way the municipality structured it. 
                </p>
                <div class="mid"><img src="../Resources/Images/ars1_B.png"  alt="mr2_LI"/></div>
                <p>Other areas is basically the same as above but just for another area. Select the area and then click the view area button
                and the page will look similar to what we have covered above</p>
                 <div class="mid"><img src="../Resources/Images/ars1_C.png"  alt="mr2_LI"/></div>
                <p>This help topic is now concluded, you may return to the tab you had opened before reaching here if you got here using the context help or <a href="?action="> click here to return to main site</a> </p>
            </div>
        </div>
        
        <div class="grey">
            <div>
                <h1>How to download your water usage PDF document(invoice)</h1>
                <p>Requirements</p>
                <ul>
                    <li>You are a registered resident</li>
                    <li>You are logged in</li>
                </ul>
                <p>Water usage PDF document is just another way we feel can be used to save water and make an estimate of how much you'll be paying for water before the month even ends
                should there be some residents who aren't using our system for whatever reason you could download it and place it on your fridge or whatever great use you find with it but the 
                possibilities are endless. </p>
                
                <p>We will assume that you are on the invoice page, if not get there by clicking "Get Invoice" on the menu(top left)
                once you're there pick the date ranges and then click the "Download PDF" button see image below</p>
                 <div class="mid"><img src="../Resources/Images/rp1.png"  alt="mr2_LI"/></div>
                 <p>Once that has been the next step will be waiting for it to download, this download estimated waiting time is based on your PC because we 
                 let your PC do the hard work of generating the document. Which is what makes this feature so powerful. you should see the download notification appear 
                 and based on your browser you'll see the document download. See image below</p>
                <div class="mid"><img src="../Resources/Images/rp2.png"  alt="mr2_LI"/></div>
                <p>Once it's done your document should look something like this one below note that it would correlate to the dates you picked in the above steps</p>
                <div class="mid"><img src="../Resources/Images/rp3.png"  alt="mr2_LI"/></div>
                <p>This help topic is now concluded, you may return to the tab you had opened before reaching here if you got here using the context help or <a href="?action="> click here to return to main site</a> </p>
            </div>
        </div>
        
        <div class="white">
            <div>
                <h1>How to view water usage report</h1>
                <p>Requirements</p>
                <ul>
                    <li>You are a registered resident</li>
                    <li>You are logged in</li>
                </ul>
                <p>Sometimes you are tired of looking at numbers and just wanna see a graphical element you know something that gives you an idea with minimal effort
                our water usage graph is exactly that - by default it attempts to load a months worth of readings ending today and if it doesn't find enough readings then it will give you an error message
                telling you to add some readings or ask a main resident to add readings based on what type of resident you are.</p>
                <p>We'll assume that you're on the water usage report page if not get there by clicking "view water usage report" on the menu bar(top left)
                use the date pickers to pick the dates you'd like to see the graphical representation of then click the "Generate Graph" button</p>
                <div class="mid"><img src="../Resources/Images/wu1.png"  alt="mr2_LI"/></div>
                <p>Once that's done a graph will automatically be generated for you, and will look something like below</p>
                <div class="mid"><img src="../Resources/Images/wu2.png"  alt="mr2_LI"/></div>
                <p>This help topic is now concluded, you may return to the tab you had opened before reaching here if you got here using the context help or <a href="?action="> click here to return to main site</a> </p>
            </div>
        </div>
        
        <div class="grey">
            <div>
                <h1>How to view recorded readings</h1>
                <p>Requirements</p>
                <ul>
                    <li>You are a registered resident</li>
                    <li>You are logged in</li>
                </ul>
                <p>Meter readings are really important to us because it's the only input we require from user but the amount of information we generate from them are enormous and very informative
                we provide a way to simply view these readings these are because you as a user would like to run your own numbers or create your own type of graph or informative output based on your meter readings</p>
                <p>We will assume you're on the "view meter readings" page if not get there by clicking "view meter readings" link on the menu
                once you're there use the date pickers to select the dates and then click the "submit" button </p>
                <div class="mid"><img src="../Resources/Images/vmr1.png"  alt="mr2_LI"/></div>
                <p>Then once you've submitted the data you'll receive your readings provided there is a match found for the selected time period</p>
                <div class="mid"><img src="../Resources/Images/vmr2.png"  alt="mr2_LI"/></div>
            <p>This help topic is now concluded, you may return to the tab you had opened before reaching here if you got here using the context help or <a href="?action="> click here to return to main site</a> </p>
            </div>
        </div>
        
        <div class="white">
            <div>
                <h1>How to post tips and tricks</h1>
                <p>Requirements</p>
                <ul>
                    <li>You are a registered resident</li>
                    <li>You are logged in</li>
                </ul>
                <p>Post&AMP;Tricks are fun ways we use to encourage people registered or not on tips on how to save water</p>
                <p>We will assume you're on the "Tips&AMP;Tricks" page if not get there by clicking "Tips&AMP;Tricks" link on the menu
                but login first if you're not yet logged in, then scroll to the middle of the page and enter the required data and then once that's done click the 
                click the "submit" button</p>
                <div class="mid"><img src="../Resources/Images/tpt2.png"  alt="mr2_LI"/></div>
                <p>Once that's concluded the tip will be posted for evaluation and if it was successful added then you'll see it when browsing the tips and tricks 
                otherwise you'll not see it. </p>
                
            <p>This help topic is now concluded, you may return to the tab you had opened before reaching here if you got here using the context help or <a href="?action="> click here to return to main site</a> </p>
            </div>
        </div>
    </body>
</html>
