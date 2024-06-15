<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\VendorInfoRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorController extends UserController
{
    /**
     * To handle the request of updating info of a vendor
     * @param VendorInfoRequest $request
     */
    public function updateInfo(VendorInfoRequest $request){
        // validation
        $data = $request->validated();

        // preparing some needed data
        $userId = Auth::id();
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address']
        ];

        $shopData = [
            'shop_description' => $data['shop_description'],
            'shop_name' => $data['shop_name']
        ];

        $vendor_id = DB::table('vendor_shop')
            ->where('user_id', '=', $userId)
            ->get(['vendor_id'])[0];
        

        // updating the data
        $data_1= $this->updateUserData($userId, $userData);
        $data_2= $this->updateShopData($userId, $shopData);
        if ($data_1 && $data_2) {
            return response(['msg' => "Info aggiornate con successo"], 200);
        } else {
            $a= $data_1;
            $b= $data_2;
            return response(['msg' => [$a,$b]], 200);
        }

    }

    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    private function updateUserData(int $userId, Array $data): bool{
        return User::findOrFail($userId)->update($data);
    }

    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    private function updateShopData(int $userId,Array $data): bool{
        if(DB::table('vendor_shop')->where('user_id', $userId)->exists()){
            DB::table('vendor_shop')->where('user_id', $userId)->update($data);
            return true;
    }
}

    /**
     * @param int $userId
     * To return the id of the current user's shop
     */
    public static function getVendorId(int $userId){
        return DB::table('vendor_shop')->where('user_id', $userId)
            ->select('vendor_id')->value('vendor_id');
    }

}
