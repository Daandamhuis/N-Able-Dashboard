<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>N-Central Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon.png"/>     
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-72.png" sizes="72x72"/>
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-114.png" sizes="114x114"/>
        <link href="style/bootstrap.min.css" rel="stylesheet" >
        <link href="style/bootstrap.responsive.css" rel="stylesheet">
        <link href="style/style.css" rel="stylesheet">
        <link href="style/dashboard.css" rel="stylesheet">
        <link rel="stylesheet" href="style/font-awesome.css">
        <!--[if IE 7]>
        <link rel="stylesheet" href="style/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#"><span>Company</span><i>Name</i></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="content" class="span9">
                <div class="row">
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-hdd"></i><span class="break"></span>Harddisks </h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="Harddisks">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>	
                    </div>
                    <span class="break"></span>
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-tasks"></i><span class="break"></span>Exchange </h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="Exchange">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>	
                    </div>
                     <span class="break"></span>
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-tasks"></i><span class="break"></span>AV Status</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="AVStatus">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>  
                    </div>
                    <span class="break"></span>

                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-tasks"></i><span class="break"></span>SQL </h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="SQL">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>	
                    </div>
                    <span class="break"></span>
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-tasks"></i><span class="break"></span>Virtual Machines</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="vmware">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-hdd"></i><span class="break"></span>Printer Spool </h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="PrintSpool">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>	
                    </div>
                    <span class="break"></span>
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-tasks"></i><span class="break"></span>VPN Tunnels </h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped table-condensed" id="VPN">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>	
                    </div>
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-hdd"></i><span class="break"></span>Backups </h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="Backups">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>	
                    </div>
                   
                    
                    <span class="break"></span>
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-signal"></i><span class="break"></span>Connectivity </h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="Connectivity">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>  
                    </div>
                    <span class="break"></span>
                    <div class="span5 box">
                        <div class="box-header">
                            <h2><i class="icon-tasks"></i><span class="break"></span>Switches</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-condensed" id="Switch">
                                <thead>
                                    <tr>
                                        <td>Device</td>
                                        <td>Customer</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>
            <div id="sidebar" class="span2 hidden-phone">
                <h2>Customers</h2>
                <table>
                    <tbody></tbody>
                </table>
            </div>
        </div> <!-- /container -->
        <div id="loading" class="modal hide fade">
            <div class="modal-header">
                <h3>Loading data.....</h3>
            </div>
            <div class="modal-body">
                <i></i>
                <div class="progress progress-striped active">
                    <div class="bar"></div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.functions.js"></script>
        <script> 
            $(function() {
                displayCustomers();
                setInterval("fetchCustomers()", 300000);
            });
        </script>
    </body>
</html>