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
      /* background-color: #333; */
      color: #fff;
      text-decoration: none;
    }
    .navbar ul li a:hover {
  color: red;
}
    
    .page-body {
      background-color: #111;
      padding: 40px;
      text-align: center;
    }
    
    .table-container {
      background-color: #222;
      padding: 20px;
      margin-top: 20px;
      text-align: center;
      width: 850px;
      margin-left: auto;
      margin-right: auto;
      height: auto;
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
      background-color: rgb(31, 31, 31);
      padding: 20px;
      text-align: center;
      position: relative;
      bottom: 0;
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
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
    }
    .round-button {
      margin-right: 30px;
      display: inline-block;
      padding: 10px 41px;
      background-color: #f8f1f1;
      border-radius: 15px;
      color: #222;
      text-decoration: none;
    }
    .middle-div {
      background-color: none;
      color: #fff;
      margin-left:288px;
      padding: 20px;
      text-align: left;
      margin-top:40px;
      width: 774px;
      font-size:22px;
      height: auto;
      margin-right:300px;
    }
    .text-light {
  color: white;
  margin-top:50px;
}
.link-container {
        margin-top: 20px;
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
      
      .navbar ul li a {
        display: block;
        padding: 10px;
      }
      .custom-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
      }
      
      .table-container {
        padding: 10px;
        width: 300px;
      }
      
      th, td {
        padding: 5px;
      }
      th.dotted {
        border-right: 1px dotted #fff;
      }
    }

    /* Custom Styles for Table Rows */
    tr:not(:last-child) {
      border-bottom: 1px solid #fff;
    }
    
    /* Custom Color for Divider Line */
    tr:not(:last-child) td {
      border-bottom: 1px solid #fff;
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
  <?php if(isset($setvar)): ?>

    <div class="table-container">
        
      <table>
        <tr>
          <th><a href="#" class="round-button">Yesterday</a>
         <a href="#" class="round-button" style="background-color: #494747; color:#fff">Today</a>
         <a href="#" class="round-button">Tomorrow</a></th>
        </tr>
        <!-- Table content here -->
      </table>

    </div>
    <?php endif; ?>

    
    <div class="table-container">
      <table>
        <?php if(isset($allleague)): ?>
        
            
        
        <tr class="dotted"><th ><a href="#" class="round-icon"><img src="<?php echo e(asset('storage/' . $allleague->image)); ?>" style="width: 58px; height: auto; object-fit: cover;" alt="Menu A"></a>  <?php echo e($allleague->name); ?></th></tr>
        <?php $__currentLoopData = $allleague->match; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="dotted">
          <th ><?php echo e($item->home_team_name); ?></th>
          <th style="color: #686666;">
            <?php
          date_default_timezone_set('Asia/Karachi');
          
          $startDateTime = new DateTime($item->date_of_match . ' ' . $item->start_time);
          $currentDateTime = new DateTime();
          $timeRemaining = '';
          
          if ($startDateTime > $currentDateTime) {
              $interval = $startDateTime->getTimestamp() - $currentDateTime->getTimestamp();
              $hours = floor($interval / 3600);
              $minutes = floor(($interval % 3600) / 60);
          
              if ($hours > 0) {
                  $timeRemaining = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' and ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '');
              } elseif ($minutes > 0) {
                  $timeRemaining = $minutes . ' minute' . ($minutes > 1 ? 's' : '');
              } else {
                  $timeRemaining = 'Less than a minute';
              }
          
              $timeRemaining .= ' from now';
          } else {
              $timeRemaining = 'The match has started';
          }
          
          echo $timeRemaining;
          ?>
          </th>
          <th ><?php echo e($item->away_team_name); ?></th>
          
          <th><a href="<?php echo e(route('detail-match',$item->id)); ?>" class="custom-button" >
            Live stream
          </a></th>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php else: ?> 
        <?php $__currentLoopData = $allleagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
     

        <tr class="dotted"><th ><a style href="#" class="round-icon"><img src="<?php echo e(asset('storage/' . $item->image)); ?>" style="width: 58px; height: auto; object-fit: cover;" alt="Menu A"></a>  <?php echo e($item->name); ?></th></tr>
        <tr class="dotted">

     
<?php $__currentLoopData = $item->match; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($item->match->count() > 0 &&  $item->match->count() != 0): ?>
<tr>
<th><?php echo e($items->home_team_name); ?></th>
<th style="color: #686666;">
  <?php
date_default_timezone_set('Asia/Karachi');

$startDateTime = new DateTime($items->date_of_match . ' ' . $items->start_time);
$currentDateTime = new DateTime();
$timeRemaining = '';

if ($startDateTime > $currentDateTime) {
    $interval = $startDateTime->getTimestamp() - $currentDateTime->getTimestamp();
    $hours = floor($interval / 3600);
    $minutes = floor(($interval % 3600) / 60);

    if ($hours > 0) {
        $timeRemaining = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' and ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '');
    } elseif ($minutes > 0) {
        $timeRemaining = $minutes . ' minute' . ($minutes > 1 ? 's' : '');
    } else {
        $timeRemaining = 'Less than a minute';
    }

    $timeRemaining .= ' from now';
} else {
    $timeRemaining = 'The match has started';
}

echo $timeRemaining;
?>
</th>


<th><?php echo e($items->away_team_name); ?></th>

<th><a href="<?php echo e(route('detail-match',$items->id)); ?>" class="custom-button" >
  Live stream
</a></th>
</tr>

          <?php else: ?>
          <tr>
          <th></th>
          <th></th>
          <th></th>
        </tr>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
          
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      

        <!-- Table content here -->
      </table>
      
    </div>
    <div class="middle-div" style="font-family: Calibri, sans-serif ">
     <h1 style="margin-top:20.0pt;margin-right:0in;margin-bottom:6.0pt;margin-left:0in;line-height:115%; font-size:27px;font-family:Arial,sans-serif;font-weight:normal;"> Watch Reddit SOCCER STREAMS on FOOTYBITE</h1>

      Reddit Soccer Streams
       
      
      You can find the latest Reddit soccer Streams broadcasts here on Footybite.to
      
       <h2> A Guide to Footybite and Reddit Soccer Streams</h2>
       
      
      It is possible for users to post links to articles they find amusing on Reddit, a social networking site. A soccer stream is particularly appealing to soccer fans.
      
       
      
      Soccer fans can watch live soccer matches from home with a service called Reddit Soccer Streaming. Simply said, it is that easy. As a result of its many features, including live scoring, comments, and other features, Reddit Soccer Streaming is a fascinating website to visit if you enjoy sports. On Footybite.to, the greatest broadcasters provide a wide selection of free games featuring your favorite teams and athletes from across the globe.
      
       
      
     <h2>  Streaming soccer on Reddit: How to do it </h2>
       
      
      Without having to pay for cable or any other app subscription, you can follow your preferred teams and players thanks to Reddit Soccer Streams. The website features a wide range of content, including live streams, video, recaps, and even subreddits for specific games you could be curious about.
      
       
      
      <h2>Use Your Laptop, Smartphone, Or Smart TV To Watch Soccer </h2> 
       
      
      There are many ways to do things on the internet, including how-to guides and entertaining articles. You can watch live streaming of soccer games on your computer, laptop, or smartphone using Reddit Soccer Streams.
      
    <h2>  <b>SOCCER STREAMS or Footybite is Same ? </b> </h2> 
      Yes, Footybite Stream Soccer matches live while soccer streams stands for same, but it will be a little more difficult to discover soccer links on reddit while here this website broadcasts matches from all soccer leagues. 
      
       
      
      The popularity of soccer is really high. Soccer matches are popular among those who enjoy watching live broadcasts. These individuals may now more easily access the live broadcasts of their favorite teams and stars thanks to the increased use of social media.
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
    <p>Copyrights © 2021-2022. All rights reserved </p>

   
  </div>
</body>
</html>
<?php /**PATH /Users/hadi/Downloads/public_html/resources/views/home.blade.php ENDPATH**/ ?>