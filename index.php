 $data['email_id'] = xyz@gmail.com;
  $data['name'] = xyz;
   $data['mobile_number'] = 8882789999;
   $data['amount'] = 100;
 function paymentUrl($data){
        if(!empty($data['application_id']) && !empty($data['email_id']) && !empty($data['name'])
        && !empty($data['mobile_number']) && !empty($data['amount'])){
            
            $number = mt_rand( 10000000, 99999999); 
            $application_id = "'".$data['application_id']."'";
            $email = $data['email_id'];
            ;
            $iciciEmail = strstr($email,'@',true).'@icici';
            $name = $data['name'];
            $mobile = $data['mobile_number'];
            $amount = $data['amount'];
            $part1 = $number."|147847|".$amount."|".$mobile."|".$name."|".$application_id."|".$email."|".$iciciEmail;
          
           
            $part2 = "https://www.xyz.com/payment-thankyou/";//redirect page name
            $part3 = $number;
            $part4 = "147847";
            $part5 = $amount;
            $part6 = "9";
            $key = "1615772446401001";
            $penc1 = aes128Encrypt($part1,$key);
            $penc2 = aes128Encrypt($part2,$key);
            $penc3 = aes128Encrypt($part3,$key);
            $penc4 = aes128Encrypt($part4,$key);
            $penc5 = aes128Encrypt($part5,$key);
            $penc6 = aes128Encrypt($part6,$key);
            $temp['otip'] = $part1;
            $temp['url'] =  "https://eazypay.icicibank.com/EazyPG?merchantid=164644&mandatory%20fields=".$penc1."&optional%20fields=".""."&returnurl=".$penc2."&Reference%20No=".$penc3."&submerchantid=".$penc4."&transaction%20amount=".$penc5."&paymode=".$penc6;
            $temp['return'] = 1;

         }else{
            $temp['url'] =  '';
            $temp['return'] = 0;
        }
        
        return $temp;
    }
    
    $data = array();
    $data['application_id'] = 123;
     $data['email_id'] = xyz@gmail.com;
  $data['name'] = xyz;
   $data['mobile_number'] = 8882789999;
   $data['amount'] = 100;
