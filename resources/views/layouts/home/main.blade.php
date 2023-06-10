<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Black Web Page</title>
        {{-- <link rel="stylesheet" type="text/css" href="{{url('css/common.css')}}"> --}}
        <link rel="stylesheet" type="text/css" href="{{url('css/icons.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/dark.css')}}">
        <style>
            body {
                background-color: #111;
                color: #fff;
                margin: 0;
                padding: 0;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }

            .container{
                max-width: 1140px;
                margin: auto;
            }

            .rounded-lg{
                border-radius: 0.3rem!important;
            }

            .bg-light-grey{
                background-color: #d4d4d4;
            }

            .navbar {
                display: flex;
                position: relative;
                justify-content: center;
                background-color: #222;
                padding: 0 20px;
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

            .div-child-box
            {
                border-bottom: 0.1px dashed grey;
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

            .menu-container {
                display: flex;
                justify-content: center;
                background: #111;
            }

            .page-body {
                background-color: #111;
                padding: 40px;
                text-align: center;
            }

            .table-container {
                background-color: #222;
                padding: 20px;
                text-align: center;
                height: auto;
            }

            table {
                width: 100%;
                color: #fff;
                margin-bottom: 20px;
                margin-left: auto;
                margin-right: auto;
            }

            th,
            td {
                padding: 10px;
            }

            .footer {
                background-color: rgb(31, 31, 31);
                /* padding: 20px; */
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
                margin-left: 288px;
                padding: 20px;
                text-align: left;
                margin-top: 40px;
                width: 774px;
                font-size: 22px;
                height: auto;
                margin-right: 300px;
            }

            .text-light {
                color: white;
                margin-top: 50px;
            }

            .link-container {
                margin-top: 20px;
            }

            .link-container a {
                text-decoration: none;
                margin-right: 10px;
            }

            
            .dropdown:hover>.dropdown-menu {
                display: block;
            }
            #dropdownMenuButton{
                background:none;
                border:none;
            }
            @media  only screen and (max-width: 600px) {
                .nav-res{
                    position:absolute;
                    top:0px;
                    left:-1000px;
                }
                
                .dropdown-menu{
                    left:30%;
                }
                
                #dropdownMenuButton{
                    color: var(--mainColor) !important;
                }
                
                #font-md-10 {
                    font-size: unset !important;
                }
            }
            .left-0{
                left: 0px !important;
            }



            

            @media (min-width: 576px){
                /* .container{
                    max-width: 540px;
                } */
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

                th,
                td {
                    padding: 5px;
                }

                th.dotted {
                    border-right: 1px dotted #fff;
                }
            }
            
            @media (min-width: 768px){
                /* .container{
                    max-width: 720px;
                } */
            }

            @media (min-width: 992px){
                /* .container{
                    max-width: 960px;
                } */
            }
            

            /* Custom Styles for Table Rows */
            tr:not(:last-child) {
                border-bottom: 1px solid #fff;
            }

            /* Custom Color for Divider Line */
            tr:not(:last-child) td {
                border-bottom: 1px solid #fff;
            }

            .news-right-sec{
        padding: 0px;
    }
    .news-right-sec-div{
        border: solid 4px;
        padding: 0px;
    }
    .news-right-sec h2{
        color: #212529;
        background-color: #f8f9fa;
        border-color: #d4d4d4;
        font-size: 1rem;
        border: solid 3px;
        text-align:center;
    }
    .pad-10{
        padding:5px 10px;
    }
    .news-heading{
        border: solid 2px #fff;
        padding: 2px 10px;
    }
    .txt-white{
        color:#fff;
    }
    .news-image{
      max-width:100%;
  }
  .news_section{
      color:#fff;
  }
    #showBtn{
        cursor:pointer;
        float:right;
        margin-top:5px;
    }
    
        .home-icon{
            display:none;
        }
      
      @media  screen and (max-width:767px) {
          
          .navbtndiv{
              padding-right: 25px;
                position: fixed;
                right:10px;
          }
          
          nav .text-white{
              color:#000 !important;
          }
          
          nav li{
              text-align:center;
              width:100%;
              margin-top:4px;
              margin-bottom:4px;
              list-style: none;
          }
          
          .teams{
              display:flex;
              overflow:auto;
              height:70px;
          }
          
         
          
          .nav-res{
              height: 100vh;
                background-color: white;
                overflow-y: auto;
                z-index: 99999;
                transition: all 1s;
          }
          
          
          
          .home-icon{
              display:block;
              font-size:20px;
              color:#fff !important;
              margin-left:10%;
          }
          
          
          
      }
  
    .dropdown:hover>.dropdown-menu {
  display: block;
}
#dropdownMenuButton{
  background:none;
  border:none;
}
@media  only screen and (max-width: 600px) {
  .nav-res{
      position:absolute;
      top:0px;
      left:-1000px;
  }
  #dropdownMenuButton{
      color: var(--mainColor) !important;
  }
}
  .left-0{
      left: 0px !important;
  }
  
  .pl-3, .px-3{
      padding-left: 0.5rem !important;
  }
  .pr-3, .px-3 {
  padding-right: 0.5rem !important;
}


.teams-btn{
    color: #fff;
    font-weight: bold;
    font-size: 16px;
}
.crossbtn{
    cursor: pointer;
    color: #212529 !important;
}

/*
.pr-3, .px-3{
    padding-left:0.3rem !important
}
.pr-3, .px-3 {
  padding-right: 0.3rem !important;
}
*/

.teams{
    width:100%;
    text-align:center;
    margin-top:10px;
}
.teams a{
    margin-left:5px;
    margin-right:5px;
}
.teams img{
    width:45px;
    height:45px;
}
.pt-3, .py-3{
    padding-top:0.2rem !important;
}
           
body::-webkit-scrollbar {
    display: none;
}

    .title {
        margin-top: 20px;
        margin-bottom: 6px;
        line-height: 115%;
        font-size: 27px;
        font-weight: normal;
        color: #fff;
        font-size: 30px;
    }

    .subtitle {
        margin-top: 0.25in;
        margin-bottom: 6px;
        line-height: 115%;
        font-size: 21px;
        font-weight: normal;
        color: #fff;
        font-size: 26px;
    }

    .logo {
        width: 200px;
        height: 114px;
    }

    .footer-links {
        list-style-type: none;
        display: flex;
        justify-content: center;
        padding: 0;
    }

    .footer-links li {
        margin-right: 15px;
    }

    .footer-links li:last-child {
        margin-right: 0;
    }

    .footer-links a {
        color: #fff;
        text-decoration: none;
    }

    
        </style>
        
        @yield('style_extra')
    </head>
    <body>
        @component('components.navbar',['allleagues' => $allleagues])
        @endcomponent
  
        <div class="container">
            @yield('content')
        </div>
  
        @component('components.footer')
        @endcomponent
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){

                $("#crossbtn").click(function(event) {
                    event.stopPropagation();
                    // console.log("child is clicked");
                    $('#showDiv').removeClass('left-0');
                });

                $("#showBtn").click(function(event) {
                    event.stopPropagation();
                    // console.log("parent is clicked");
                    $('#showDiv').toggleClass('left-0');
                });
            });
        </script>

        @yield('script_extra')
    </body>
</html>
