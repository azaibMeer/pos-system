 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            List - Page Views - SmartAdmin v4.4.1
        </title>
        <meta name="description" content="List">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/vendors.bundle.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/app.bundle.css')}}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/formplugins/select2/select2.bundle.css')}}">
        <link rel="stylesheet" media="screen, print" href="{{url('/assets/css/notifications/toastr/toastr.css')}}">
        <style>
            .circle-btn {
                width: 17px;
                height: 17px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                text-decoration: none; /* Removes underline from <a> tags */
                border: 1px solid #0f0f0f; /* Red border */
                color: #000000; /* Red color for icons */
            }

            .image-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 5px;
    }
    .text-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
     
    }

         
    .text-card {
        cursor: pointer;
        border: 1px solid #ccc;
        
    }
    .text-card:hover {
        background-color: #1dc9b7; /* Example hover effect */
    }
    .text-card:hover h5,
    .text-card:hover p {
        color: white; /* Change text color to white on hover */
    } 
        </style>
        
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
               
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                       <div style="font-size: medium;">POS System </div>
                        <div class="ml-auto d-flex">
                          
                            <div>
                                <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <img src="/assets/img/demo/avatars/avatar-admin.png" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                                    <!-- you can also add username next to the avatar with the codes below:
									<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
									<i class="ni ni-chevron-down hidden-xs-down"></i> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="/assets/img/demo/avatars/avatar-admin.png" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                                            </span>
                                            <div class="info-card-text">
                                                <div class="fs-lg text-truncate text-truncate-lg">Dr. Codex Lantern</div>
                                                <span class="text-truncate text-truncate-md opacity-80">drlantern@gotbootstrap.com</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-reset">
                                        <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                                    </a>
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
                                        <span data-i18n="drpdwn.settings">Settings</span>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                        <i class="float-right text-muted fw-n">F11</i>
                                    </a>
                                    <a href="#" class="dropdown-item" data-action="app-print">
                                        <span data-i18n="drpdwn.print">Print</span>
                                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                                    </a>
                                    <div class="dropdown-multilevel dropdown-multilevel-left">
                                        <div class="dropdown-item">
                                            Language
                                        </div>
                                        <div class="dropdown-menu">
                                            <a href="#?lang=fr" class="dropdown-item" data-action="lang" data-lang="fr">Français</a>
                                            <a href="#?lang=en" class="dropdown-item active" data-action="lang" data-lang="en">English (US)</a>
                                            <a href="#?lang=es" class="dropdown-item" data-action="lang" data-lang="es">Español</a>
                                            <a href="#?lang=ru" class="dropdown-item" data-action="lang" data-lang="ru">Русский язык</a>
                                            <a href="#?lang=jp" class="dropdown-item" data-action="lang" data-lang="jp">日本語</a>
                                            <a href="#?lang=ch" class="dropdown-item" data-action="lang" data-lang="ch">中文</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item fw-500 pt-3 pb-3" href="{{url('/logout')}}">
                                        <span data-i18n="drpdwn.page-logout">Logout</span>
                                        <span class="float-right fw-n">&commat;codexlantern</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content" style="padding:1rem 1rem !important">
                        
                       
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <div class="input-group input-group-lg mb-g">
                                    <input type="text" class="form-control shadow-inset-2 focus" placeholder="Search topics" id="search">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fal fa-search"></i></span>
                                    </div>
                                </div> -->

                                <div class="input-group bg-white shadow-inset-2 mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fal fa-search"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control border-left-0 bg-transparent pl-0" placeholder="Search..." id="search">
                                </div>
                                <div class="card mb-g border shadow-0" style="max-height: 478px;overflow-y: scroll;">
                                    <div class="container">
                                        <div class="row">
                                          <!-- Image Card -->
                                          <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                           <div class="col-md-3">
                                            
                                            <div class="text-card mt-4">
                                                <img src="https://png.pngtree.com/png-vector/20230417/ourmid/pngtree-food-toast-burger-png-image_6712843.png" alt="" style="width:71px; display: block; margin: 0 auto;">
                                                <h5 style="font-size: 12px;text-align: left;">Small and adapti tag for adding</h5>
                                                <p style="font-size: 10px;" class="mb-0">Quantity: 10</p>
                                              </div>
                                          </div>
                                          <!-- Text Card -->
                                          
                                        </div>
                                      </div>
                                      
                                </div>
                               
                            </div>
                            <style type="text/css">
                                /* Style the search input */
/* Style the search input */
/*.custom-select {
    position: relative;
    display: inline-block;
    width: 200px;
}*/

 

/* Style the search input */
#searchInput {
    width: 100%;
    padding: 9px;
    box-sizing: border-box;
    border: 1px solid #e5e5e5;
    border-radius: 4px;
}

/* Style the dropdown list */
.select-items {
    position: absolute;
    background-color: #ffffff;
    border: 1px solid #1e90ff;
    width: calc(100% - 2px); /* Adjust width for border */
    top: 100%; /* Position below the input */
    left: 0;
    max-height: 150px;
    overflow-y: auto;
    z-index: 99;
    display: none; /* Hide by default */
}

/* Style each dropdown item */
.select-items div {
    padding: 10px;
    cursor: pointer;
}

/* Hover effect on dropdown items */
.select-items div:hover {
    background-color: #1e90ff;
    color: white;
}

/* Display the dropdown when active */
.select-items.active {
    display: block;
}

.no-results {
    padding: 10px;
    color: #666;
}
                            </style>
                            <div class="col-lg-6">
                                <form action="">
                                <div class="row">
                                    <div class="form-group col-lg-8 pl-0 mb-2">
                                        <div class="custom-selects">
        <input type="text" id="searchInput" placeholder="Search..." autocomplete="off">
        <div id="dropdown" class="select-items select-hide"></div>
    </div>
                                        </div>
                                        <div class="col-lg-4 pl-0">
                                            <button type="button" class="btn btn-primary waves-effect waves-themed btn-block" data-toggle="modal" data-target="#default-example-modal">Add Customer</button>
                                        </div>
                                        <!-- Modal -->
                                         @include('main.modal.customer')
                                        <!-- End Modal -->
                                        <div id="" class="pl-0 col-lg-12">
                                           
                                                <div class="card mb-2 border shadow-0">
                                                   <div class="table-responsive" style="overflow-y:scroll;max-height: 250px;">
                                                        <table class="table table-sm m-0 ">
                                                            <thead class="thead-themed">
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Price</th>
                                                                    <th width="20%">Qty</th>
                                                                    <th width="10%">Discount</th>
                                                                    <th>Total</th>
                                                                    <th>X</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>PANADOL CF DAY TAB 100'S</th>
                                                                    <td>200</td>
                                                                    
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="circle-btn decrement-btn">
                                                                                    <i class="fal fa-minus text-black"></i>
                                                                                </a>
                                                                                <input type="text" class="quantity__input form-control form-control-sm text-center mx-2" value="1" style="width: 50px;">
                                                                                <a href="#" class="circle-btn increment-btn">
                                                                                    <i class="fal fa-plus text-black"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                  
                                                                    
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="quantity__input form-control form-control-sm" value="1">
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>300</td>
                                                                    <td>
                                                                        <a href="">
                                                                            <i class="fal fa-trash text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PANADOL CF DAY TAB 100'S</th>
                                                                    <td>200</td>
                                                                    
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="circle-btn decrement-btn">
                                                                                    <i class="fal fa-minus text-black"></i>
                                                                                </a>
                                                                                <input type="text" class="quantity__input form-control form-control-sm text-center mx-2" value="1" style="width: 50px;">
                                                                                <a href="#" class="circle-btn increment-btn">
                                                                                    <i class="fal fa-plus text-black"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                  
                                                                    
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="quantity__input form-control form-control-sm" value="1">
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>300</td>
                                                                    <td>
                                                                        <a href="">
                                                                            <i class="fal fa-trash text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PANADOL CF DAY TAB 100'S</th>
                                                                    <td>200</td>
                                                                    
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="circle-btn decrement-btn">
                                                                                    <i class="fal fa-minus text-black"></i>
                                                                                </a>
                                                                                <input type="text" class="quantity__input form-control form-control-sm text-center mx-2" value="1" style="width: 50px;">
                                                                                <a href="#" class="circle-btn increment-btn">
                                                                                    <i class="fal fa-plus text-black"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                  
                                                                    
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="quantity__input form-control form-control-sm" value="1">
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>300</td>
                                                                    <td>
                                                                        <a href="">
                                                                            <i class="fal fa-trash text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PANADOL CF DAY TAB 100'S</th>
                                                                    <td>200</td>
                                                                    
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="circle-btn decrement-btn">
                                                                                    <i class="fal fa-minus text-black"></i>
                                                                                </a>
                                                                                <input type="text" class="quantity__input form-control form-control-sm text-center mx-2" value="1" style="width: 50px;">
                                                                                <a href="#" class="circle-btn increment-btn">
                                                                                    <i class="fal fa-plus text-black"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                  
                                                                    
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="quantity__input form-control form-control-sm" value="1">
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>300</td>
                                                                    <td>
                                                                        <a href="">
                                                                            <i class="fal fa-trash text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PANADOL CF DAY TAB 100'S</th>
                                                                    <td>200</td>
                                                                    
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="circle-btn decrement-btn">
                                                                                    <i class="fal fa-minus text-black"></i>
                                                                                </a>
                                                                                <input type="text" class="quantity__input form-control form-control-sm text-center mx-2" value="1" style="width: 50px;">
                                                                                <a href="#" class="circle-btn increment-btn">
                                                                                    <i class="fal fa-plus text-black"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                  
                                                                    
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="quantity__input form-control form-control-sm" value="1">
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>300</td>
                                                                    <td>
                                                                        <a href="">
                                                                            <i class="fal fa-trash text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PANADOL CF DAY TAB 100'S</th>
                                                                    <td>200</td>
                                                                    
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="circle-btn decrement-btn">
                                                                                    <i class="fal fa-minus text-black"></i>
                                                                                </a>
                                                                                <input type="text" class="quantity__input form-control form-control-sm text-center mx-2" value="1" style="width: 50px;">
                                                                                <a href="#" class="circle-btn increment-btn">
                                                                                    <i class="fal fa-plus text-black"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                  
                                                                    
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="quantity__input form-control form-control-sm" value="1">
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>300</td>
                                                                    <td>
                                                                        <a href="">
                                                                            <i class="fal fa-trash text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>PANADOL CF DAY TAB 100'S</th>
                                                                    <td>200</td>
                                                                    
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="#" class="circle-btn decrement-btn">
                                                                                    <i class="fal fa-minus text-black"></i>
                                                                                </a>
                                                                                <input type="text" class="quantity__input form-control form-control-sm text-center mx-2" value="1" style="width: 50px;">
                                                                                <a href="#" class="circle-btn increment-btn">
                                                                                    <i class="fal fa-plus text-black"></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                         
                                                                    <td>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="quantity__input form-control form-control-sm" value="1">
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td>300</td>
                                                                    <td>
                                                                        <a href="">
                                                                            <i class="fal fa-trash text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                </div>
                                            
                                        </div>
                                        <div id="" class="pl-0 col-lg-12">
                                           
                                            <div class="card mb-g border shadow-0">
                                                <div class="container mt-4">
                                                    <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label>Total Products</label>
                                                          <div id="totalProducts">0</div>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label>Total Items</label>
                                                          <div id="totalItems">0</div>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3 pl-0">
                                                        <div class="form-group">
                                                          <label for="discountInput">Discount</label>
                                                          <input type="number" class="form-control" id="discountInput" placeholder="Enter discount">
                                                        </div>
                                                      </div>
                                                      <div class="col-md-3 pl-0">
                                                        <div class="form-group">
                                                          <label for="taxInput">Tax</label>
                                                          <input type="number" class="form-control" id="taxInput" placeholder="Enter tax">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label for="payableAmount">Total Amount</label>
                                                          <input type="text" class="form-control" id="payableAmount" readonly>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-6 pl-0">
                                                        <div class="form-group">
                                                          <label for="payableAmount">Payable Amount</label>
                                                          <input type="text" class="form-control" id="payableAmount" readonly>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-md-6 mb-3 ">
                                                          <div class="form-group">
                                                            <button type="button" class="btn btn-danger waves-effect waves-themed btn-block">Cancil</button>
                                        
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3 pl-0">
                                                          <div class="form-group">
                                                            <button type="button" class="btn btn-success waves-effect waves-themed btn-block">Payment</button>
                                    
                                                          </div>
                                                        </div>
                                                      </div>

                                                   
                                                  </div>
                                            </div>
                                        
                                    </div>
                                        
                                </div>
                            </form>
                               
                            </div>
                       
                        </div>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <!-- <footer class="page-footer" role="contentinfo">
                        <div class="d-flex align-items-center flex-1 text-muted">
                            <span class="hidden-md-down fw-700">2020 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-primary fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a></span>
                        </div>
                        <div>
                            <ul class="list-table m-0">
                                <li><a href="intel_introduction.html" class="text-secondary fw-700">About</a></li>
                                <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">License</a></li>
                                <li class="pl-3"><a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a></li>
                                <li class="pl-3 fs-xl"><a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary" target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </footer> -->
                </div>
            </div>
        </div>

        <script src="{{url('/assets/js/vendors.bundle.js')}}"></script>
        <script src="{{url('/assets/js/app.bundle.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#search').focus();
            });

        </script>
         <script src="{{url('/assets/js/formplugins/select2/select2.bundle.js')}}"></script>
        <script>
            $(document).ready(function(){
                  // Event listener for increment button
                $('.increment-btn').click(function(e) {
                    e.preventDefault();
                    var quantityInput = $(this).siblings('.quantity__input');
                    var currentValue = parseInt(quantityInput.val());
                    quantityInput.val(currentValue + 1);
                });

                // Event listener for decrement button
                $('.decrement-btn').click(function(e) {
                    e.preventDefault();
                    var quantityInput = $(this).siblings('.quantity__input');
                    var currentValue = parseInt(quantityInput.val());
                    // Ensure the value doesn't go below 1
                    if (currentValue > 1) {
                        quantityInput.val(currentValue - 1);
                    }
                });
            });
                     // var customers = <?php echo json_encode($customers); ?>;

document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("searchInput");
    var dropdown = document.getElementById("dropdown");
    var noResultsMessage = document.createElement("div");
    noResultsMessage.textContent = "No results found";
    noResultsMessage.classList.add("no-results");
    var uniqueResults = new Set(); // Set to store unique results

    searchInput.addEventListener("input", function() {
        var query = this.value.toLowerCase().trim();
        console.log("Search query:", query);  // Debugging statement
        dropdown.innerHTML = "";
        uniqueResults.clear();  // Clear unique results for fresh search

        if (query.length > 0) {
            // Perform AJAX request to search.php
            fetch(`/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Filtered customers:", data);  // Debugging statement

                    data.forEach(function(customer) {
                        var customerText = customer.name + ' (' + customer.phone + ')';

                        // Check if customerText is already in uniqueResults
                        if (!uniqueResults.has(customerText)) {
                            uniqueResults.add(customerText);

                            var div = document.createElement("div");
                            div.textContent = customerText;
                            div.addEventListener("click", function() {
                                searchInput.value = customerText;
                                dropdown.classList.remove("active");
                                dropdown.innerHTML = '';  // Clear the dropdown when an item is selected
                            });
                            dropdown.appendChild(div);
                        }
                    });

                    if (uniqueResults.size > 0) {
                        dropdown.classList.add("active");
                    } else {
                        dropdown.appendChild(noResultsMessage);
                        dropdown.classList.remove("active");
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            dropdown.classList.remove("active");
            dropdown.innerHTML = ""; // Clear the dropdown when the input is empty
        }
    });

    document.addEventListener("click", function(event) {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove("active");
        }
    });
});






        </script>
        <script src="{{url('/assets/js/notifications/toastr/toastr.js')}}"></script> 
        @yield('scripts') 
    </body>
</html>
