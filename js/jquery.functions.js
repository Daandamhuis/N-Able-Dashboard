function displayCustomers() {
    $('#loading').modal('show');
    $(".bar").css('width', '10%');
    $(".modal-body > i").html("Customers");
    
    $.ajax({
        type: "POST",
        url: "backend/php2json.php" ,
        data: {
            action: "Customers"
        },
        datatype: "json",
        error: function(json,error){
            console.log(error);
            $("#loading").modal('hide');
        },
        success: function(data) {
            var jsonArray = JSON.parse(data); 
            var i, j, html = '';

            for(i = 0, j = jsonArray.length; i < j; i++) {
                html = "<tr><td><span class=\"label label-success\">" + jsonArray[i]["customer.customername"] + "</span></td></tr>";
                $("#sidebar > table > tbody").append(html);
            }
            
            fetchCustomers();

            //Animation Bar
            $(".bar").css('width', '15%');
        }
    }); 
}

function fetchCustomers(mode) {
    $("#loading").modal('show');

    $.ajax({
        type: "GET",
        url: "backend/spool.php" ,
        datatype: "json",
        error: function(json,error){
            console.log(error);
            $("#loading").modal('hide');
        },
        success: function(data) {
            var jsonArray = JSON.parse(data);
            var j = jsonArray.length;
            
      
            for(i = 0; i < j; i++) {   
                done = 0
                item = jsonArray[i];
                customerid = item['customer.customerid'];
                customername = item['customer.customername'];
                displayIssues(customerid, i, j, customername);                     
            }
        }
    });
}



/* 
 * NOC_View_Status_Filter	1	Filters by "No Data" Status
 * NOC_View_Status_Filter	2	Filters by "Stale" Status
 * NOC_View_Status_Filter	3	Filters by "Normal" Status
 * NOC_View_Status_Filter	4	Filters by "Warning" Status
 * NOC_View_Status_Filter	5	Filters by "Failed" Status
 * NOC_View_Status_Filter	6	Filters by "Misconfigured" Status
 * NOC_View_Status_Filter	7	Filters by "Disconnected" Status
 * 
 */

function displayIssues(customerid, mode, j, n) {    
    if (mode == 0) {
        $("#content > div > div > div > table > tbody").html('');
    }

    $.ajax({
        type: "POST",
        url: "backend/php2json.php" ,
        data: {
            action: "Issues",
            customer: customerid
        },
        datatype: "json",
        error: function(data, error){
            console.log(error);
        },
        complete: function(data) {
            var jsonArray = JSON.parse(data.responseText);
            var service = "activeissue.servicename";
            var notifstate = "activeissue.notifstate";
            var customer = "activeissue.customername";
            var device = "activeissue.devicename";
            
            //Animate progress bar            
            var oldWidth = $(".bar").css('width');
            var width = $(".progress").css('width');
            var barWidth, newWidth = null;
            
            oldWidth = parseInt(oldWidth.replace('px', ''));
            width = parseInt(width.replace('px', ''));
            barWidth = Math.round(parseInt(width/j)*1.8);
            
            newWidth = Math.round(oldWidth+barWidth).toFixed(0);
            
            //newWidth = parseInt(newWidth) + parseInt(barWidth);
            console.log(newWidth);
            
            $(".bar").css('width', newWidth+'px');
            $(".modal-body > i").html("Issues of " + n);    

            if(oldWidth > 400) {
                $("#loading > h3").html("Done..");
                $(".bar").css('width', '100%');
                $(".modal-body > i").html("");
                $("#loading").modal('hide');
            }  
                                
            //Looping over the JSON data Array
            for(i = 0, j = jsonArray.length; i < j; i++) {                
                item = jsonArray[i];
                
                if((item[notifstate] == 5) || (item[notifstate] == 4) || (item[notifstate] == 6))  {
                    state = searchState(item[notifstate]);
                    
                    html = "";
                    html = "<tr class=\"" + state.color + "\">";
                    html += "<td>" + item[device] + "</td>";
                    html += "<td>" + item[customer] + "</td>";
                    //html += "<td><i class=\"" + state.sign + " \" style=\"color: " + state.color + "\"></i></td>";
                    html += "</tr>";
                    
                    
                
                    switch(item[service]) {
                        case "Disk":
                            $("#Harddisks > tbody").append(html);
                            break;
                        case "Connectivity":
                            //$("#Connectivity > tbody").append(html);
                            break;
                        case "Allied Telesis - VLAN's":
                            $("#Switch > tbody").append(html);
                            break;
                        case ("AV Status" || "Endpoint Security Event" || "Endpoint Security Status"):
                            $("#AVStatus > tbody").append(html);
                            break;
                        case "Backup Exec":
                            $("#Backups > tbody").append(html);
                            break;
                        case ("Exchange 2003" || "Exchange 2007/2010" || "Exchange E-mail Protection Status"):
                            $("#Exchange > tbody").append(html);
                            break;
                        case ("Generic SQL Server"):
                            $("#SQL > tbody").append(html);
                            break;        
                        case ("VPN"):
                            $("#VPN > tbody").append(html);
                            break;        
                        case ("Print Spooler"):
                            $("#PrintSpool > tbody").append(html);
                            break;  
                        case ("VMware"):
                            $("#vmware > tbody").append(html);
                            break;       
                    }
                }
            }
            
        }
    });
}

function searchState(state) {
    var status = {
        "status": [
        {
            "statusid":"1" , 
            "statusName":"No Data",
            "statusSign" : "icon-question-sign"
        }, 
        {
            "statusid":"2" , 
            "statusName":"Stale",
            "statusSign" : "icon-ban-circle"
        }, 
        {
            "statusid":"4" , 
            "statusName":"Warning",
            "statusSign" : "icon-bullhorn",
            "statusColor" : "warning"
        }, 
        {
            "statusid":"5" , 
            "statusName":"Failed",
            "statusSign" : "icon-remove-sign",
            "statusColor" : "error"
        }, 
        {
            "statusid":"6" , 
            "statusName":"Misconfigured",
            "statusSign" : "icon-info-sign",
            "statusColor" : "info"
        },
        {
            "statusid":"7" , 
            "statusName":"Disconnected",
            "statusSign" : "icon-off"
        }, 
        ]
    } ;
    
    
    var i = null;
    var j = status.status.length;   
    
    for (i = 0; i < j; i++) {
        if (status.status[i].statusid === state) {
            var icon = {
                "sign" : status.status[i].statusSign,
                "color" : status.status[i].statusColor
            };
            
            return icon;
        }
    }
     
    return false;
}
