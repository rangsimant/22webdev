<?php

/**
* 
*/
class DeviceType extends Eloquent
{
	protected $table = 'devicetype';
	protected $primaryKey = 'idDeviceType';
    public static $unguarded = true;

    public static $rules = array
                    (
                        'name'              => 'required',
                        'manufacturer'      => 'required',
                        'tel'      => 'Numeric',
                        'email'      => 'email'
                    );

    public function user()
    {
        return $this->hasOne('User', 'id', 'User');
    }

    public static function getDeviceTypeList()
    {
    	$devicetype = DB::table('devicetype')
                    ->orderBy('created_at', 'DESC')
                    ->get();

        foreach ($devicetype as $key => $value) {
            if ($value->photo == null) 
            {
                $devicetype[$key]->photo = URL::to('uploads/default/device-default.png');
            }
            else
            {
                $devicetype[$key]->photo = URL::to('uploads/devicetype/'.$value->photo);
            }
        }
    	return $devicetype;
    }

    public static function savePhoto($idDeviceType)
    {
        if(Input::hasFile('photo'))
        {
            $devicetype = self::find($idDeviceType);
            $path = public_path()."/uploads/devicetype/";
            if (File::exists($path.$devicetype->photo)) 
            {
                File::delete($path.$devicetype->photo);
            }
            $originalFilename = Input::file('photo')->getClientOriginalName();
            $filename = date('YmdHis').'_'.$originalFilename;
            Input::file('photo')->move($path,$filename); // save file at public/upload/devicetype
            $devicetype->photo = $filename;
            $devicetype->save();
            return 'Photo update.';
        }
        return 'Photo no update.';
    }

    public static function deletePhoto($idDeviceType)
    {
        $devicetype = self::find($idDeviceType);
        $path = public_path().'/uploads/devicetype/';
        if (File::exists($path.$devicetype->photo)) 
        {
            File::delete($path.$devicetype->photo);
            $devicetype->photo = null;
            $devicetype->save();
        }
        return 1;
    }

}