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
    
      .page-body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .middle-div {
      background-color: #131212;
      color: #fff;
      padding: 20px;
      text-align: left;
      margin-top:40px;
      width: 774px;
      height: auto;
      margin-right:300px;
    }

    .middle-div h1 {
      text-align: left;
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
      margin-top:250px;
      padding: 20px;
      text-align: center;
      position: relative;
      bottom: 0;
      float:bottom;
      width: 100%;
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
    <div class="menu-container" style="margin-top:40px">
        <?php $__currentLoopData = $allleagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <a href="#" class="round-icon"><img src="<?php echo e(asset('storage/' . $item->image)); ?>" style="width: 58px; height: auto; object-fit: cover;" alt="Menu A"></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
    </div>
    <div class="middle-div">
      <h1><?php echo e($blog->title); ?></h1>
      <img src="<?php echo e(asset('storage/blogs/' . $blog->image)); ?>" style="width: 270px; height: auto; object-fit: cover;" alt="Menu A">
      <p style="font-size: 18px; font-family: monospace; flex-grow: 1; overflow: auto;"><?php echo e(strip_tags($blog->description)); ?></p>
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
</html>
<?php /**PATH /home/u493167285/domains/totalsporteky.com/public_html/resources/views/blog_detail.blade.php ENDPATH**/ ?>