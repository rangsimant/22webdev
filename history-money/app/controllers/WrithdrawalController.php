<?php
use Carbon\Carbon;

/**
* 
*/
class WrithdrawalController extends BaseController
{
	
	public function index()
	{
		$writhdrawal = Deposit::where("type","=","writhdrawal")->get();
		$total_writhdrawal = DB::table("money")->where("type","=","writhdrawal")->sum("money");
		foreach ($writhdrawal as $idx => $value) {
			$carbon_time = Carbon::createFromFormat("Y-m-d H:i:s",$value->updated_at); // convert Datetime to Carbon Datetime
			$writhdrawal[$idx]["time"] = $carbon_time->diffForHumans();
		}
		return View::make("writhdrawal.index")->with("writhdrawal",$writhdrawal)->with("total_writhdrawal",$total_writhdrawal);
	}

}