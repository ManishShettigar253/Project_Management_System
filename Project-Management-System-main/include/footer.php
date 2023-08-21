<footer id="footer">
  <div id="slideContainer">
    <div id="slide1">
      <div id="desc">
        <div id="details">
        <h3> Project Management System is a platform from which employees and managers for collaboration and
          communication. If you have any queries please contact the developer.<br><br>
          Basically, It helps in alloting a task realated to ongoing or upcomming project for members of specific Team. 
          Moreover it also helps in tracking the progress of the task. It also handles data of Team members.<br><br><br>
        FUNCTIONS OF THIS SYSTEM : <br>
          - Add new user
    : a unique User ID will be created autamatically<br><br>
- Allocate task to particular user<br>
    : a unique Task ID will be created autamatically
    : default status will be 'In progress'<br><br>
- Manage Task<br>
    : Change the task
    : Change status
    : Delete the task<br><br>
- Delete User<br><br>
          
          You can also contact the technical Team <br>
          EMAIL : pms@gmail.com<br>
          CONTACT : 9876789876</h3>
        </div>
      </div>
      <div id="socialBtnContainer">
        <a href="https://www.facebook.com/"><i style="color:blue;" class="fa-brands fa-square-facebook"></i></a>
        <a href="https://www.instagram.com/"><i style="color:red;" class="fa-brands fa-instagram"></i></a>
        <a href="https://www.linkedin.com/in/"><i style="color:blue;" class="fa-brands fa-linkedin"></i></a>
      </div>
    </div>
 
  </div>
  <div id="developed">copyright @2023 Manish</div>
</footer>
<style>
  #footer {
    background-color: var(--dark);
    position: relative;
    margin-top: 4rem;
    box-shadow: 0 -5px 10px rgba(63, 60, 60, 0.2);
    z-index: 5;
    padding :0;
    margin :0;
}

#footer #desc {
    width: 100%;
    height: auto;
    background: var(--dark);
    padding: 3rem 0 2.2rem 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: 'Hind Madurai', sans-serif;
    cursor: default;
}

#footer #desc #title {
    color: var(--white);
    font-size: 1.7rem;
    padding-bottom: 0.3rem;
}

#footer #desc #details {
    color: var(--white);
    text-align: center;
    width: 80%;
    font-size: 1.1rem;
}

#footer #socialBtnContainer {
    background-color: var(--dark);
    width: 100%;
    height: auto;
    padding-bottom: 1rem;
    display: flex;
    font-size: 2rem;
    justify-content: center;
}

#footer #socialBtnContainer a {
    margin: 0 1.3rem;
    color: var(--white);
    transition: all 0.2s;
}

#footer #socialBtnContainer a:nth-child(1):hover {
    color: #46c29d;
}

#footer #socialBtnContainer a:nth-child(2):hover {
    color: #ca5769;
}

#footer #socialBtnContainer a:nth-child(3):hover {
    color: #5cc8fa;
}

#footer #feedbackBtnContainer {
    width: 100%;
    display: flex;
    justify-content: center;
    background-color: var(--dark);
    padding-bottom: 2rem;
}

#footer #feedbackBtnContainer #feedbackBtn {
    width: 13rem;
    font-size: 1rem;
    padding: 0.2rem 0;
    border-radius: 5px;
    cursor: pointer;
    color: #1c1332;
    font-family: 'Hind Madurai', sans-serif;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25);
    transition: all 0.3s;
}

#footer #feedbackBtnContainer #feedbackBtn:hover {
    background-color: var(--white);
    color: black;
}

#footer #developed {
    background: rgb(0, 30, 64);
    text-align: center;
    color: white;
    font-family: 'Hind Madurai', sans-serif;
    padding: 0.3rem 0;
    cursor: default;
    user-select: none;
}


  </style>