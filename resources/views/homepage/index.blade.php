<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Managment System</title>
    <link rel="stylesheet" href="{{asset('home/style.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <section class="header">
        <nav>
          <img src="{{asset('home/logo3.png')}}">
          <h1 style="padding: 20px;color: #fff;">Dhaka University of Engineering & Technology,Gazipor-1707</h1>
              <div class="nav-links" id="navLinks">
                 
                <i class="fa fa-times" onclick="hideMenu()"></i>
                 <ul>
                      <li><a href="">Home</a></li>
                      <li><a href="{{route('register')}}">Registration</a></li>
                      <li><a href="">Galary</a></li>
                      <li><a href="">Service</a></li>
                      <li><a href="">About</a></li>
					  <li><a href="{{route('login')}}">Login</a></li>
                 </ul>
              </div>
              <i class="fa fa-bars"onclick="showMenu()"></i>
         </nav>
      <div class="text-box">
        <h1></h1>
        <p></p>


      </div>


    </section>
  <script>
    var navLinks=document.getElementById("navLinks");
    function showMenu(){
    navLinks.style.right="0";
    }
    function hideMenu(){
      navLinks.style.right="-200px";
    }

  </script>   
  
  <!-- section of feature-->
   <section class="">

    <h3><mark> Noties:</mark></h3>


   </section>

  <section class="secton">

    <h1 align="Center">Welcome</h1><hr/>
         <table>
             <tr>
                 <td width=50%>
                  <h2>Message from Vice-Chancellor</h2><br>
      
                      <img src="{{asset('home/image/image1.jpg')}}" ><h3> University  of  Engineering  &  Technology (DUET), Gazipur  is  situated  about  20  km from  Shahjalal International Airport , Dhaka  surrounded  by  scenic  beauty .  It  is  deemed  as  the  seat  of   learning  in  the  arena ‘Engineering  and  Technology’  across  the  country. Only  the diploma  students  can  avail   themselves  of enrolling here  to  be  graduates. The  M.Sc. and  Ph.D. programs are  open   for  all   eligible  ones  that  are  designed  to  foster future  scholars  and  practitioners, by  developing  an attitude to continue  studying  lifelong   and  capacity  to explore  specially  seeking the newest knowledge of Technology.
            
                  It  being  one   of  the  most  famous  educational  institutions , DUET, Gazipur  plays  a  pivotal  role  in  the concerned  domestic  and global  premises. At  this  juncture  of  the  change  of  global perspective, DUET, Gazipur is supposed to make an  epoch-making   turn.<br>
                  <br>
                  Best wishes<br>
                  Prof. Dr. Md. Habibur Rahman<br>
                  Vice-Chancellor<br>
                  Dhaka  University  of  Engineering  &  Technology (DUET), Gazipur</h3>
                 </td width=50%>
                 
                 
                <td>
                     <img src="{{asset('home/image/20161215_-391178807.jpg')}}" alt="Girl in a jacket" width="600" height="400">

                 </td>
             </tr>
             </table>



  </section>

</body>
</html>