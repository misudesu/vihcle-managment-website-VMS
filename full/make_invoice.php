<?php 
include "../config.php";

if(isset($_POST['save'])){
  $name=$_POST['name'];
  $cartype=$_POST['cartype'];
  $prviewfull=$_POST['prviewfull'];
  $targas=$_POST['targas'];
  $newgej=$_POST['newgej'];
  $privwgej=$_POST['privwgej'];
  $resentfull=$_POST['resentfull'];
  $musttravl=$_POST['musttravl'];
    $filename=$_FILES['file']['name'];
  $tmL=$_FILES['file'] ['tmp_name'];
  move_uploaded_file($tmL,"../file/".$filename);
  $date=date("y-m-d");
  $kernedaj=$_POST['kernedag'];
  $sql = "INSERT INTO full
  VALUES ('','$targas',
  '$cartype','$newgej','$privwgej','$prviewfull','$resentfull','$musttravl','$name','$kernedaj','$filename','$date')";
  if ($conn->query($sql) === TRUE) {
    echo "Document saved successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
  }
 
  if(isset($_POST['Submit'])){
    $tar=$_POST['tar'];
  if(empty($tar)){
      
      $sqls = $conn->query("SELECT * FROM  full WHERE targas='$tar'  ORDER BY id  DESC
     ");
  }else{
  
      $sqls =$conn->query( "SELECT * FROM full WHERE targas='$tar'  ORDER BY   id DESC ");
  } if(empty($tar)){
      
    $sqlss = $conn->query("SELECT * FROM  full WHERE targas='$tar'  ORDER BY id DESC ");
}else{

    $sqlss =$conn->query( "SELECT * FROM full WHERE targas='$tar'   ORDER BY id DESC");
}
}else{
    $tar="";
  $sqls =$conn->query( "SELECT * FROM full ORDER BY id DESC ");
  $sqlss =$conn->query( "SELECT * FROM full  ORDER BY id DESC ");
}
         
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Full calculator</title>
        <meta name="description" content="Use this simple, page saving invoice template to create beautiful invoices online or offline. Layout Optimized for print &amp; pdf">

        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800,300italic,400italic,600italic);
            body{font-family:'Courier', 'Open Sans', 'Trebuchet MS', 'Lucida Sans Unicode';color:#010700;font-size:11px;}

            table{text-align:justify;}
            input{padding:5px;margin:5px;width:45%;}
            .input_large{width:54%;}
            .input_small{width:20%}
            #invoice_pane{position:fixed;top:0;left:0;width:750px;height:100%;margin:10px;}
            #settings_pane{position:absolute;top:0;left:770px;width:calc(98% - 770px);height:auto;border-left:2px solid #288f13;font-size: 15px;padding:5px;}
            #page_end_msg{position:absolute;bottom:20px;left:210px;width:300px;height:auto;background-color:rgba(34, 167, 17, 0.85);border-radius:25px;padding:15px;font-size:12px;}
            #page_end_msg .heading{display:block;color:rgb(148, 207, 38);padding-bottom:5px;font-weight:600; margin-bottom: 2px;}
            #page_end_msg .text{display:block;color:rgb(30, 138, 180);}
            #page_end_msg .links{display:block;color:#fff;padding-top:5px;}
            #page_end_msg .links a{color:rgb(207, 27, 27);
              ;}            
            @media print{.do_not_print {display:none;}}
        </style>
    </head>

    <body>
 
        <div id="invoice_pane">
            <center>
            <br>
            <table width="650" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" valign="top" width="55%">
                        <span id="customer_details">
                            <i><small>የነዳጅ ማወራረጃ </small></i><br>
                            <big><b><span id="customer_name_D"></span></b><br><span id="customer_company_D"></span> <span hidden id="customer_company1_D"></span></big>
                            <span id="customer_name1_D" hidden ></span><br>
                         
                            <span id="customer_city_D"></span>, <span id="customer_state_D"></span><br>
                            <span id="customer_zip_id_D"></span>: <span id="customer_zip_value_D"></span><br>
                            <b><span id="customer_id_D"></span>: <span id="customer_id_value_D"></span></b>
                            <br><span id="customer_cid_D"></span> <span id="customer_cid_value_D"></span>
                            <span id="vendor_address_D"></span><br><span id="vendor_city_D"></span>, <span id="vendor_state_D"></span><br>
                        <span id="vendor_zip_id_D"></span>: <span id="vendor_zip_value_D"></span><br> <span id="vendor_zip_value1_D"></span><br>
                        <span id="vendor_phone_D"></span><br>
                        <u><span id="vendor_email_D"></span></u> <br>
                        <u><span id="vendor_email1_D"></span></u> 
                        </span>
                    </td>
                    <td align="right">
                       <u><span id="vendor_website_D"></span></u><br>
                        <span id="vendor_cid_D"></span> <br>
                        <u><span id="vendor_websiteE1_D"></span></u><br>
                        <span id="vendor_cidE1_D"></span>  <br>
                        <u><span id="vendor_websiteE2_D"></span></u><br>
                        <span id="vendor_cidE2_D"></span> <br>
                        <u><span id="vendor_websiteE3_D"></span></u><br>
                        <span id="vendor_cidE3_D"></span> <br>
                        <u><span id="vendor_websiteE4_D"></span></u><br>
                        <span id="vendor_cidE4_D"></span> <br>
                        <u><span id="vendor_websiteE10_D"></span></u><br>
                        <span id="vendor_cidE10_D"></span> <br>
                        <u><span id="vendor_websiteE5_D"></span></u><br>
                        <span id="vendor_cidE5_D"></span>  <br>
                        <u><span id="vendor_websiteE6_D"></span></u><br>
                        <span id="vendor_cidE6_D"></span>  <br>
                       <span id="vendor_cid_value_D"></span> <br>
                    </td>
                </tr>
            </table>
            <hr>
            <table width="650" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left">
                        <b><span id="invoice_info_D"></span></b>
                    </td>
                    <td align="right" valign="top">
                        Date: <span id="invoice_date_D"></span><br>
                        <b>Invoice #: <span id="invoice_number_D"></span></b>
                    </td>
                </tr>
            </table>
            <table width="650" border="1" cellspacing="0" cellpadding="0">
                <td valign="top" align="left" width="65%">
                    <table border="1" width="100%" cellspacing="0" cellpadding="0">
                        <tbody id="order_items_D">
                            <tr align="center">
                                <th>ተ.ቁ</th>
                                <th>የኩፖን አይነት </th>
                                <th>መለኪያ </th>
                                <th>ብዛት </th>
                                <th>ብር</th>
                                <th>መርመራ </th>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td align="center">
                    <table width="85%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" width="50%"><b>Total Units</b></td>
                            <td align="left" width="5%">:</td>
                            <td align="left"><b><span id="total_units_D"></b></td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                            <td align="left"><b>Sub Total</b>(+)</td>
                            <td align="left">:</td>
                            <td align="left"><b><span id="sub_total_D"></span></b></td>
                        </tr>
                        <tr id="tax_row">
                            <td align="left">Tax@<span id="tax_rate_D"></span>%(+)</td>
                            <td align="left">:</td>
                            <td align="left"><span id="tax_amount_D"></span></td>
                        </tr>
                        <tr>
                            <td align="left">Others(+)</td>
                            <td align="left">:</td>
                            <td align="left"><span id="other_charges_D"></span></td>
                        </tr>
                        <tr>
                            <td align="left">Discount(-)</td>
                            <td align="left">:</td>
                            <td align="left"><span id="discount_D"></span></td>
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                            <td align="left"><b>GRAND TOTAL</b>(=)</td>
                            <td align="left">:</td>
                            <td align="left"><b><big><span id="currency_D"></span><span id="grand_total_D"></span></big></b></td>
                        </tr>
                    </table>
                </td>
            </table>
            <br>
            <span id="final_note_D"></span>   </span><br> <br>
            <span id="vendor_cidE7_D"></span> </span><br> <br>
            <span id="final_note1_D"></span>    <br> <br>
            <span id="vendor_cidE8_D"></span><br> <br> 
            <span id="final_note2_D"></span> </span><br>  <br>  
            <span id="vendor_cidE9_D"></span><br> <br>        
            <svg id="bar_code_container"></svg>
            <span class="do_not_print">
                <br><br><br><button onclick="javascript: window.print();">Print Invoice</button>
            </span>
            
            </center>
        </div>

        <div id="settings_pane" class="do_not_print">
            <div>
            <table id="ejemplo" class="table table-striped table-bordered" style="width:100%" >
            
                                
          
           
            <center><big><b>Fuel calculator</b></big><br>ከስር ባሉት ሳጥኖች ውስጥ ዝርዝሮችን ያስገቡ &amp; ላስገቡት መረጃ ስሌቱን ለማውቅ በግራ በኩል ይለውን ገጽ ይመልከቱ</center><br><br>
            <b>CUSTOMER INFO</b><br>
            <input type="text" id="customer_name" placeholder="Customer Name"  readonly value="የተሽከርካሪ ሰሌዳ ">
          
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
         
            <input type="text" id="customer_company"   name="tar" value="<?php echo $tar?>" >
           
            <button type="submit" id="customer_name1"   value="የተሽከርካሪ ሰሌዳ " name="Submit">search</button>
   
            </form>
           
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data"  > 
            <input  type="text" id="customer_company1"  hidden required   name="targas"  >
            <input class="input_large" type="text" id="customer_address" required  readonly value="የተሽከርካሪ አይነት ">
            <input type="text" id="customer_city" placeholder="የተሽከርካሪ አይነት " name="cartype" required value="">
            
            <input type="text" id="customer_zip_id" placeholder="Area Code Field Identifier"  readonly value="የስራ ክፍል ">
            <input type="text" id="customer_zip_value" placeholder="የስራ ክፍል" required value="">
            <input type="text" id="customer_id" placeholder="Email/Phone Field Identifier"  readonly value="በሌትር የመጓዝ  አቅም">
            <input type="text" id="customer_id_value"  placeholder="በሌትር የመጓዝ  አቅም" required value="">
            <input type="text" id="customer_cid" placeholder="Company Number Field Identifier" readonly value="ጉዞ የሚደረገው ">
            <input type="text" id="customer_cid_value" placeholder="" required value=""><br><br>
            <b>VENDOR INFO</b><br>
         
           
            <input type="text" id="vendor_city" placeholder="City Name" readonly  required value="በጌጅ ላይ የታየው የአሁኑ ንባብ ">
            <input type="text" id="vendor_state" placeholder="በጌጅ ላይ የታየው የአሁኑ ንባብ" name="newgej" required value="">
         <input   type="text"  class="input_large" id="vendor_zip_id"   readonly value="የባለፈው ንባብ በክሎ ሜትር ">
       <select   class="input_large" id="vendor_zip_value1"   readonly value="የባለፈው ንባብ በክሎ ሜትር ">
         <?php   while($row = mysqli_fetch_array($sqlss)): ?>

 <option type="text"     value="<?php echo $row[3];?>" > <?php echo $row[3];?>  </option>   
                <?php endwhile;?>  

 </select>
 <input  type="text" class="input_large"  id="vendor_zip_value" required  hidden   name="privwgej">
          
            <input type="text" id="vendor_phone" placeholder="ባለፈው የተሞላው ነዳጅ በሌትር" readonly value="ባለፈው የተሞላው ነዳጅ በሌትር " > 
         
            <select class="input_large" id="vendor_email"     >
        
            <?php  
          
            while($row1 = mysqli_fetch_array($sqls)): ?>
            
                <option   value="<?php echo $row1[6];?>" > <?php echo $row1[6];?>  </option>   
                <?php endwhile;?>  
            </select>                       
           
            <input type="text" id="vendor_email1" name="prviewfull" required  hidden  readonly>
           
            <input type="text" id="vendor_website" placeholder="Website Address" readonly value="የተጓዘው ክሎሜትር ">
            <input type="text" id="vendor_cid" placeholder="የተጓዘው ክሎሜትር" required value="">
            <input type="text" id="vendor_websiteE1" placeholder="Website Address" readonly value="ቀሪ ነዳጅ በሌትር  ">
            <input type="text" id="vendor_cidE1" placeholder="ቀሪ ነዳጅ በሌትር " name="kernedag"  required value="">
            <input type="text" id="vendor_websiteE2" placeholder="Website Address" readonly value="የሹፌር ስም   ">
            <input type="text" id="vendor_cidE2" placeholder="የሹፌር ስም" required value="">
            <input type="text" id="vendor_websiteE3" placeholder="Website Address" readonly value="አሁን የተሞላው ነዳጅ በሌትር   ">
            <input type="text" id="vendor_cidE3"  placeholder="አሁን የተሞላው ነዳጅ በሌትር " name="resentfull" readonly>
            <input type="text" id="vendor_websiteE4" placeholder="Website Address" readonly value="በተቀዳው ነዳጅ መጓዝ ያለበት ክሎ ሜትር   ">
            <input type="text" id="vendor_cidE4"  placeholder="በተቀዳው ነዳጅ መጓዝ ያለበት ክሎ ሜትር  "  name="musttravl" readonly >
            <input type="text" id="vendor_websiteE10" placeholder="Website Address" readonly value=" የአንድ ሌትር ነዳጅ/ጋዝ ዋጋ    ">
            <input type="text" id="vendor_cidE10"  placeholder="የ 1 ሌትር ዋጋ  " required value="">
            <input type="text" id="vendor_websiteE5" placeholder="Website Address" readonly value=" ቅጹን የሞላው የስምሪት ባለሙያ ስምና ፊርማ   ">
            <input type="text" id="vendor_cidE5" placeholder="ቅጹን የሞላው የስምሪት ባለሙያ ስምና ፊርማ  " required name="name" value="">
            <input type="text" id="vendor_websiteE6" placeholder="Website Address" readonly value=" አስተያየት   ">
            <input type="text" id="vendor_cidE6" placeholder="አስተያየት " required value="">
    <br><br>
            <b>other  INFO</b><br>

            <b>INVOICE INFO</b><br>
            <input class="input_large" type="text" id="invoice_info" placeholder="Any Instructions or Information" value="የተሞላው ኩፖን በሚመለከት ">
            <input type="text" id="invoice_date" placeholder=" "> 
            <input type="text" id="invoice_number" placeholder="Enter Invoice # Manually"> 
            <input type="text" id="tax_rate" placeholder="% Tax on Sub Total" required value=""> 
            <input type="text" id="currency" placeholder="Currency Symbol"><br>
            <input type="text" id="other_charges" placeholder="Other Charges" required value="">
            <input type="text" id="discount" placeholder="Discount Amount" required value="">
            <input class="input_large" hidden type="text" id="final_note" placeholder="Final Note" value="የጠያቂው ስምና ፊርማ...........................................................................">             <input hidden type="text" id="vendor_cidE7" placeholder="" value="ቀን___________________________"><br><br>
            <input  class="input_large" hidden type="text" id="final_note1" placeholder="Final Note" value="የተሽ/ስ/ጋ/አገ/አስተዳደር ዳይሬክቶሬት  ስምና ፊርማ......................................................... "><input hidden type="text" id="vendor_cidE8" placeholder="" value="ቀን___________________________       "><br><br>
            <input class="input_large" hidden type="text" id="final_note2" placeholder="Final Note" value="የተሽ/ስ/ጋ/አገ/ም/ፕሬዚዳንት  ስምና ፊርማ.............................................................."><input hidden type="text" id="vendor_cidE9" placeholder="" value="ቀን___________________________"><br><br>
            <b>ITEMS</b>&nbsp;&nbsp;&nbsp;&nbsp;<span id="add_new_item_button"><u>Add Another Item</u></span><br>
            <span id="order_items"></span><br><br>
            <input type="file" name="file"> <button type="submit" name="save">save</button>
            </form>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/jsbarcode/3.3.7/barcodes/JsBarcode.code128.min.js"></script>

        <script type="text/javascript">
            var sl = 0;

            //get element by id alias
            var $$ = function(id){
                return document.getElementById(id);
            }

            var bind = function(src, dest, e){
                try{
                    $$(dest).innerHTML = src.value;
                }
                catch(e){
                    console.log(e, src, dest);
                }
                src.addEventListener(e, function(){
                    try{
                        $$(dest).innerHTML = src.value;
                    }catch(e){};
                });
            };

            var register = function(ele, e, func){
                $$(ele).addEventListener(e,function(){window[func]();});
            }

            function bind_all_text_boxes(){
                var items = document.getElementsByTagName('INPUT');
                for(var i = items.length - 1; i >= 0; i--){
                    var item = items[i];
                    var destination_field = item.id + '_D';
                    bind(item, destination_field, 'keyup');
                }
            }

            function add_line_item_binds(){
                for (var i=1; i<=sl; i++){
                    register('item_rate_'+i, 'keyup', 'update_totals');
                    register('item_units_'+i, 'keyup', 'update_totals');
                }
            }

            function update_totals(){
                total_no_of_units = 0;
                sub_total = 0;
                grand_total = 0;
                for (var i=1; i<=sl; i++){
                    var no_of_units = parseFloat($$('item_units_'+i).value);
                    var unit_rate = parseFloat($$('item_rate_'+i).value);
                    var cost = no_of_units * unit_rate;

                    $$('item_total_'+i+'_D').innerHTML = cost;

                    total_no_of_units = total_no_of_units + no_of_units;
                    sub_total = sub_total + cost;
                    var fuel = $$('vendor_cidE10').value; 
                    var oneletr = $$('customer_id_value').value;
                    var consumed =  (sub_total / fuel).toFixed(2); 
                    var total= (consumed*oneletr).toFixed(2);
                    var oneletrs = $$('customer_company').value;
                    var balfwnbab = $$('vendor_zip_value1').value;
                    var letr=$$('vendor_email').value;
                  
                    var balefwletr=$$('vendor_email1').value;
                    var yeahungej=$$('vendor_state').value;
                    var lyunet= yeahungej -balfwnbab ;
                    var beletr=(lyunet / fuel).toFixed(2);
                    var ak=Number(total) + Number(balfwnbab);
               }
               

                $$('customer_company1').value = oneletrs;
                $$('vendor_zip_value').value = balfwnbab;
                $$('vendor_zip_value_D').innerHTML = balfwnbab;
                $$('vendor_email_D').innerHTML=letr;
                $$('vendor_email1').value=letr;
                $$('total_units_D').innerHTML = total_no_of_units;
                $$('sub_total_D').innerHTML = sub_total;
                $$('vendor_cidE3_D').innerHTML = consumed;
                $$('vendor_cidE3').value = consumed;
                $$('vendor_cidE4_D').innerHTML = total;
            
                $$('vendor_cidE4').value = total + ",በቀጣይ መሄድ ያለበት "+ak;
                if(beletr==0){
                    
                   $$('vendor_cidE1').value = beletr+ "L"+" ተመጣጣኝ ነዳጅ  ";
                   }else if(beletr>0){
                   // var lyunet= yeahungej-balfwnbab;
                 //  var beletr=(lyunet / oneletr).toFixed(2);
                 $$('vendor_cidE1').value = beletr+ "L"+" ከመጠን በላይ ነዳጅ   ";
                    $$('vendor_cidE1').value = beletr+ "L"+" ከመጠን በላይ ነዳጅ   ";
                   }else if(beletr<0){
                   // var lyunet= yeahungej-balfwnbab;
                  // var beletr=(lyunet / oneletr).toFixed(2);
                    
                    $$('vendor_cidE1').value = Math.abs(beletr) + "L"+" ቀሪ ነዳጅ  ";
                }
            }

            function observe_tax_changes(){
                if($$('tax_rate').value){
                    if($$('tax_row').innerHTML == ''){
                        $$('tax_row').innerHTML = '<td align="left">Tax@<span id="tax_rate_D"></span>% (+)</td><td align="left">:</td><td align="left"><span id="currency_D">$ </span></span><span id="tax_amount_D"></span></td>';
                    }
                    tax_amount = sub_total * parseFloat($$('tax_rate').value) / 100;
                    $$('tax_amount_D').innerHTML = tax_amount;
                    grand_total = sub_total + tax_amount + parseFloat($$('other_charges').value) - parseFloat($$('discount').value);
                $$('grand_total_D').innerHTML = grand_total;
           
                }
                else{
                    tax_amount = 0;
                    $$('tax_row').innerHTML = '';
                }
                update_totals();
            }

            function add_a_line_item(){
                var order_items = $$('order_items');
                var order_items_D = $$('order_items_D');

                sl = sl + 1;
                var input = document.createElement('input');
                input.type = 'text';
                input.id = 'item_desc_'+sl;
                input.placeholder = 'የኩፖን አይነት ';
                input.value = '';
                order_items.appendChild(input);

                input = document.createElement('input');
                input.type = 'text';
                input.classList = ['input_small'];
                input.id = 'item_rate_'+sl;
                input.min = 1;
                input.placeholder = 'መለኪያ';
                input.value = '';
                order_items.appendChild(input);

                input = document.createElement('input');
                input.type = 'text';
                input.classList = ['input_small'];
                input.id = 'item_units_'+sl;
                input.min = 1;
                input.placeholder = 'ብዛት ';
                input.value = '';
                order_items.appendChild(input);

                order_items_D.innerHTML = order_items_D.innerHTML + '<tr align="center"><td id="item_sl_'+sl+'_D">'+sl+'</td><td id="item_desc_'+sl+'_D"></td><td id="item_rate_'+sl+'_D"></td><td id="item_units_'+sl+'_D"></td><td id="item_total_'+sl+'_D"></td></tr>';

                bind_all_text_boxes();
                update_totals();
                add_line_item_binds();
            }

            function set_defaults(){
                var now = new Date();

                //set date
                var month = now.getMonth() + 1;
                var date = now.getDate();
                var hour = now.getHours();
                now.mm = month<10 ? '0'+month : month;
                now.dd = date<10 ? '0'+date : date;
                now.hh = hour<10 ? '0'+hour : hour;
                $$('invoice_date').value = now.toDateString();
                
                //set invoice number
                invoice_number = '' + now.getFullYear() + now.mm + now.dd + now.hh + '-' + now.getMinutes();
                $$('invoice_number').value = invoice_number;

                //bind add_item_button
                register('add_new_item_button', 'click', 'add_a_line_item');

                //bind tax_rate observer
                tax_amount = 0;
                register('tax_rate', 'keyup', 'observe_tax_changes');

                //bind other charges and discount to update totals
                register('other_charges', 'keyup', 'update_totals');
                register('discount', 'keyup', 'update_totals');
            }
        
            set_defaults();
            add_a_line_item(); //binding of text boxes happens inside this func
            observe_tax_changes();
            update_totals();
         computeConsumption();
            JsBarcode("#bar_code_container", invoice_number, {
                height: 40,
                displayValue: false
            });
        </script>
     
    </body>
  
</html>