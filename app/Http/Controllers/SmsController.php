<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
	function smsSend(Request $request){

		$numero_mtn = ["04", "05", "06", "44", "45", "46", "54", "55", "56", "64", "65", "66", "74", "75", "76", "84", "85", "86"];

		$numero_orange = ["07", "08", "09", "47", "48", "49", "57", "58", "59", "67", "68", "69", "77", "78", "79", "87", "88", "89"];

		$telephone = $request->input('number');
		$message = $request->post('message');
		$numero = trim(str_replace('225','',$telephone));
		$numero = trim(str_replace('+','',$telephone));
		$identifiant = $numero[0].$numero[1];

		if(in_array($identifiant, $numero_mtn))
		{ 
			try
			{

				$encode_msg = urlencode($message);
				$url = "http://213.136.80.39:12013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_mtn_ci&from=98164&to=225$numero&text=$encode_msg";

			return redirect()->back()->with('succes','Message envoyé avec succes');

			} catch (Exception $e) {

				return redirect()->back()->with('error',$e);
			}
		
		}
		else if (in_array($identifiant, $numero_orange))
		{
			try 
			{
				$encode_msg = urlencode($message);
				$url = "http://213.136.80.39:11013/cgi-bin/sendsms?username=telcoSender&password=telco12345&smsc=smsc_ocit&from=98164&to=225$numero&text=$encode_msg";
				return redirect()->back()->with('succes','Message envoyé avec succes');

			} catch (Exception $e) {

				return redirect()->back()->with('error',$e);
				
			}

		
		}
		else {

		return redirect()->back()->with('error','Message non envoyé, verifier le numero');
		}

		file_get_contents($url);

	}

}
