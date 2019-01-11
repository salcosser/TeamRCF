<style>
    .dropdown > a:hover{
        text-decoration: none;
        color: white;
    }
    .dropdown >a:focus{
        text-decoration:none;
         color: white;
    }
    .dropcontent a:hover{
        text-decoration:none;
    }
    #search_button{
        border:none;
        border-radius:5px;
        padding:7px;
        margin-left:0px;
        background-color:#ff8c1a;
        transition:.5s;
    }
    #search_button:hover{
        border:none;
        border-radius:5px;
        padding:7px;
        margin-left:0px;
        background-color:#ffa64d;   
    }
</style>

<nav> 
    <ul class="topnav" id="myTopnav">
               <li class="link"><a href="http://localhost/teamrcf/index.php">
                   <span class="glyphicon">&#xe021;</span>
                   </a>
                </li>
                <li class="dropdown" style="text-decoration:none;color:white;">
                      <a href="javascript:void(0)" class="dropbtn" onclick="myFunctionRe()" id="TeamResourcesBtn"><h5>Team <br> Resources</br></h5></a>
                        <div class="dropcontent" id="Resourcesdown">
                            <a href="http://localhost/teamrcf/pages/TeamFiles.php"><p>Team Files</p></a>
                            <a href="http://localhost/teamrcf/pages/TeamForum.php"><p>Team Forum</p></a>
                        </div>
                </li>
                <li class="link"><a href="http://localhost/teamrcf/pages/AboutUs.php"><h4>About Us</h4></a></li>
                <li class="link"><a href="http://localhost/teamrcf/pages/Contact.php"><h4>Contact</h4></a></li>
                <li class="link">
                    <a href="http://localhost/teamrcf/pages/gallery.php"><h4>Gallery</h4></a>
                </li>
                <li style="float:right;top:20px; margin-right:50px;">
                    <form method="get" name="search" action="http://localhost/teamrcf/php/Search.php" >
                    <input type='search' name="SeQue" placeholder="search" cols="30" style="border:none;margin-right:0px;padding:5px"/>
                        <i class="fa fa-search"><button id="search_button" type='submit' value="search" name="search"/></i>
                    </form>
                    
                    
                    
                </li>
                    
                <li class="icon">
                    <a href="javascript:void(0);" onclick="DropMenu()">&#9776;</a>
                </li>
     </ul>
</nav>