<!DOCTYPE html>
<html>
<head>
  <title>Black Web Page</title>
  <style>
    body {
      background-color: #000;
      color: #fff;
      margin: 0;
      padding: 0;
    }
    
    .navbar {
      background-color: #222;
      padding: 6px;
      text-align: center;
    }
    
    .navbar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }
    
    .navbar ul li {
      display: inline-block;
      margin-right: -35px;
    }
    
    .navbar ul li a {
      display: inline-block;
      padding: 10px 20px;
      color: #fff;
      text-decoration: none;
    }
    
    .page-body {
      background-color: #111;
      padding: 40px;
      text-align: center;
    }
    
    .table-container {
  background-color: #222;
  padding: 160px;
  margin-top: 20px;
  text-align: left;
  width: 850px;
  margin-left: auto;
  margin-right: auto;
  height: auto;
  position: relative;
}
    .table-container .text {
  position: absolute;
  top: 20px; /* Adjust the margin-top value as per your preference */
  left: 20px; /* Adjust the margin-left value as per your preference */
  color: #fff;
}
.table-container .additional-text {
  position: absolute;
  top: 140px; /* Adjust the distance from the top as per your preference */
  left: 150px; /* Adjust the margin-left value as per your preference */
  color: #fff;
}

.navbar ul li a:hover {
  color: red;
}
    

    
    table {
      width: 100%;
      color: #fff;
      margin-bottom: 20px;
      margin-left: auto;
      margin-right: auto;
    }
    
    th, td {
      padding: 10px;
    }
    
    .footer {
       margin-top: 50px; 
      background-color: rgb(31, 31, 31);
      padding: 20px;
      text-align: center;
      position: relative;
      bottom: 0;
      float:bottom;
      width: 100%;
    }
    
    .round-icon {
      display: inline-block;
      padding: 8px 15px;
      color: #fff;
      text-decoration: none;
    } 
    
    .custom-button {
      background-color: red;
      color: white;right-text
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
    }
    .table-container .middle-text {
  text-align: center;
  margin-top: 20px; /* Adjust the margin-top value as per your preference */
  color: #fff;
}
.table-container .right-text {
  position: absolute;
  top: 140px; /* Adjust the distance from the top as per your preference */
  right: 20px; /* Adjust the margin-right value as per your preference */
  color: #fff;
}

    
    .round-button {
      margin-right: 30px;
      display: inline-block;
      padding: 8px 15px;
      background-color: #f8f1f1;
      border-radius: 22%;
      color: #222;
      text-decoration: none;
    }
    .text-light {
  color: white;
  margin-top:50px;
}
.link-container {
        margin-top: auto;
    }

    .link-container a {
        text-decoration: none;
        margin-right: 10px;
    }
    
    
    @media only screen and (max-width: 600px) {
      .navbar ul li {
        display: block;
        margin-bottom: 10px;
      }
      .table-container .right-text {
    position: static;
    margin-top: 20px; /* Adjust the margin-top value as per your preference */
    margin-right: 0;
    text-align: center;
  }
      .navbar ul li a {
        display: block;
        padding: 10px;
      }
      .table-container .additional-text {
    position: static;
    margin-top: 20px;
    text-align: center;
  }
      
      .table-container {
        padding: 10px;
        width: 300px;
        color: #fff;
      }
      
      th, td {
        padding: 5px;
      }
      
      th.dotted {
        border-right: 1px dotted #fff;
      }
      
      .round-icon img {
        width: 48px;
        height: 38px;
      }
    }
  </style>
</head>
<body>
  <div class="navbar">
    <ul>
      
      <li><a href="<?php echo e(route('all-leagues')); ?>" style="margin-right:10px">All</a></li>
        <?php if(isset($allleagues)): ?>
        <?php $__currentLoopData = $allleagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(route('all-leagues',$item->id)); ?>"><?php echo e($item->name ?? 'N/A'); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <li><a href="<?php echo e(route('all-blogs')); ?>">Blogs</a></li>


    </ul>
  </div>
  
  <div class="page-body">
    <div class="menu-container">
        <?php $__currentLoopData = $allleagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <a href="#" class="round-icon"><img src="<?php echo e(asset('storage/' . $item->image)); ?>" style="width: 58px; height: auto; object-fit: cover;" alt="Menu A"></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
    </div>
  

    <div class="table-container">
        <div class="text">
       <img src="<?php echo e(asset('storage/' . $detail_match->league->image)); ?>" style="width: 58px; height: auto; object-fit: cover;" alt="">

          <?php echo e($detail_match->league->name); ?>

          
         <p style="margin-left:61px;"> <?php echo e($detail_match->date_of_match); ?></p> 

        </div>

        
          <div class="additional-text"><img src="<?php echo e(asset('storage/team/' . $detail_match->home_image)); ?>" style="width: 123px; height: 117px; object-fit: cover;" alt="">
            <br><?php echo e($detail_match->home_name); ?>

          </div>
          <div class="middle-text"><span style="font-size:28px; font-weight:bold;"id="countdown"></span></div>
          <div class="right-text"><img src="<?php echo e(asset('storage/team/' . $detail_match->away_image)); ?>" style="width: 123px; height: 117px; object-fit: cover;" alt="">
            <br><?php echo e($detail_match->away_name); ?></div>
      </div>

    

    
   
  </div>
  
  <div class="footer">
    <div class="link-container">
      <a href="https://hesgoal-stream.com/" class="text-light" >Hesgoal
                          </a>  
                          <a href="https://www.totalsportek.soccer/"  class="text-light">TOTALSPORTEK</a> 
                          <a href="https://www.f1livestream.top/" class="text-light">F1 STREAMS</a>
                                <a href="https://footybite.to/"  class="text-light">SOCCER STREAMS</a>
      </div >       
    <hr style="border-color: white; width:80%;">
    <p style="text-align: centre; color:red;  font-size: 18px;">Disclaimer: None of the videos is hosted by this site. Streams hosted on external sites like Youtube etc are provided with links here. This site is not responsible <br> for the legality of the content. For legal issues, please contact appropriate media file owners/hosters.</p>
    <p>Copyrights © 2021-2022. All rights reserved</p>

  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  <?php
  date_default_timezone_set('Asia/Karachi');
  $startDateTime = new DateTime($detail_match->date_of_match . ' ' . $detail_match->start_time);
  $currentDateTime = new DateTime();
  $startTimestamp = $startDateTime->getTimestamp();
  $currentTimestamp = $currentDateTime->getTimestamp();
  $interval = max(0, $startTimestamp - $currentTimestamp);
  $start_time = $detail_match->start_time;
  ?>

  var countdownElement = document.getElementById('countdown');
  var interval = <?php echo $interval; ?>;
  var start_time = '<?php echo $start_time; ?>'; // Add quotation marks around the variable

  function updateCountdown() {
      var hours = Math.floor(interval / 3600);
      var minutes = Math.floor((interval % 3600) / 60);
      var seconds = interval % 60;

      countdownElement.textContent = hours.toString().padStart(2, '0') + ':' +
          minutes.toString().padStart(2, '0') + ':' +
          seconds.toString().padStart(2, '0');

      interval--;

      if (interval < 0) {
          clearInterval(countdownInterval);
          countdownElement.textContent = start_time;
      }
  }

  var countdownInterval = setInterval(updateCountdown, 1000);
  updateCountdown();
</script>

</html>
<?php /**PATH /home/u493167285/domains/totalsporteky.com/public_html/resources/views/detail.blade.php ENDPATH**/ ?>