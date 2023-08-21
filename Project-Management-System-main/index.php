<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management Home</title> 
  <link rel="stylesheet" href="./css/input.css">
  <?php require_once "./include/links.php" ?>
</head>

<body id="HomeDiv">
  <?php require "./include/db.php" ?>
  <!-- navbar -->
  <?php require_once "./include/nav.php" ?>
  
  
 



  <div class="main-container" >
    <?php
    $query1 = "select * from users order by UID desc;";
    $data1 = mysqli_query($con, $query1);

    $query2 = "select * from tasks order by TID desc;";
    $data2 = mysqli_query($con, $query2);

    $add_user_click = false;
    if (isset($_POST["add-user-btn"])) {
      $new_username = $_POST['new-username'];
      $add_user_click = true;
      if ($new_username != "" && $add_user_click) {
        echo "<script>
          const date = new Date();
          let year = date.getFullYear();
          let month = formatData(date.getMonth() + 1);
          let day = formatData(date.getDate());
          let hour = formatData(date.getHours());
          let mins = formatData(date.getMinutes());
          let secs = formatData(date.getSeconds());
          let ms = formatMillisecond(date.getMilliseconds());
          
          function formatData(num) {
            return num < 10 ? '0' + num : num + '';
          }
          
          function formatMillisecond(num) {
            if (num < 10) return '00' + num;
            if (num < 100) return '0' + num;
            return num + '';
          }
          
          let UID = 'UID' + year + month + day + hour + mins + secs + ms;
          document.cookie = 'pms_new_UID='+ UID;
      </script>";

        $new_UID = $_COOKIE['pms_new_UID'];

        try {
          $query = "insert into users values('" . $new_UID . "', '" . $new_username . "');";
          $execute = mysqli_query($con, $query);

          if ($execute) {
            echo "<script>
                alert('" . $new_UID . ": " . $new_username . " has been added');
                window.open('index.php', '_self');
              </script>";
          } else {
            echo "<script>
                alert('Something went wrong!\n" . $new_username . " is not added, please try again!');
              </script>";
          }
        } catch (Exception $ex) {
        }
      }
    }

    $delete_user_btn_click = false;
    if (isset($_POST['delete-user-btn'])) {
      $delete_user_btn_click = true;
      $selected_user = $_COOKIE['PMS_user'];
      if ($selected_user != "Invalid" && $selected_user != "" && $delete_user_btn_click) {
        try {
          $query1 = "delete from users where UID = '" . $selected_user . "';";
          $query2 = "delete from posts where UID = '" . $selected_user . "';";

          $execute1 = mysqli_query($con, $query1);
          $execute2 = mysqli_query($con, $query2);

          if ($execute1 || $execute2) {
            echo "<script>
                alert('User removed successfully!');
                
                history.back();
                window.open('index.php');
              </script>";
          }
        } catch (Exception $ex) {
          "<script>
                alert('User removed successfully!');
                history.back();
              </script>";
        }
      }
    }

    $add_task_btn_click = false;
    if (isset($_POST['add-task-btn'])) {
      $add_task_btn_click = true;
      $new_task = $_POST['task-desc'];
      $selected_user = $_COOKIE['PMS_user'];
      $status = "In progress";

      if ($new_task != "" && $add_task_btn_click && $selected_user != "Invalid" && $selected_user != "") {
        echo "<script>
        const date = new Date();
        let year = date.getFullYear();
        let month = formatData(date.getMonth() + 1);
        let day = formatData(date.getDate());
        let hour = formatData(date.getHours());
        let mins = formatData(date.getMinutes());
        let secs = formatData(date.getSeconds());
        let ms = formatMillisecond(date.getMilliseconds());
        
        function formatData(num) {
          return num < 10 ? '0' + num : num + '';
        }
        
        function formatMillisecond(num) {
          if (num < 10) return '00' + num;
          if (num < 100) return '0' + num;
          return num + '';
        }
        
        let TID = 'TID' + year + month + day + hour + mins + secs + ms;
        document.cookie = 'pms_new_TID='+ TID;
      </script>";

        $new_TID = $_COOKIE['pms_new_TID'];
        $user = "";
        try {
          $query = 'select username from users where UID = "' . $selected_user . '";';
          $data = mysqli_query($con, $query);

          if (!$data) {
            echo "No user selected!";
          } else {
            $row = mysqli_fetch_assoc($data);
            $user = $row['username'];
          }

          $query = "insert into tasks values('" . $new_TID . "', '" . $user . "', '" . $new_task . "', '" . $status . "', '" . $selected_user . "');";
          $execute = mysqli_query($con, $query);

          if ($execute) {
            echo "<script>
                alert('Task added successfully!');
                window.open('index.php', '_self');
              </script>";
          }
        } catch (Exception $ex) {
        }
      } else {
        echo "<script>
                alert('Ops, something wrong!');
              </script>";
      }
    }
    ?>



    <div class="img" >
      <img src="./img/project management logo.jpg" alt="" width=100% height=100%>
    </div>




    <main>
      <div style="margin-top:-30px;" class="main-sub-container">
        <form action="?" method="post" enctype="multipart/form-data">
          <div class="add-user">
            <div class="add-user-title">New User</div>
            <input type="text" name="new-username" placeholder="Name" class="textfeild" id="new-user-name">
            <button type="submit" class="button blue" id="add_user_btn" name="add-user-btn">Add User</button>
          </div> <br>
          <div class="operation">
            <div class="select">
              <select name="select-user" class="select-user" id="select-user" onchange="getSelectedUser()">
                <option selected disabled>Select user</option>
                <?php
                while ($row = mysqli_fetch_assoc($data1)) {
                  $username = $row["username"];
                  $UID = $row['UID']; ?>
                  <option value="<?php echo $UID ?>"><?php echo $username ?></option>
                  <?php
                }
                ?>
              </select>
            </div> <br>
            <button type="submit" class="button red" id="delete-user-btn" name="delete-user-btn">Delete User</button>
          </div> <br>
          <div class="add-task-section">
            <input type="text" class="textfeild" id="task-desc" name="task-desc" placeholder="Describe task"><br>
            <button type="submit" class="button blue" id="add-task-btn" name="add-task-btn">Add Task</button>
          </div>
        </form>
      </div>
    </main>
  </div>
  <br><br><br>
  


  
  <hr color="black" id="UsersDiv">
 <p class="heading">TASKS ASSIGNED</p> 
 <div class="result" id="UsersDiv">
        <div class="result-container">
            <?php
            while ($row = mysqli_fetch_assoc($data2)) {
                $TID = $row['TID'];
                $username = $row['username'];
                $task = $row['task'];
                $status = $row['status']; ?>

                <div class="task" id="<?php echo $TID ?>">
                    <div class="task-item">User: <?php echo $username ?></div>
                    <div class="task-item">Task allocated: <?php echo $task ?></div>
                    <div class="task-item">Status: <?php echo $status ?></div>
                    <div class="task-item hidden" name="TID"><?php echo $TID ?></div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<br>


 


<hr color="black" id="DeveloperDiv">
 <p class="heading">DEVELOPER DETAILS</p>
<div  >  
  <?php require_once "./include/Developer.html" ?>
</div> 

<!-- footer -->
<hr color="black" id="feedbackDiv">
 <p class="heading">ABOUT US</p>
<div >
    <script >
    let allTasks = document.querySelectorAll(".task");
let select_user = document.getElementById("select-user");
let add_user_btn = document.getElementById("add_user_btn");
let selectedUser = "Invalid";

document.cookie = "PMS_user=Invalid";
function getSelectedUser() {
  selectedUser = select_user.value;
  document.cookie = "PMS_user=" + selectedUser;
}

allTasks.forEach((task) => {
  task.addEventListener("click", () => {
    document.cookie = "PMS_tid=" + task.id;
    window.location.replace("./pages/view-task.php");
  });
});

  </script>
</div>

  <?php require_once "./include/footer.php" ?>
    </body>
</html>





<style>
  .heading {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    padding: 10px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
}


/* result*/ 
.result-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 10px;
    margin:auto;
    width:50%;
padding : 10px;

    
}

.task {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f0f0f0;
    display: flex;
    flex-direction: column;
}

.task-item {
    margin: 5px 0;
    font-weight: bold;
}

.hidden {
    display: none;
}


/*main*/
/* Reset default margin and padding */
.main-container
{ 
    margin: 0;
    padding: 0;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 100%;
    margin: 0 auto;
    padding: 5px;
}
main{
  width :300%;
    align-self : center;
    align-items : center;
    align-content : center;
    margin:auto;
    width:30%;
padding : 10px;
}

.main-sub-container {
    background-color: #fff;
    border-radius: 10px;
    width: 400px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    align-items : center;
    align-content : center;
}

.add-user-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.textfeild {
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.blue {
  background-color: #3498db;
    color: #fff;
}

.red {
    background-color: #e74c3c;
    color: #fff;
}

.select-user {
    padding: 5px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

  </style>