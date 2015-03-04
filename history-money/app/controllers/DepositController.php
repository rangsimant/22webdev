<?php
use Carbon\Carbon;
/**
* 
*/
class DepositController extends BaseController
{
	public function index()
	{
		$deposit = Deposit::where("type","=","deposit")->get();
		$total_deposit = DB::table("money")->where("type","=","deposit")->sum("money");
		foreach ($deposit as $idx => $value) {
			$carbon_time = Carbon::createFromFormat("Y-m-d H:i:s",$value->updated_at); // convert Datetime to Carbon Datetime
			$deposit[$idx]["time"] = $carbon_time->diffForHumans();
		}
		return View::make("deposit.index")->with("deposit",$deposit)->with("total_deposit",$total_deposit);
	}
}