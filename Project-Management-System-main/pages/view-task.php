<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View task</title>
  <link rel="stylesheet" href="../css/input.css">
  <link rel="stylesheet" href="../css/view.css">
  <script src="https://kit.fontawesome.com/5099b17d5e.js" crossorigin="anonymous"></script>
  <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>



<body>
  <?php require_once "../include/db.php" ?>
  <!-- navbar -->
  <nav>
    <p class="title" href="Homediv">PROJECT MANAGEMENT SYSTEM - View Task</p>
  </nav>
<style>
  nav {
      background-color: #fa4ca3df;
      width: 100%;
      height: 4rem;
      display: flex;
      position: fixed;
      align-items: center;
      justify-content: space-between; /* Add spacing between logo and links */
      padding: 0 2rem; /* Add horizontal padding */
      color: white;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      letter-spacing: 0.7px;
     z-index: 10;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

  </style>





  <header>
    <?php
    $TID = $_COOKIE['PMS_tid'];
    echo "<script>
          console.log('" . $TID . "');
          const searchParams = new URLSearchParams(window.location.search);
          searchParams.set('', '" . $TID . "');
          const newPath = window.location.pathname + '?' + searchParams.toString();
          history.pushState(null, '', newPath);
        </script>";

    if (isset($_POST["save-btn"])) {
      $new_status = "";
      try {
        $new_status = $_POST['complete'];
      } catch (Exception $ex) {
        $new_status = "In progress";
      }

      $new_task = $_POST['task-view'];

      if (strlen($new_task) > 0) {
        try {
          $query = "update tasks set task = '" . $new_task . "', status = '" . $new_status . "' where TID = '" . $TID . "';";
          $execute = mysqli_query($con, $query);

          if ($execute) {
            echo "<script>
                    alert('Task updated successfully!');
                    window.open('../index.php', '_self');
                  </script>";
          } else {
            echo "<script>
                    alert('Task not updated!');
                  </script>";
          }
        } catch (Exception $e) {
          echo "<script>
                    alert('Something wrong, please try again!');
                  </script>";
        }
      } else {
        echo '<script>
            alert("Please write a task");
            </script>';
      }
    }

    if (isset($_POST["delete-btn"])) {
      $query = "delete from tasks where TID='" . $TID . "';";
      $execute = mysqli_query($con, $query);

      if ($execute) {
        echo "<script>
                alert('Task deleted successfully!');
                window.open('../index.php', '_self');
              </script>";
      } else {
        echo "<script>
                alert('Task not deleted!');
              </script>";
      }
    }

    $query = "select * from tasks where tid = '" . $TID . "'";
    $result = mysqli_query($con, $query);

    if (!$result) {
      echo "could not find!";
    } else {
      $row = mysqli_fetch_assoc($result);
      $username = $row['username'];
      $task = $row['task'];
      $status = $row['status'];
      $UID = $row['UID'];
    }

    echo "<script>
          document.cookie = 'PMS_status=" . $status . "';
        </script>";
    ?>
    
    
    <br><br><br><br><br><br><br>
    
    <div class="main-view-container">
      <form action="?" method="post" enctype="multipart/form-data">
        <div class="user-name text">
          User:
          <?php echo $username ?>
        </div>
        <div class="user-id text">
          User ID: <span class="id">
            <?php echo $UID ?>
          </span>
        </div>
        <div class="user-task">
          <div class="task-title text">Task ID: <span class="id">
              <?php echo $TID ?>
            </span> </div>
          <input type="text" name="task-view" class="textfeild" id="task-view" value="<?php echo $task ?>"
            placeholder="Task">
        </div>
        <div class="check-container">

          <?php $check = ($status == 'Completed') ? "checked" : "" ?>
          <input type="hidden" id="complete" name="complete" value="In progress">
          <input type="checkbox" name="complete" id="complete" value="Completed" <?php echo $check ?>>
          <label for="complete" class="text">Completed?</label>
        </div>
        <div class="btn-container">
          <button type="submit" class="button green" id="save-btn" name="save-btn">SAVE</button>
          <button type="submit" class="button red" id="delete-btn" name="delete-btn" >DETETE TASK</button>
        </div>
      </form>
      <button onclick="window.location.replace('../');" type="submit" class="button blue" id="back-btn" name="back-btn">BACK</button>
    </div>
  </header>
<style>
  *{
    
    font-family: Arial, sans-serif;
    
  }
  #back-btn {
    background-color: #3498db;
    color: white;
    transition: all 0.2s;
    border : #000
  }
  #delete-btn {
    background-color: #e74c3c;
    color: white;
    transition: all 0.2s;
    border : #000
  }
  
  #save-btn {
    background-color: green;
    color: white;
    transition: all 0.2s;
    border : #000
  }
  
  </style>


</body>

</html>