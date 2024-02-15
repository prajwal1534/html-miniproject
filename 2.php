<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="styles.css" rel="stylesheet" />
  <style>
    #text {
      width: 12ch;
      animation:
        typing 2s steps(12),
        blink 0.5s step-end infinite alternate;
      white-space: nowrap;
      overflow: hidden;
      border-right: 3px solid;
    }

    #button {
      border-radius: 20px;
      width: 100px;

    }



    @keyframes typing {
      from {
        width: 0;
      }
    }

    @keyframes blink {
      50% {
        border-color: transparent;
      }
    }
  </style>
</head>

<body>
  <section class="flex flex-col min-h-screen bg-slate-800 text-white bg-center bg-cover bg-blend-overlay bg-fixed bg-black/30" style="background-image: url(&quot;map.png&quot;)">
    <div class="flex items-center h-20">
      <div class="mx-auto relative px-5 max-w-screen-xl w-full flex items-center justify-end">
        <div id="header" class="text-6xl uppercase font-title absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 mt-[30px] inline-block">
          <div class="whitespace-nowrap overflow-hidden w-[100%] animate-typing flex flex-row" id="text">
            <svg class="h-16 w-16 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
              <circle cx="12" cy="10" r="3" />
            </svg>
            <span>TRACKER-007</span>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-1 flex items-center justify-center">
      <div class="h-[500px] w-[700px] my-auto border-[4px] border-white/25 justify-center flex bg-white/20 shadow-2xl shadow-white animate-fade_in">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "tracker007";
        $conn = mysqli_connect($servername, $username, $password, $database_name);
        if (!$conn) {
          die("OOPS!! failed to connect: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM `dummy`";
        $result = mysqli_query($conn, $sql);

        if (!isset($_POST['track'])) {

          echo '<form method="POST" action="">
            <div class="flex flex-col">
            <div class="h-[140px] flex flex-col text-white font-mono justify-center items-center">
              <h1 class="text-4xl text-center">
                ENTER REGISTRATION NUMBER<br />(eg- KA05JJXXXX)
              </h1>
              <input name="regno" required type="text" class="h-[50px] border-[2px] border-white text-black uppercase w-[400px] bg-white/60 text-3xl" />
            </div>
            <div class="h-[140px] flex flex-col text-white font-mono justify-center items-center">
              <h1 class="text-4xl text-center">
                ENTER TRACKER ID<br />(eg- g67G4xx)
              </h1>
              <input name="id" required type="text" class="h-[50px] border-[2px] border-white text-black  w-[400px] bg-white/60 text-3xl" />
            </div>
            <div class="h-[140px] flex flex-col text-white font-mono justify-center items-center">
              <h1 class="text-4xl text-center">
                ENTER E-MAIL ID<br />(eg- xyz123@gmail.com)
              </h1>
              <input required name="email" type="text" class="h-[50px] border-[2px] border-white text-black w-[400px] bg-white/60 text-3xl" />
            </div>
            <div class="h-[80px] justify-center items-center flex">
              <input type="submit" name="track" class="h-[40px] rounded-lg w-[100px] text-center text-black bg-white text-2xl transition delay-100 duration-200 ease-in-out hover:-translate-y-1 hover:scale-110" />
            </div>
          </div> </form>';
        } else {
          $flag = 0;
          $regno = $_POST['regno'];
          $email = $_POST['email'];
          $id =
            $_POST['id'];

          if (preg_match('~^[a-zA-Z]{2}[0-9]{2}[a-zA-Z]{2}[0-9]{4}+$~', $regno)) {
            $flag++;
          } else {
            echo '<div class=" flex justify-center flex-col items-center">
            <h1 class="text-4xl bg-red-600 font-bold">Enter a valid vehicle Registration number</h1></br>
            <nav><a href="2.php"><button  class=" border-[2px] border-white rounded-xl w-[20px] " id="button">Go Back</button></a></nav></div>';
          }
          if (strlen($id) == 7) {
            $flag++;
          } else {
            echo  '<div class=" flex justify-center items-center flex-col animate-ping bg-red-600">
            <h1 id="alert" class="text-4xl bg-red-600 font-bold ">Enter a valid Tracker ID number</h1> </br>
            <nav><a href="2.php"><button  class=" border-[2px] border-white rounded-xl w-[20px] " id="button">Go Back</button></a></nav>
            
            </div>';
          }
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo  '<div class=" flex justify-center flex-col items-center">
            <h1 class="text-4xl bg-red-600 font-bold">Enter a valid email id</h1></br>
            <nav><a href="2.php"><button  class=" border-[2px] border-white rounded-xl w-[20px] " id="button">Go Back</button></a></nav></div>';
          } else {
            $flag++;
          }
          if ($flag === 3) {
            $flag1 = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              if (($row['REGISTRATION_NUMBER'] == $regno) && ($row['TRACKER_ID'] == $id) && ($row['E-MAIL'] == $email)) {
                $flag1 = 1;
              }
            }
            if ($flag1 == 1) {
              echo '<a href="https://www.google.com/maps"><img src="minimap.png" class="transition delay-100 duration-200 ease-in-out hover:-translate-y-1 hover:scale-110 object-fit mb-[30px] w-full" /></a>';
              echo '<script>alert("TRACKING SUCESSFUL!! Tap on the mini map for detailed view")</script>';
            } else {
              echo '<div class=" flex justify-center flex-col items-center">
              <h1 class="text-4xl bg-red-600 font-bold">OOPS!! Details do not match</h1></br>
              <nav><a href="2.php"><button  class=" border-[2px] border-white rounded-xl w-[20px] " id="button">Go Back</button></a></nav></div>';
            }
            //echo '<img src="minimap.png" class="object-fit mb-[30px] w-full" />';
            //echo '<script>alert("TRACKING SUCESSFUL!! Tap on the mini map for detailed view")</script>';
          }
        }
        ?>

      </div>
    </div>
  </section>

</body>

</html>