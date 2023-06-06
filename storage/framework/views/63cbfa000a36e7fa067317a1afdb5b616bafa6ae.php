<!DOCTYPE html>
<html>
<head>
  <title>Black Web Page</title>
  <style>
          .card {
            display: inline-block;
            vertical-align: top;
            width: 200px;
            height: 250px;
            margin: 10px;
            margin-top:125px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .row h1 {
      font-size: 24px;
      margin-top: 74px;
      font-family: Georgia, serif;
      /* float:left; */
      /* margin-left:12px; */
      margin-bottom: -94px;
      margin-right: auto;
    }
        .card h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }
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
      background-color:  rgb(31, 31, 31);
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

  <div class="row">
    <h1>Blog</h1>
    <?php $__currentLoopData = $getblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('detail-blog',$blog->id)); ?>">
            <div class="card">
                <img src="<?php echo e(asset('storage/blogs/' . $blog->image)); ?>" style="width: 200px; height: auto; object-fit: cover;" alt="Image">
              
                <h2 style="color:white">  <?php echo e(Str::limit($blog->title, 20)); ?></h2>
            </div>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /home/u493167285/domains/totalsporteky.com/public_html/resources/views/blog.blade.php ENDPATH**/ ?>